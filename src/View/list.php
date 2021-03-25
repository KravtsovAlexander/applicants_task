<section>
    <div class="container">
        <div class="navbar">
            <h1>Список абитуриентов</h1>
            <form class="form-inline" action="/index/search" method="POST">
                    <input class="form-control mr-sm-2" name="query" type="text" placeholder="Поиск">
                <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Найти">
            </form>
        </div>

        <?php include 'navigation.php' ?>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Номер группы</th>
                    <th>Баллов</th>
                </tr>
            </thead>
            <?php foreach ($applicants as $app) : ?>
                <tr>
                    <td><?php echo $app['name'] ?></td>
                    <td><?php echo $app['lastname'] ?></td>
                    <td><?php echo $app['group_num'] ?></td>
                    <td><?php echo $app['points'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</section>

<?php include 'navigation.php' ?>