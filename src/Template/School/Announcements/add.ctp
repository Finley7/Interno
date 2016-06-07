<?= $this->element('Menu/student-menu'); ?>
<div class="col-md-8 col-xs-12 col-lg-10">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?= __('Voeg een artikel toe'); ?>
            <?= $this->Html->link(__('Terug naar artikel beheer'), ['controller' => 'Announcements', 'action' => 'index'], ['class' => 'btn btn-xs btn-primary pull-right']); ?>
        </div>
        <div class="panel-body">
            <legend><?= __('Artikel toevoegen'); ?></legend>
            <?= $this->Form->create($announcement); ?>
                <fieldset class="form-group">
                    <?= $this->Form->input('title', ['class' => 'form-control']); ?>
                </fieldset>
                <fieldset class="form-group">
                    <?= $this->Form->textarea('body', ['class' => 'form-control']); ?>
                </fieldset>
                <fieldset class="form-group">
                    <?= $this->Form->input('tags', ['class' => 'form-control']); ?>
                </fieldset>
            <?= $this->Form->submit('Artikel aanmaken', ['class' => 'btn btn-lg btn-success btn-block']); ?>
            <?= $this->Form->end(); ?>
        </div>
    </div>
</div>

