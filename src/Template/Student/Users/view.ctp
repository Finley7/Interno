<?= $this->element('Menu/student-menu'); ?>
<div class="col-md-8 col-xs-12 col-lg-10">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?= __('Profiel van {0}', $profile->username); ?>
        </div>
        <div class="panel-body">
            <div class="text-center avatar-container">
                <?= $this->Html->image('uploads/avatars/' . $profile->avatar, ['class' => 'avatar profile img-circle pull-left img-thumbnail img-responsive']); ?>

            </div>
        </div>
    </div>
</div>
