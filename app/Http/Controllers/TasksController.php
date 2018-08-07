<?php

namespace App\Http\Controllers;

use App\Task;
use Faker\Generator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Task::all()->jsonSerialize(), Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Generator $faker
     * @return void
     */
    public function create(Generator $faker)
    {
        $task = new Task();
        $task->title = $faker->sentence(1);
        $task->priority = $faker->boolean ? 'low' : 'high';
        $task->save();
        return response($task->jsonSerialize(), Response::HTTP_CREATED);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task();
        $task->title = $request->title;
        $task->priority = $request->priority;
        $task->save();
        return response($task->jsonSerialize(), Response::HTTP_CREATED);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::destroy($id);
        return response(null, Response::HTTP_OK);
    }
}
