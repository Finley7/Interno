<style>
    .email {
        border:1px solid #999;
        background:#fafafa;
        padding: 10px;
    }
    a {
        text-decoration:none;
    }
    .activatebutton {
        padding:10px 15px;
        color:#fff;
        text-decoration:none;
        border-radius:3px;
        background:#006DB5;
    }
</style>
<div class="email">
    <h1>Welkom op Interno, <?= $username; ?></h1>
    <p>Fijn dat je een account hebt aangemaakt. Je moet nog heel even je account activeren, dat kan door op de link beneden te drukken!<br />Je kunt je account binnen 24 uur activeren!</p>
    <p><a class="activatebutton" title="Activeer mijn account" href="http://interno.nl/activate/<?= $code; ?>">Activeer mijn account</a></p>
    <p>Veel succes</p>
    <p>- Interno Team</p>
</div>