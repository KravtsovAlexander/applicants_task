<?php

$config = parse_ini_file(__DIR__ . '/db_config.ini');
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];
$connection = new PDO(
    "mysql:host={$config['server']};port={$config['port']};dbname={$config['db_name']}",
    $config['user'],
    $config['password'],
    $options
);

if ($argv[1] === 'init') {
    $sql = '

CREATE TABLE IF NOT EXISTS applicants(
          id INT NOT NULL  AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
         sex VARCHAR(1) NOT NULL,
   group_num VARCHAR(5) NOT NULL,
       email VARCHAR(255) UNIQUE NOT NULL,
      points INT NOT NULL,
   birthyear VARCHAR(4) NOT NULL,
    is_local BOOLEAN NOT NULL,
       token VARCHAR(32) NOT NULL UNIQUE
);';

    $statement = $connection->prepare($sql);
    $statement->execute();
    exit('success');
}

if ((int) $argv[1]) {
    $sql = '
    INSERT INTO applicants(name, lastname, sex, group_num, email, points, birthyear, is_local, token)
    VALUES
    (:name, :lastname, :sex, :group_num, :email, :points, :birthyear, :is_local, :token);
';

    for ($i = 0; $i < (int) $argv[1]; $i++) {
        $data = [
            'name' => randStr(),
            'lastname' => randStr(),
            'sex' => array_rand(['f', 'm']),
            'group_num' => randGroup(),
            'email' =>  randEmail(),
            'points' => mt_rand(1, 300),
            'birthyear' => mt_rand(1990, 2000),
            'is_local' => mt_rand(0, 1),
            'token' => bin2hex(random_bytes(16)),
        ];

        $statement = $connection->prepare($sql);
        $statement->execute($data);
    }
    exit('success');
}

function randStr()
{
    $str = '';
    $alph = 'абвгдеёжзийклмнопрстуфхцчшщъыьэюя';
    for ($i = 0; $i < mt_rand(2, 20); $i++) {
        $str .= mb_substr($alph, mt_rand(0, 32), 1);
        if ($i === 0) $str = mb_strtoupper($str);
    }
    return $str;
}

function randGroup()
{
    $str = '';
    $alph = 'абвгдеёжзийклмнопрстуфхцчшщъыьэюя';
    for ($i = 0; $i < mt_rand(2, 5); $i++) {
        if (mt_rand(0, 100) > 50) {
            $str .= (string) mt_rand(0, 9);
        } else {
            $str .= mb_substr($alph, mt_rand(0, 32), 1);
        }
    }
    return $str;
}

function randEmail()
{
    $str = '';
    $alph = 'abcdefjhijklmnopqrstuvwxyz';
    for ($i = 0; $i < mt_rand(8, 16); $i++) {
        $str .= mb_substr($alph, mt_rand(0, 25), 1);
    }
    $str .= '@';
    for ($i = 0; $i < mt_rand(4, 6); $i++) {
        $str .= mb_substr($alph, mt_rand(0, 25), 1);
    }
    $str .= '.';
    for ($i = 0; $i < mt_rand(2, 3); $i++) {
        $str .= mb_substr($alph, mt_rand(0, 25), 1);
    }

    return $str;
}
