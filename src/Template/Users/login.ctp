<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= __('Inloggen op Interno'); ?>
                </div>
                <div class="panel-body">
                    <legend><?= __('Log in op Interno'); ?></legend>
                    <?= $this->Form->create(); ?>
                        <fieldset class="form-group">
                            <?= $this->Form->input('username', ['class' => 'form-control']); ?>
                        </fieldset>
                        <fieldset class="form-group">
                            <?= $this->Form->input('password', ['class' => 'form-control']); ?>
                        </fieldset>
                    <?= $this->Form->button('Aanmelden', ['class' => 'btn btn-primary btn-lg']); ?>
                    <?= $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>