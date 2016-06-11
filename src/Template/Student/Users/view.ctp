<?= $this->element('Menu/student-menu'); ?>
<div class="col-md-8 col-xs-12 col-lg-10">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?= __('Profiel van {0}', $profile->username); ?>
        </div>
        <div class="panel-body"
             style="background:url(<?= '/img/uploads/backdrops/' . $profile->student_profile->backdrop; ?>);">
            <div class="text-center avatar-container">
                <?= $this->Html->image('uploads/avatars/' . $profile->avatar, ['class' => 'avatar profile img-thumbnail pull-left img-thumbnail img-responsive']); ?>
            </div>
            <h2 class="text-center">
                <?= $profile->student_profile->fullname; ?>
            </h2>
        </div>
    </div>
</div>

<div class="col-md-4 col-xs-6 col-lg-5 col-lg-offset-2 col-md-offset-4">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?= __('Informatie'); ?>
        </div>
        <ul class="list-group">
            <li class="list-group-item"><i class="fa fa-user"></i> <?= __('Gebruikersnaam'); ?>: <b><?= $profile->username; ?></b></li>
            <li class="list-group-item"><i class="fa fa-credit-card"></i> <?= __('Volledige naam'); ?>: <b><?= $profile->student_profile->fullname; ?></b></li>
            <li class="list-group-item"><i class="fa fa-birthday-cake"></i> <?= __('Leeftijd'); ?>: <b><?= $profile->student_profile->age->nice(); ?></b></li>
            <li class="list-group-item"><i class="fa fa-building-o"></i> <?= __('School'); ?>: <b><?= $profile->school->name; ?></b></li>
            <li class="list-group-item"><i class="fa fa-envelope"></i> <?= __('E-mail'); ?>: <b><?= $profile->email; ?></b></li>
            <li class="list-group-item"><i class="fa fa-clock-o"></i> <?= __('Aangemaakt'); ?>: <b><?= $profile->created_at->nice(); ?></b></li>
            <li class="list-group-item"><i class="fa fa-bolt"></i> <?= __('Gebruikersoort'); ?>: <b><?= $profile->primary_role->name; ?></b></li>
        </ul>
        <div class="panel-body">
            <p style="font-weight:700;"><?= __('Overige interesses'); ?></p>
            <?= $this->Ubb->parse(h($profile->student_profile->interests)); ?>
        </div>
    </div>
</div>
<div class="col-md-4 col-xs-6 col-lg-5">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?= __('Biografie & Interesses'); ?>
        </div>
        <div class="panel-body">
            <?= $this->Ubb->parse(h($profile->student_profile->biography)); ?>
        </div>
    </div>
</div>

