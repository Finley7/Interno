<?= $this->element('Menu/school-menu'); ?>
<div class="col-md-8 col-xs-12 col-lg-10">
    <div class="panel panel-default">
        <div class="panel-heading">
            Welkom op het dashboard
        </div>
        <div class="panel-body">
            <legend>Recente Aankondigingen</legend>
            <?php foreach ($blogs as $article): ?>
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
