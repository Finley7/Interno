<?= $this->element('Menu/student-menu'); ?>
<div class="col-md-8 col-xs-12 col-lg-10">
    <div class="panel panel-default">
        <div class="panel-heading">
            Welkom op het dashboard
        </div>
        <div class="panel-body">
            <div class="panel panel-primary">
                <div class="panel-heading">Jij</div>
                <div class="panel-body">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <?= $this->Html->image('uploads/avatars/' . $user->avatar, ['style' => 'width:100px;', 'class' => 'media-object']); ?>
                            </a>
                        </div>
                        <div class="media-body">
                            <h2 class="media-heading"><?= $user->username; ?></h2>
                            <ul class="student-info">
                                <li><i class="fa fa-hashtag"></i> Leerlingnummer: <?= $user->student_number; ?></li>
                                <li><i class="fa fa-envelope"></i> E-mail: <?= $user->email; ?></li>
                                <li><i class="fa fa-clock-o"></i> Registratiedatum: <?= $user->created_at->nice(); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <legend>Recente artikelen van school</legend>
            <?php foreach ($announcements as $article): ?>
                <div class="blogpost panel panel-default">
                    <div class="panel-heading"><?= $article->title; ?></div>
                    <div class="panel-body">
                        <?= $this->Text->truncate(
                            $this->Ubb->parse($article->body),
                            50,
                            [
                                'ellipsis' => '..' . $this->Html->link('lees meer &raquo;', [
                                        'controller' => 'Announcements',
                                        'action' => 'view',
                                        $article->id,
                                        $article->pretty_url
                                    ], ['escape' => false])
                            ]);
                        ?>
                    </div>
                    <div class="panel-footer">
                        <span class="text-muted">
                            Geplaatst op <?= $article->created->nice(); ?> door <?= $article->author->username; ?>
                        </span>
                        <?= $this->Html->link('Lees meer', [
                            'controller' => 'Announcements',
                            'action' => 'view',
                            $article->id,
                            $article->pretty_url
                        ], ['class' => 'btn btn-primary btn-xs pull-right']);
                        ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
