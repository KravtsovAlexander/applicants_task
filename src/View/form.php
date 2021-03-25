<section>


<div class="container">
    <h1><?php echo $title ?></h1>
    <?php if($isUser): ?>
        <form action="/edit/save" method="POST">
    <?php else: ?>
        <form action="/registration/registrate" method="POST">
    <?php endif; ?>

        <div class="form-group">
            <input class="form-control" type="text" name="name" id="name" placeholder="Имя"
                value="<?php echo isset($name) ? $name : '' ?>">
        </div>

        <div class="form-group">
            <input class="form-control" type="text" name="lastname" id="lastname" placeholder="Фамилия"
                value="<?php echo isset($lastname) ? $lastname : '' ?>">
        </div>

        <div class="form-group">
            <p>Пол</p>
            <div class="form-check-inline">
                <label for="m" class="form-check-label"> М: </label>
                    <input class="form-check-input" id="m" type="radio" name="sex" value="m"
                        <?php echo isset($sex) && $sex === 'm' ? 'checked' : '' ?>>
                <label for="f" class="form-check-label"> Ж: </label>
                    <input class="form-check-input" id="f" type="radio" name="sex" value="f"
                        <?php echo isset($sex) && $sex === 'f' ? 'checked' : '' ?>>
            </div>
        </div>

        <div class="form-group">
            <input class="form-control" type="text" name="group_num" id="group_num" placeholder="Номер группы"
                value="<?php echo isset($group_num) ? $group_num : '' ?>">
        </div>

        <div class="form-group">
            <input class="form-control" type="text" name="email" id="email" placeholder="email"
                value="<?php echo isset($email) ? $email : '' ?>">
        </div>

        <div class="form-group">
            <input class="form-control" type="text" name="points" id="points" placeholder="Суммарное число баллов ЕГЭ"
                value="<?php echo isset($points) ? $points : '' ?>">
        </div>

        <div class="form-group">
            <input class="form-control" type="text" name="birthyear" id="birthyear" placeholder="Год рождения"
                value="<?php echo isset($birthyear) ? $birthyear : '' ?>">
        </div>

        <div class="form-group">
            <label>
                Местный:
                <input type="radio" name="is_local" value="1"
                    <?php echo isset($is_local) && $is_local ? 'checked' : '' ?>>
            </label>
            <label>
                Иногородний:
                <input type="radio" name="is_local" value="0"
                    <?php echo isset($is_local) && !$is_local ? 'checked' : '' ?>>
            </label>
        </div>

        <?php if($isUser): ?>
            <input class="btn btn-secondary btn-lg btn-block" type="submit" value="Сохранить">

        <?php else: ?>
            <input class="btn btn-secondary btn-lg btn-block" type="submit" value="Зарегистрироваться">
        <?php endif; ?>
    </form>
</div>

</section>