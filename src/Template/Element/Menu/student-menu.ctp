<div class="col-md-4 col-lg-2 col-xs-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Menu
        </div>
        <div class="list-group">
            <?= $this->Html->link('<i class="fa fa-dashboard"></i> ' . __('Dashboard'),
                [
                    'controller' => 'Pages',
                    'action' => 'dashboard',
                    'prefix' => 'student',
                ],
                [
                    'class' => 'list-group-item',
                    'escape' => false
                ]
            ); ?>
            <?= $this->Html->link('<i class="fa fa-sticky-note"></i> ' . __('Notificaties {0}',
                    "<span class=\"badge\">{$notifications->where(['is_read' => false])->count()}</span>"
                ),
                [
                    'controller' => 'Notifications',
                    'action' => 'index',
                    'prefix' => 'student',
                ],
                [
                    'class' => 'list-group-item',
                    'escape' => false
                ]
            ); ?>
            <?= $this->Html->link('<i class="fa fa-user"></i> ' . __('Mijn profiel'),
                [
                    'controller' => 'Users',
                    'action' => 'view',
                    'prefix' => 'student',
                    $user->username
                ],
                [
                    'class' => 'list-group-item',
                    'escape' => false
                ]
            ); ?>
            <?= $this->Html->link('<i class="fa fa-building"></i> ' . __('Bedrijven'),
                [
                    'controller' => 'Companies',
                    'action' => 'student',
                    'prefix' => 'company',
                    $user->username
                ],
                [
                    'class' => 'list-group-item',
                    'escape' => false
                ]
            ); ?>
            <?= $this->Html->link('<i class="fa fa-search"></i> ' . __('Zoeken'),
                [
                    'controller' => 'Pages',
                    'action' => 'search',
                    'prefix' => 'company'
                ],
                [
                    'class' => 'list-group-item',
                    'escape' => false
                ]
            ); ?>
            <?= $this->Html->link('<i class="fa fa-gear"></i> ' . __('Instellingen'),
                [
                    'controller' => 'Users',
                    'action' => 'settings',
                    'prefix' => 'student'
                ],
                [
                    'class' => 'list-group-item',
                    'escape' => false
                ]
            ); ?>
            <?= $this->Form->postLink('<i class="fa fa-user-times"></i> ' . __('Uitloggen'),
                [
                    'controller' => 'Users',
                    'action' => 'logout',
                    'prefix' => false
                ],
                [
                    'class' => 'list-group-item',
                    'escape' => false
                ]
            ); ?>
        </div>
    </div>
</div>