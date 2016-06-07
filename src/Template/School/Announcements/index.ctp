<?= $this->element('Menu/student-menu'); ?>
<div class="col-md-8 col-xs-12 col-lg-10">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?= __('Welkom in het artikel-beheer'); ?>
            <?= $this->Html->link(__('Maak een nieuwe aankondiging'), ['controller' => 'Announcements', 'action' => 'add'], ['class' => 'btn btn-xs btn-success pull-right']); ?>
        </div>
        <div class="panel-body">
            <legend><?= __('Artikel beheer'); ?></legend>
        </div>
    </div>
</div>

