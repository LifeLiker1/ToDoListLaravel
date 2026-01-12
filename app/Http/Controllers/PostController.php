<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function show(){
        $tasks = DB::table('tasks')->get();
        return view('home', ['tasks' => $tasks]);
    }

    public function detailView($id){
       $details = DB::table('tasks') -> find($id);
        return view('taskDetailView', ['details' => $details]);
    }

    public function createTask(){
        return view('createTask');
    }

}
?>
