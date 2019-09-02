<?php
    $class = 'alert';

    if (!empty($params['class'])) {
        $class .= ' alert-' . $params['class'];
    }

    if (!isset($params['escape']) || $params['escape'] !== false) {
        $message = h($message);
    }
?>

<div class="<?= h($class) ?>" onclick="this.classList.add('hidden');">
    <?= $message ?>
</div>
