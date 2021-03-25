<section>
    <h1>Список абитуриентов</h1>
    <form action="#" method="GET">
        <label>Поиск:
            <input type="text">
        </label>
        <input type="submit" value="Найти">
    </form>

    <?php include 'navigation.php' ?>

    <table>
        <tr>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Номер группы</th>
            <th>Баллов</th>
        </tr>
        <?php foreach ($applicants as $app) : ?>
            <tr>
                <td><?php echo $app['name'] ?></td>
                <td><?php echo $app['lastname'] ?></td>
                <td><?php echo $app['group_num'] ?></td>
                <td><?php echo $app['points'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>

<?php include 'navigation.php' ?>