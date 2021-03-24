<?php

namespace ApplicantTask;

use Exception;
use PDO;

/**
 * Interact with applitants table using Applicant entity
 */
class ApplicantsMapper
{
    private $connection;

    public function __construct()
    {
        $config = parse_ini_file(__DIR__ . '/../db_config.ini');

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        $this->connection = new PDO(
            "mysql:host={$config['server']};port={$config['port']};dbname={$config['db_name']}",
            $config['user'],
            $config['password'],
            $options
        );
    }

    /**
     * @param Applicant Instance of the Applicant entity
     */
    public function save(Applicant $applicant)
    {
        $sql = "
            INSERT INTO applicants(name, lastname, sex, group_num, email, points, birthyear, is_local, token)
            VALUES
            (:name, :lastname, :sex, :group_num, :email, :points, :birthyear, :is_local, :token);
        ";
        $data = [
            'name' => $applicant->name,
            'lastname' => $applicant->lastname,
            'sex' => $applicant->sex,
            'group_num' => $applicant->group_num,
            'email' => $applicant->email,
            'points' => $applicant->points,
            'birthyear' => $applicant->birthyear,
            'is_local' => $applicant->is_local,
            'token' => bin2hex(random_bytes(16)),
        ];
        $statement = $this->connection->prepare($sql);
        $statement->execute($data);
    }

    public function getApplicants()
    {
        $sql = 'SELECT name, lastname, group_num, points FROM applicants';
        $statement = $this->connection->prepare($sql);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function getByEmail(string $email)
    {
        $sql = '
            SELECT name, lastname, group_num, points
            FROM applicants
            WHERE email = :email;
        ';
        $data = ['email' => $email];
        $statement = $this->connection->prepare($sql);
        $statement->execute($data);

        return $statement->fetchAll();
    }
}
