<section>
    <h1>Регистрация</h1>

    <form action="/registration/registrate" method="POST">
        <div>
            <input type="text" name="name" id="name" placeholder="Имя">
        </div>

        <div>
            <input type="text" name="lastname" id="lastname" placeholder="Фамилия">
        </div>

        <div>
            <p>Пол</p>
            <label>
                М:
                <input type="radio" name="sex" value="m">
            </label>
            <label>
                Ж:
                <input type="radio" name="sex" value="f">
            </label>
        </div>

        <div>
            <input type="text" name="group_num" id="group_num" placeholder="Номер группы">
        </div>

        <div>
            <input type="text" name="email" id="email" placeholder="email">
        </div>

        <div>
            <input type="text" name="points" id="points" placeholder="Суммарное число баллов ЕГЭ">
        </div>

        <div>
            <input type="text" name="birthyear" id="birthyear" placeholder="Год рождения">
        </div>

        <div>
            <label>
                Местный:
                <input type="radio" name="is_local" value="1">
            </label>
            <label>
                Иногородний:
                <input type="radio" name="is_local" value="0">
            </label>
        </div>



        <input type="submit" value="Зарегистрироваться">
    </form>

</section>