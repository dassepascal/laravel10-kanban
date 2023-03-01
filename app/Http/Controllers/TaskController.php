<?php

namespace App\Http\Controllers;

use App\Models\Task;
//use Illuminate\Http\Request;
use App\Enums\TasksStatus;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
// enum Status : int
//  {
//    case PENDING = 0;
//    case IN_PROGRESS = 1;
//       case DONE = 2;
// }

class TaskController extends Controller
{
    public function index()
    {
        $total = Task::count();
        $doneTasks = Task::done()->get();
        $inProgressTasks = Task::inProgress()->get();
        $pendingTasks = Task::pending()->get();
        return view('tasks.index', compact(  'total','doneTasks', 'inProgressTasks','pendingTasks'));
    }

    //store
    public function store(StoreTaskRequest $request)
    {


        Task::create($request->validated());

        return redirect()->route('tasks.index');
    }
    //edit
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }
    //destroy
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
    //update
    public function update(UpdateTaskRequest $request, Task $task)
    {


        $task->update($request->validated());

        return redirect()->route('tasks.index');
    }

}
