<section id="task-summary">
    <h2><?= $this->text->e($task['title']) ?></h2>

    <?= $this->hook->render('template:task:details:top', array('task' => $task)) ?>

    <div class="task-summary-container color-<?= $task['color_id'] ?>">
        <div class="task-summary-columns">
            <div class="task-summary-column">
                <ul class="no-bullet">
                    <?php if ($project['is_public']): ?>
                    <li>
                        <small>
                            <?= $this->url->icon('external-link', t('Public link'), 'TaskViewController', 'readonly', array('task_id' => $task['id'], 'token' => $project['token']), false, '', '', true) ?>
                        </small>
                    </li>
                    <?php endif ?>
                    <?php if ($project['is_public'] && !$editable): ?>
                    <li>
                        <small>
                            <?= $this->url->icon('th', t('Back to the board'), 'BoardViewController', 'readonly', array('token' => $project['token'])) ?>
                        </small>
                    </li>
                    <?php endif ?>

                    <?= $this->hook->render('template:task:details:first-column', array('task' => $task)) ?>
                </ul>
            </div>
            <div class="task-summary-column">
                <ul class="no-bullet">
                    <?php if (! empty($task['category_name'])): ?>
                        <li>
                            <strong><?= t('Category:') ?></strong>
                            <span><?= $this->text->e($task['category_name']) ?></span>
                        </li>
                    <?php endif ?>
                    <li>
                        <strong><?= t('Column:') ?></strong>
                        <span><?= $this->text->e($task['column_title']) ?></span>
                    </li>

                    <?= $this->hook->render('template:task:details:second-column', array('task' => $task)) ?>
                </ul>
            </div>
            <div class="task-summary-column">
                <ul class="no-bullet">
                    <li>
                        <strong><?= t('Assignee:') ?></strong>
                        <span>
                        <?php if ($task['assignee_username']): ?>
                            <?= $this->text->e($task['assignee_name'] ?: $task['assignee_username']) ?>
                        <?php else: ?>
                            <?= t('not assigned') ?>
                        <?php endif ?>
                        </span>
                        <?php if ($editable && $task['owner_id'] != $this->user->getId()): ?>
                            - <span><?= $this->url->link(t('Assign to me'), 'TaskModificationController', 'assignToMe', ['task_id' => $task['id'], 'project_id' => $task['project_id']]) ?></span>
                        <?php endif ?>
                    </li>
                    <?php if ($task['creator_username']): ?>
                        <li>
                            <strong><?= t('Creator:') ?></strong>
                            <span><?= $this->text->e($task['creator_name'] ?: $task['creator_username']) ?></span>
                        </li>
                    <?php endif ?>
                    <?php if ($task['time_estimated']): ?>
                    <li>
                        <strong><?= t('Time estimated:') ?></strong>
                        <span><?= t('%s hours', $task['time_estimated']) ?></span>
                    </li>
                    <?php endif ?>
                    <?php if ($task['time_spent']): ?>
                    <li>
                        <strong><?= t('Time spent:') ?></strong>
                        <span><?= t('%s hours', $task['time_spent']) ?></span>
                    </li>
                    <?php endif ?>

                    <?= $this->hook->render('template:task:details:third-column', array('task' => $task)) ?>
                </ul>
            </div>
            <div class="task-summary-column">
                <ul class="no-bullet">
                    <?php if ($task['date_due']): ?>
                        <li>
                            <strong><?= t('Due date:') ?></strong>
                            <span><?= $this->dt->datetime($task['date_due']) ?></span>
                        </li>
                    <?php endif ?>
                    <li>
                        <strong><?= t('Created:') ?></strong>
                        <span><?= $this->dt->datetime($task['date_creation']) ?></span>
                    </li>
                    <li>
                        <strong><?= t('Modified:') ?></strong>
                        <span><?= $this->dt->datetime($task['date_modification']) ?></span>
                    </li>
                    <?php if ($task['date_completed']): ?>
                    <li>
                        <strong><?= t('Completed:') ?></strong>
                        <span><?= $this->dt->datetime($task['date_completed']) ?></span>
                    </li>
                    <?php endif ?>
                    <?php if ($task['date_moved']): ?>
                    <li>
                        <strong><?= t('Moved:') ?></strong>
                        <span><?= $this->dt->datetime($task['date_moved']) ?></span>
                    </li>
                    <?php endif ?>

                    <?= $this->hook->render('template:task:details:fourth-column', array('task' => $task)) ?>
                </ul>
            </div>
        </div>
        <?php if (! empty($tags)): ?>
            <div class="task-tags">
                <ul>
                    <?php foreach ($tags as $tag): ?>
                        <li class="task-tag <?= $tag['color_id'] ? "color-{$tag['color_id']}" : '' ?>"><?= $this->text->e($tag['name']) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>
    </div>

    <?php if (! empty($task['external_uri']) && ! empty($task['external_provider'])): ?>
        <?= $this->app->component('external-task-view', array(
            'url' => $this->url->href('ExternalTaskViewController', 'show', array('project_id' => $task['project_id'], 'task_id' => $task['id'])),
        )) ?>
    <?php endif ?>

    <?= $this->hook->render('template:task:details:bottom', array('task' => $task)) ?>
</section>

