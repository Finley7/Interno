<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= __('Maak een Interno account!'); ?>
                </div>
                <div class="panel-body">
                    <legend><?= __('Een profiel aanmaken'); ?></legend>
                    <p class="text-muted">Alleen leerlingen moeten een profiel aanmaken. Bedrijven en scholen worden door een beheerder gemaakt!</p>
                    <?= $this->Form->create($user); ?>
                    <fieldset class="form-group">
                        <?= $this->Form->input('username', ['class' => 'form-control']); ?>
                    </fieldset>
                    <fieldset class="form-group">
                        <?= $this->Form->input('student_number', ['type' => 'integer', 'class' => 'form-control']); ?>
                    </fieldset>
                    <fieldset class="form-group">
                        <?= $this->Form->input('email', ['type' => 'integer', 'class' => 'form-control']); ?>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="school">School</label>
                        <?= $this->Form->select('school_id', $schools, ['class' => 'form-control']); ?>
                    </fieldset>
                    <fieldset class="form-group">
                        <?= $this->Form->input('password', ['class' => 'form-control']); ?>
                    </fieldset>
                    <fieldset class="form-group">
                        <?= $this->Form->input('password_verify', ['class' => 'form-control', 'type' => 'password']); ?>
                    </fieldset>
                    <?= $this->Form->button('Aanmelden', ['class' => 'btn btn-primary btn-lg']); ?>
                    <?= $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>