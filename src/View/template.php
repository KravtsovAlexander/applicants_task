<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $styles ?>">
    <title><?php echo $title ?></title>
</head>

<body>
    <nav class="header-nav navbar">
        <div class="container">
            <a class="header-nav__link" href="/">Главная</a>
            <?php if ($isUser) : ?>
                <a class="header-nav__link" href="/edit">Редактировать профиль</a>
            <?php else : ?>
                <a class="header-nav__link" href="/registration">Регистрация</a>
            <?php endif; ?>
        </div>
    </nav>

    <div>
        <?php include_once $content ?>
    </div>


    <script src="<?php echo $script ?>"></script>
</body>
</html>