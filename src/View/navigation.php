<?php if (isset($pages)) : ?>
    <nav class="nav justify-content-center">
        <?php foreach ($pages as $page => $link) : ?>
            <a class="nav-link" href="<?php echo $link ?>"><?php echo $page ?></a>
        <?php endforeach; ?>
    </nav>
<?php endif; ?>