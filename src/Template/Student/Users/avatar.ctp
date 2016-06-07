<?= $this->element('Menu/student-menu'); ?>
<div class="col-md-8 col-xs-12 col-lg-10">
    <div class="panel panel-default">
        <div class="panel-heading">
            Avatar aanpassen
        </div>
        <div class="panel-body">
            <legend>Upload een nieuwe avatar</legend>
            <?= $this->Html->image('uploads/avatars/' . $editUser->avatar, ['class' => 'img-circle', 'style' => 'width:150px']); ?>
            <?= $this->Form->create($editUser, ['type' => 'file']); ?>
            <fieldset class="form-group">
                <?= $this->Form->file('avatar'); ?>
            </fieldset>
            <?= $this->Form->submit('Uploaden'); ?>
        </div>
    </div>
</div>
