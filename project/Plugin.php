<?php namespace Nizzac\Project;

use Backend;
use System\Classes\PluginBase;

/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/3.x/extend/system/plugins.html
 */
class Plugin extends PluginBase
{
    /**
     * pluginDetails about this plugin.
     */
    public function pluginDetails()
    {
        return [
            'name' => 'Project',
            'description' => '',
            'author' => 'Nizzac',
            'icon' => 'icon-leaf'
        ];
    }

    /**
     * registerNavigation used by the backend.
     */
    public function registerNavigation()
    {
        return [
            'project' => [
                'label' => 'Project',
                'url' => Backend::url('nizzac/project/project'),
                'icon' => 'icon-leaf',
                'permissions' => ['nizzac.project.*'],
                'order' => 500,
            ],
        ];
    }
}
