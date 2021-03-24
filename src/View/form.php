<section>
    <h1><?php echo $title ?></h1>


    <?php if($isUser): ?>
        <form action="/edit/save" method="POST">
    <?php else: ?>
        <form action="/registration/registrate" method="POST">
    <?php endif; ?>
        <div>
            <input type="text" name="name" id="name" placeholder="Имя"
                value="<?php echo isset($name) ? $name : '' ?>">
        </div>

        <div>
            <input type="text" name="lastname" id="lastname" placeholder="Фамилия"
                value="<?php echo isset($lastname) ? $lastname : '' ?>">
        </div>

        <div>
            <p>Пол</p>
            <label>
                М:
                <input type="radio" name="sex" value="m"
                    <?php echo isset($sex) && $sex === 'm' ? 'checked' : '' ?>>
            </label>
            <label>
                Ж:
                <input type="radio" name="sex" value="f"
                    <?php echo isset($sex) && $sex === 'f' ? 'checked' : '' ?>>
            </label>
        </div>

        <div>
            <input type="text" name="group_num" id="group_num" placeholder="Номер группы"
                value="<?php echo isset($group_num) ? $group_num : '' ?>">
        </div>

        <div>
            <input type="text" name="email" id="email" placeholder="email"
                value="<?php echo isset($email) ? $email : '' ?>">
        </div>

        <div>
            <input type="text" name="points" id="points" placeholder="Суммарное число баллов ЕГЭ"
                value="<?php echo isset($points) ? $points : '' ?>">
        </div>

        <div>
            <input type="text" name="birthyear" id="birthyear" placeholder="Год рождения"
                value="<?php echo isset($birthyear) ? $birthyear : '' ?>">
        </div>

        <div>
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



        <input type="submit" value="Зарегистрироваться">
    </form>

</section>