<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Repository\TaskRepository;
use App\Traits\apiResponseBuilder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    use apiResponseBuilder;

    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $tasks = Task::query() -> get();
        return $this -> successResponse(TaskResource::collection($tasks), true, '', Response::HTTP_OK );
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @param TaskRepository $repository
     * @return JsonResponse
     */
    public function store(Request $request, TaskRepository $repository): JsonResponse
    {
        $created = $repository -> store($request -> only(['name', 'priority', 'status', 'project_id', 'user_id']));
        return $this -> successResponse(new TaskResource($created), true, 'Project created', Response::HTTP_OK );
    }

    /**
     * Display the specified resource.
     * @param Task $task
     * @return JsonResponse
     */
    public function show(Task $task): JsonResponse
    {
        return $this -> successResponse(new TaskResource($task), true, '', Response::HTTP_OK );
    }

    /**
     * Update the specified resource in storage.
     * @param Task $task
     * @param Request $request
     * @param TaskRepository $repository
     * @return JsonResponse
     */
    public function update(Task $task, Request $request, TaskRepository $repository): JsonResponse
    {
        $repository -> update($task, $request -> only(['name', 'priority']));
        return $this -> successResponse(new TaskResource($task), true, 'Project updated', Response::HTTP_OK );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task, TaskRepository $repository): JsonResponse|TaskResource
    {
        $repository -> destroy( $task );
        return $this -> successResponse( array(), true, 'Task deleted.', Response::HTTP_NO_CONTENT );
    }
}
