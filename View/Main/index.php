<html>
    <body>
        <?php if (empty($error)): ?>
        <h3><?= $title ?></h3>
        <h5><?= $text;  ?></h5>
        <?php else: ?>
        <h3><?= $error ?></h3>
        <?php endif; ?>
    </body>
</html>
