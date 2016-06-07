<nav class="navbar navbar-default menu-header">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-collapse"
                    aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?= $this->Html->link(__('Interno gebruikerspaneel'), '/', ['class' => 'navbar-brand', 'style' => 'color:#fff;']); ?>
        </div>
        <div class="collapse navbar-collapse" id="menu-collapse">
            <ul class="nav navbar-nav">

            </ul>
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
            <?php endif; ?>
        </div>
    </div>
</nav>
