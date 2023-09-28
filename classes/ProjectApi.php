<?php

namespace Unspun\Project\Classes;

use Http;

class ProjectApi
{
    protected $api;
    
    protected $url;

    protected $token;

    protected $projectId;

    public function __construct()
    {
        $url = config('unspun.project::api.base_url');
        $token = config('unspun.project::api.access_token');
        $this->api = Http::withToken($token)->baseUrl($url);
        $this->projectId = config('unspun.project::api.project_id');
    }

    public function tasks()
    {
        $response = $this->api->get("/tasks/{$this->projectId}");
        
        return $response->object();
    }

    public function tasksByStatus()
    {
        $response = $this->api->get("/task-statuses/{$this->projectId}");
        
        return $response->json();
    }

    public function updateTaskStatus($taskId, $status)
    {
        $response = $this->api->post("/task-status/{$this->projectId}", [
            'taskId' => $taskId,
            'status' => $status
        ]);

        return $response->json();
    }

    public function updateTasksOrder($tasks = [])
    {
        $response = $this->api->post("/tasks-order/{$this->projectId}", [
            'tasks' => $tasks
        ]);

        return $response->ok();
    }

    public function addTask($data = [])
    {
        $response = $this->api->post("/task/{$this->projectId}", $data);
        return $response->ok();
    }
}