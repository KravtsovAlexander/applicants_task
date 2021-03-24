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
        if (!isset($applicant->id)) {
        }
        $sql = "
            INSERT INTO applicants(name, lastname, sex, group_num, email, points, birthyear, is_local)
            VALUES
            (:name, :lastname, :sex, :group_num, :email, :points, :birthyear, :is_local);
        ";

        $data = [
            'name' => $applicant->getName(),
            'lastname' => $applicant->getLastname(),
            'sex' => $applicant->getSex(),
            'group_num' => $applicant->getgroup_num(),
            'email' => $applicant->getEmail(),
            'points' => $applicant->getPoints(),
            'birthyear' => $applicant->getBirthyear(),
            'is_local' => $applicant->getIs_local(),
        ];

        $statement = $this->connection->prepare($sql);
        $statement->execute($data);
    }

    public function getApplicants() {
        $sql = 'SELECT name, lastname, group_num, points FROM applicants';
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }
}
