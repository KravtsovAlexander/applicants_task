<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
</head>

<body>
    <nav>
        <a href="/">Главная</a>
        <?php if ($isUser) : ?>
            <a href="#">Редактировать профиль</a>
        <?php else : ?>
            <a href="/registration">Регистрация</a>
        <?php endif; ?>
    </nav>

    <div>
        <?php include_once $content ?>
    </div>

    <footer>Футер</footer>
</body>

</html>