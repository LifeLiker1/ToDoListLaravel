<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Task;

class PostController extends Controller
{
    public function show()
    {
        $tasks = Task::all();
        return view('home', ['tasks' => $tasks]);
    }

    public function detailView($id)
    {
        $details = Task::find($id);
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

        Task::create([
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
        $task = Task::find($id);
        $task->update($validated);
        if ($task) {
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
        $task = Task::find($id);
        if ($task) {
            $task->delete();
        }
        return redirect()->route('tasks.index');
    }
}
?>
