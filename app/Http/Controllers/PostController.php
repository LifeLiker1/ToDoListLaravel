<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function show()
    {
        $tasks = DB::table('tasks')->get();
        return view('home', ['tasks' => $tasks]);
    }

    public function detailView($id)
    {
        $details = DB::table('tasks')->find($id);
        return view('taskDetailView', ['details' => $details]);
    }

    public function createTask()
    {
        return view('createTask');
    }

    public function addNewTask(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|integer|in:0,1,2'
        ]);

        DB::table('tasks')->insertGetId([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'status' => $validated['status'],
            'created_at' => now()
        ]);

        return redirect()->route('tasks.index');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|integer|in:0,1,2'
        ]);
        $updated = DB::table('tasks')->where('id', $id)->update(
            [
                'title' => $validated['title'],
                'description' => $validated['description'],
                'status' => $validated['status'],
            ]
        );
        if ($updated) {
            return redirect()
                ->route('task.detailView', $id)
                ->with('success', 'Задача успешно обновлена');
        } else {
            return back()
                ->withInput()
                ->with('error', 'Не удалось обновить задачу');
        }

    }

    public function deleteTask($id)
    {
        DB::table('tasks')->where('id',$id)->delete();
        return redirect()->route('tasks.index');
    }
}
?>
