<ul class="views">
    
    <?= $this->hook->render('template:project-header:view-switcher-before-project-overview', array('project' => $project, 'filters' => $filters)) ?>

    <?= $this->hook->render('template:project-header:view-switcher-before-board-view', array('project' => $project, 'filters' => $filters)) ?>

    <li <?= $this->app->checkMenuSelection('BoardViewController') ?>>
        <?= $this->url->icon('th', t('Board'), 'BoardViewController', 'show', array('project_id' => $project['id'], 'search' => $filters['search']), false, 'view-board', t('Keyboard shortcut: "%s"', 'v b')) ?>
    </li>

    <?= $this->hook->render('template:project-header:view-switcher-before-task-list', array('project' => $project, 'filters' => $filters)) ?>

    <?= $this->hook->render('template:project-header:view-switcher', array('project' => $project, 'filters' => $filters)) ?>
</ul>

