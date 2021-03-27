<section>
    <div class="container">
        <div class="navbar">
            <h1>Список абитуриентов</h1>
            <form class="form-inline" action="/index/search" method="POST">
                    <input class="form-control mr-sm-2" name="query" type="text" placeholder="Поиск">
                <input class="btn btn-outline-success my-2 my-sm-0"
                    data-query="<?php echo isset($query) ? htmlspecialchars($query) : ''?>" id="search" type="submit" value="Найти">
            </form>
        </div>

        <?php include 'navigation.php' ?>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th class="table__th">Имя</th>
                    <th class="table__th">Фамилия</th>
                    <th class="table__th">Номер группы</th>
                    <th class="table__th">Баллов</th>
                </tr>
            </thead>
            <?php foreach ($applicants as $app) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($app['name']) ?></td>
                    <td><?php echo htmlspecialchars($app['lastname']) ?></td>
                    <td><?php echo htmlspecialchars($app['group_num']) ?></td>
                    <td><?php echo htmlspecialchars($app['points']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</section>

<?php include 'navigation.php' ?>