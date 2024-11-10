<?php

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Models\Task;




Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' =>Task::latest()->get()
        // 'tasks' => \App\Models\Task::latest()->where('completed',true)->get()
    ]);
})->name('tasks.index');

Route::view(
    '/tasks/create',
    'create'
)->name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task) {

    return view('edit', [
        'task' => $task
        //'task' => \App\Models\Task::findOrFail($id)
    ]);
})->name('tasks.edit');


Route::post('/tasks', function (TaskRequest $request) {
    // $data = $request->validate([
    //     'title' => 'required|max:255',
    //     'description' => 'required',
    //     'long_description' => 'required',
    //     // 'title'=>['required','string','max:255'],
    // ]);
    // $data = $request->validated(); 
    // $task = new Task();
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];
    // $task->save();
    $task = Task::create($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])->with(
        'success',
        'Task Created Succesfully'
    );
    //dd($request->all());
})->name('tasks.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
    // $data = $request->validate([
    //     // 'title' => 'required|max:255',
    //     // 'description' => 'required',
    //     // 'long_description' => 'required',
    //     // // 'title'=>['required','string','max:255'],
    // ]);

    // $task = Task::findOrFail($id);
    // $data = $request->validated();
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];
    // $task->save();

    $task->update($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])->with(
        'success',
        'Task Updated Succesfully'
    );
    //dd($request->all());
})->name('tasks.update');

Route::get('/tasks/{task}', function (Task $task) {

    return view('show', [
        'task' => $task
        // 'task' => \App\Models\Task::findOrFail($id)
    ]);
})->name('tasks.show');

Route::delete('tasks/{task}', function(Task $task){
    $task->delete();

    return redirect()->route('tasks.index')->with('success','Task deleted successfully');
})->name('tasks.destroy');

Route::fallback(function () {
    return 'Y u do this';
});



// class Task
// {
//     public function __construct(
//         public int $id,
//         public string $title,
//         public string $description,
//         public ?string $long_description,
//         public bool $completed,
//         public string $created_at,
//         public string $updated_at
//     ) {
//     }
// }

// $tasks = [
//     new Task(
//         1,
//         'Buy groceries',
//         'Task 1 description',
//         'Task 1 long description',
//         false,
//         '2023-03-01 12:00:00',
//         '2023-03-01 12:00:00'
//     ),
//     new Task(
//         2,
//         'Sell old stuff',
//         'Task 2 description',
//         null,
//         false,
//         '2023-03-02 12:00:00',
//         '2023-03-02 12:00:00'
//     ),
//     new Task(
//         3,
//         'Learn programming',
//         'Task 3 description',
//         'Task 3 long description',
//         true,
//         '2023-03-03 12:00:00',
//         '2023-03-03 12:00:00'
//     ),
//     new Task(
//         4,
//         'Take dogs for a walk',
//         'Task 4 description',
//         null,
//         false,
//         '2023-03-04 12:00:00',
//         '2023-03-04 12:00:00'
//     ),
// ];



// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/tasks', function () use ($tasks) {
//     return view('index', ['tasks' => $tasks]);
// })->name('tasks.index');

// Route::get('/tasks/{id}', function ($id) use ($tasks) {

//     $task = collect($tasks)->firstWhere('id', $id);
//     if (!$task) {
//         abort(Response::HTTP_NOT_FOUND);
//     }
//     return view('show', ['task' => $task]);
// })->name('tasks.show');




// Route::get('/hello', function () {
//     return 'hello';
// })->name('hello');

// Route::get('/greet/{name}', function ($name) {
//     return "hello " . $name . " !";
// });

// Route::get('/hallo', function () {
//     return redirect()->route('hello');
// });