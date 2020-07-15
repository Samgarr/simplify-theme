<?php

namespace Kanboard\Plugin\SimplifyTheme;
use Kanboard\Core\Plugin\Base;

class Plugin extends Base
{
    public function initialize()
    {
        $this->hook->on('template:layout:css', array('template' => 'plugins/SimplifyTheme/simplifytheme.css'));
        $this->template->setTemplateOverride('board/task_private', 'SimplifyTheme:board/task_private');
        $this->template->setTemplateOverride('board/task_footer', 'SimplifyTheme:board/task_footer');
        $this->template->setTemplateOverride('task/show', 'SimplifyTheme:task/show');
        $this->template->setTemplateOverride('task/sidebar', 'SimplifyTheme:task/sidebar');
        $this->template->setTemplateOverride('task/details', 'SimplifyTheme:task/details');
        $this->template->setTemplateOverride('project_header/views', 'SimplifyTheme:project_header/views');
        $this->template->setTemplateOverride('project_header/header', 'SimplifyTheme:project_header/header');
        $this->template->setTemplateOverride('task_creation/show', 'SimplifyTheme:task_creation/show');
    }

    public function getPluginName() { 	     return 'SimplifyTheme'; }
    public function getPluginAuthor() {	     return 'Samgarr'; }
    public function getPluginVersion() {     return '0.1'; }
    public function getPluginDescription() { return 'Goal is simplify Kanboard UI and streamline transition from Trello to Kanboard.'; }
}
