<?php if (isset($pages)) : ?>
    <nav>
        <?php foreach ($pages as $page => $link) : ?>
            <a href="<?php echo $link ?>"><?php echo $page ?></a>
        <?php endforeach; ?>
    </nav>
<?php endif; ?>