<nav class="navbar navbar-default menu-header-school">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-collapse"
                    aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?= $this->Html->link('Interno school', '/', ['class' => 'navbar-brand', 'style' => 'color:#fff;']); ?>
        </div>
        <div class="collapse navbar-collapse" id="menu-collapse">

            <?php if (!isset($user)): ?>
                <?= $this->Form->create(null, ['url' => ['controller' => 'Users', 'action' => 'login'], ['navbar-form navbar-right class']]); ?>
                <div class="form-group">
                    <?= $this->Form->input('username', ['label' => false, 'placeholder' => __('Gebruikersnaam'), 'class' => 'form-control']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('password', ['label' => false, 'placeholder' => __('Wachtwoord'), 'class' => 'form-control']); ?>
                </div>
                <?= $this->Form->button(__('Aanmelden'), ['class' => 'btn btn-default']); ?>
                <?= $this->Form->end(); ?>

            <?php else: ?>

                <ul class="nav navbar-nav navbar-right">
                    <li><?= $this->Html->link('<i class="fa fa-user"></i> ' . $user->username,
                            [
                                'controller' => 'Users',
                                'action' => 'view',
                                $user->username,
                                'prefix' => 'student',
                            ],
                            [
                                'class' => '',
                                'escape' => false
                            ]
                        ); ?></li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</nav>
