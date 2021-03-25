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
            'token' => $applicant->getToken(),
        ];
        $statement = $this->connection->prepare($sql);
        $statement->execute($data);
    }

    /**
     * Fetch list information of the appplicants 
     * 
     * @return array
     */
    public function getApplicants(int $limit, int $offset)
    {
        $sql = '
            SELECT name, lastname, group_num, points
            FROM applicants
            LIMIT :offset, :limit
            ';
        $statement = $this->connection->prepare($sql);
        $statement->bindValue(':limit', $limit, PDO::PARAM_INT);
        $statement->bindValue(':offset', $offset, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }

    /**
     * @return string|false
     */
    public function getIdByEmail(string $email)
    {
        $sql = '
            SELECT id
            FROM applicants
            WHERE email = :email;
        ';
        $statement = $this->connection->prepare($sql);
        $statement->execute(['email' => $email]);

        return $statement->fetch(PDO::FETCH_COLUMN);
    }

    /**
     * Fetch applicant's field by his token
     * 
     * @param string $token Token from cookies
     * 
     * @return array
     */
    public function getByToken(string $token)
    {
        $sql = '
            SELECT * FROM applicants
            WHERE token = :token
        ';
        $statement = $this->connection->prepare($sql);
        $statement->execute(['token' => $token]);

        return $statement->fetch();
    }

    public function update(Applicant $applicant)
    {
        $sql = '
            UPDATE applicants
            SET name = :name, lastname = :lastname, sex = :sex,
                birthyear = :birthyear, email = :email, group_num = :group_num,
                points = :points, is_local = :is_local
            WHERE id = :id;
        ';
        $data = [
            'name' => $applicant->name,
            'lastname' => $applicant->lastname,
            'sex' => $applicant->sex,
            'birthyear' => $applicant->birthyear,
            'email' => $applicant->email,
            'group_num' => $applicant->group_num,
            'points' => $applicant->points,
            'is_local' => $applicant->is_local,
            'id' => $applicant->getId(),
        ];

        $statement = $this->connection->prepare($sql);
        $statement->execute($data);
    }

    public function getTotal()
    {
        $sql = '
            SELECT COUNT(id)
            FROM applicants;
        ';
        $statement = $this->connection->query($sql);

        return $statement->fetch(PDO::FETCH_COLUMN);
    }
}
