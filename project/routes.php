<?php

use Nizzac\Project\Controllers\Project;
use Nizzac\Project\Middleware\ProjectApiMiddleware;

Route::group(['middleware' => 'web'], function() {
    Route::get('/nizzac/api/tasks', [Project::class, 'tasks'])->middleware(ProjectApiMiddleware::class);
    Route::post('/nizzac/api/task', [Project::class, 'updateTaskStatus'])->middleware(ProjectApiMiddleware::class);
});
