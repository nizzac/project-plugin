<?php namespace Unspun\Project\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Backend\Facades\BackendAuth;
use Response;
use Unspun\Project\Classes\ProjectApi;

/**
 * Project Backend Controller
 *
 * @link https://docs.octobercms.com/3.x/extend/system/controllers.html
 */
class Project extends Controller
{
    /**
     * @var array required permissions
     */
    public $requiredPermissions = ['unspun.project.project'];

    /**
     * __construct the controller
     */
    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Unspun.Project', 'project', 'project');
    }
    
    public function index()
    {
        $this->pageTitle = "Tasks";
    }
    
    public function onGetTasks()
    {
        return response()->json((new ProjectApi)->tasksByStatus());
    }

    public function onUpdateTaskStatus()
    {
        return response()->json((new ProjectApi)->updateTaskStatus(post('taskId'), post('status')));
    }

    public function onUpdateTasksOrder()
    {
        return response()->json((new ProjectApi)->updateTasksOrder(collect(post('tasks'))->pluck('id')));
    }

    public function onAddTask()
    {
        return response()->json((new ProjectApi)->addTask(post()));
    }
}
