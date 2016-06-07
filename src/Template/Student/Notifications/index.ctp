<?= $this->element('Menu/student-menu'); ?>
<div class="col-md-8 col-xs-12 col-lg-10">
    <div class="panel panel-default">
        <div class="panel-heading"><?= __('Lees hier je notificaties terug!'); ?></div>
        <div class="panel-body">
            <legend>
                Notificaties (<?= $notifications->count(); ?> ongelezen)
                <?= $this->Form->postButton('Markeer alles als gelezen', ['controller' => 'Notifications', 'action' => 'mark', 'all'], ['class' => 'btn btn-danger pull-right']); ?>
            </legend>
            <table class="table">
                <thead>
                    <tr>
                        <th>Bericht</th>
                        <th>Gelezen</th>
                        <th>Ontvangen</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($allNotifications as $note): ?>
                        <tr>
                            <td><?= $note->message; ?></td>
                            <td><?= ($note->is_read) ? '<i style="color:green" class="fa fa-check"></i>' : '<i style="color:red" class="fa fa-times"></i>'; ?> </td>
                            <td><?= $note->created->timeAgoInWords(); ?></td>
                            <td>
                                <?= $this->Html->link(__('Bekijken'), ['controller' => 'Notifications', 'action' => 'read', $note->id], ['class' => 'btn btn-xs btn-primary']); ?>
                                <?= (!$note->is_read) ? $this->Form->postLink(__('Gelezen'), ['controller' => 'Notifications', 'action' => 'mark', $note->id], ['class' => 'btn btn-xs btn-warning']) : '<a href="#" class="btn btn-xs btn-warning disabled">Al gelezen</a>'; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
