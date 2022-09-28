<?php

namespace App\Controllers;

use App\Models\Task;
use App\Requests\AddTaskRequest;
use App\Requests\SaveTaskRequest;
use Auryn\InjectionException;
use Core\Controller;
use Core\Injector;
use Core\JsonResponse;
use Core\Request;
use Core\Response;
use Core\View;
use Exception;

class TaskController extends Controller
{
    /**
     * @throws InjectionException
     */
    public function view(Request $request): Response
    {
        return new Response(
            Injector::get(View::class)->render(
                'pages/todo.html'
            )
        );
    }

    public function list(Request $request): Response
    {
        $query = Task::query();
        switch ($request->get('sort_prop')) {
            case 'name':
                $query->orderBy('name', $request->get('sort_type'));
                break;
            case 'email':
                $query->orderBy('email', $request->get('sort_type'));
                break;
            case 'done':
                $query->orderBy('done', $request->get('sort_type'));
                break;
            case 'id':
                $query->orderBy('id', $request->get('sort_type'));
                break;
        }
        return new JsonResponse(
            [
                'tasks' => $query->paginate(3, ['*'], $request->get('page'), $request->get('page'))
            ]
        );
    }

    /**
     * @throws Exception
     */
    public function save(SaveTaskRequest $request): JsonResponse
    {
        $request->mutate();
        $request->validate();

        $task = Task::query()->find($request->get('id'));
        $task->done = $request->get('done');
        if ($task->description != $request->get('description')) {
            $task->description = $request->get('description');
            $task->edited_by_admin = 1;
        }
        $task->save();

        return new JsonResponse(true);
    }

    /**
     * @throws Exception
     */
    public function add(AddTaskRequest $request): JsonResponse
    {
        $request->validate();

        $task = new Task();
        $task->name = $request->get('name');
        $task->email = $request->get('email');
        $task->description = $request->get('description');
        $task->save();

        return new JsonResponse(true);
    }
}