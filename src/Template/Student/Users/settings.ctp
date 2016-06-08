<?= $this->element('Menu/student-menu'); ?>
<div class="col-md-8 col-xs-12 col-lg-10">
    <div class="panel panel-default">
        <div class="panel-heading">
            Instellingen
        </div>
        <div class="panel-body">
            <legend>Instellingen</legend>
            <?= $this->Html->link('<i class="fa fa-file-image-o"></i> ' . __('Avatar aanpassen'), ['action' => 'avatar'], ['class' => 'btn btn-success', 'escape' => false]); ?>
            <?= $this->Html->link('<i class="fa fa-lock"></i> ' . __('Wachtwoord aanpassen'), ['action' => 'password'], ['class' => 'btn btn-warning', 'escape' => false]); ?>
            <?= $this->Html->link('<i class="fa fa-image"></i> ' . __('Omslagfoto aanpassen'), ['action' => 'password'], ['class' => 'btn btn-primary', 'escape' => false]); ?>
            <?= $this->Html->link('<i class="fa fa-lock"></i> ' . __('Schoolinformatie aanpassen'), ['action' => 'password'], ['class' => 'btn btn-warning', 'escape' => false]); ?>
            <hr>
            <legend>Profiel instellingen</legend>
            <?= $this->Form->create($profile); ?>
                <fieldset class="form-group">
                    <?= $this->Form->input('student_profile.fullname', ['class' => 'form-control']); ?>
                    <span class="text-muted"><?= __('Je volledige naam'); ?></span>
                </fieldset>
                <fieldset class="form-group">
                    <label for="student_profile[age]">Leeftijd</label>
                    <br>
                    <?= $this->Form->date('student_profile.age', [
                        'label' => 'Date of birth',
                        'minYear' => date('Y') - 70,
                        'maxYear' => date('Y') - 14,
                        'class' => 'form-control'
                    ]); ?>
                    <br>
                    <span class="text-muted"><?= __('Je leeftijd'); ?></span>
                </fieldset>
                <fieldset class="form-group">
                    <label for="student_profile[biography]">Biografie</label>
                    <br>
                    <textarea name="student_profile[biography]" id="biography" class="form-control" rows="5"><?= isset($profile->student_profile->biography) ? $profile->student_profile->biography : ''; ?></textarea>
                    <span class="text-muted"><?= __('Je biografie'); ?></span>
                </fieldset>
                <fieldset class="form-group">
                    <label for="student_profile[interests]">Interesses</label>
                    <br>
                    <?= $this->Form->textarea('student_profile.interests', ['class' => 'form-control']); ?>
                    <span class="text-muted"><?= __('Je interesses'); ?></span>
                </fieldset>
            <?= $this->Form->submit(__('Opslaan'), ['class' => 'btn btn-success']); ?>
            <?= $this->Form->end(); ?>
        </div>
    </div>
</div>
<script>
    var wbbOpt = {
        buttons: "bold,italic,underline,|,link,fontsize,|,strike,sub,sup"
    }
    $('#biography').wysibb(wbbOpt);
</script>
