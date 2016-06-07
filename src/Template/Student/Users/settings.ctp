<?= $this->element('Menu/student-menu'); ?>
<div class="col-md-8 col-xs-12 col-lg-10">
    <div class="panel panel-default">
        <div class="panel-heading">
            Instellingen
        </div>
        <div class="panel-body">
            <legend>Instellingen</legend>
            <?= $this->Html->link('<i class="fa fa-image"></i> ' . __('Avatar aanpassen'), ['action' => 'avatar'], ['class' => 'btn btn-success', 'escape' => false]); ?>
            <?= $this->Html->link('<i class="fa fa-lock"></i> ' . __('Wachtwoord aanpassen'), ['action' => 'password'], ['class' => 'btn btn-warning', 'escape' => false]); ?>
        </div>
    </div>
</div>
