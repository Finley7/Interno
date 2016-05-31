<?php
$class = 'alert alert-info';
?>
<script>
    $.amaran({
        'theme': 'colorful',
        'content': {
            bgcolor: '#d9edf7',
            color: '#31708f',
            message: '<?= h($message) ?>'
        },
        'position': 'top right',
        'outEffect': 'slideRight'
    });
</script>