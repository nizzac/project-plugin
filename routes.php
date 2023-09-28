<?php

use Unspun\Project\Controllers\Project;
use Unspun\Project\Middleware\ProjectApiMiddleware;

Route::group(['middleware' => 'web'], function() {
    Route::get('/unspun/api/tasks', [Project::class, 'tasks'])->middleware(ProjectApiMiddleware::class);
    Route::post('/unspun/api/task', [Project::class, 'updateTaskStatus'])->middleware(ProjectApiMiddleware::class);
});
