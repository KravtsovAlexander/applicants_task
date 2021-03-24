<?php

namespace ApplicantTask;

use Exception;

abstract class ApplicantValidator
{
    static public function run(Applicant $applicant)
    {
        self::normalize($applicant);
        self::checkName($applicant->name);
        self::checkLastname($applicant->name);
        self::checkGroupNum($applicant->group_num);
        self::checkPoints($applicant->points);
        self::checkEmail($applicant->email);
        self::checkBirthyear($applicant->birthyear);
    }

    static private function checkName(string $name)
    {
        self::checkNameFormat($name, 'Имя');

        return true;
    }

    static private function checkLastname(string $lastname)
    {
        self::checkNameFormat($lastname, 'Фамилия');

        return true;
    }

    /**
     * Validate name and lastname
     * 
     * @param string $str String to be validated
     * @param string $fieldName Name of an input field
     * 
     * @return true|Exception
     */
    static private function checkNameFormat(string $str, string $fieldName)
    {
        if (!mb_strlen($str)) {
            throw new Exception("Заполните поле  \"$fieldName\"");
        }

        if (!preg_match_all("/^[а-яА-Я]{1,50}$/u", $str)) {
            throw new Exception("Поле \"$fieldName\" должно содержать только буквы русского алфавита
                и не превышать 50 символов");
        }

        return true;
    }

    /**
     * Validate № of the group
     * 
     * @return true|Exception
     */
    static private function checkGroupNum(string $groupNum)
    {
        if (!mb_strlen($groupNum)) {
            throw new Exception("Укажите номер группы");
        }

        if (!preg_match_all("/^[а-яА-Я0-9]{2,5}$/u", $groupNum)) {
            throw new Exception("Номер группы содержит от 2 до 5 цифр или букв русского алфавита");
        }
    }

    /**
     * Validate points
     * 
     * @return true|Exception
     */
    static private function checkPoints(string $points)
    {
        if (!mb_strlen($points)) {
            throw new Exception("Заполните поле  \"Суммарное число баллов ЕГЭ\"");
        }
        if (!preg_match_all("/^[0-9]+$/u", $points)) {
            throw new Exception("Суммарное число баллов должно быть целым положительным числом");
        }
        if ($points > 300 || $points < 0) {
            throw new Exception("Суммарное число егэ принимает значение от 0 до 300");
        }

        return true;
    }

    /**
     * Validate email
     * 
     * @return true|Exception
     */
    static private function checkEmail(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Неверный формат email");
        }

        $mapper = new ApplicantsMapper();
        if (!empty($mapper->getByEmail($email))) {
            throw new Exception("Email \"$email\" уже занят");
        }

        return true;
    }

    /**
     * Validate the year of an applicant's birthday
     * 
     * @return true|Exception
     */
    static private function checkBirthyear(string $year)
    {
        if (!mb_strlen($year)) {
            throw new Exception("Укажите год рождения");
        }

        if (!preg_match_all("/^[0-9]{4}$/", $year)) {
            throw new Exception("Год рождения должен состоять из 4 цифр");
        }

        if ($year > (date('Y') - 18) || $year < (date('Y') - 100)) {
            throw new Exception("Укажите корректный год рождения");
        }
    }

    /**
     * Normalize input values
     * 
     * @return void
     */
    static private function normalize(Applicant $applicant)
    {
        foreach ($applicant as $key => $value) {
            $applicant->$key = trim($value);
        }

        $applicant->name = mb_strtoupper(mb_substr($applicant->name, 0, 1)) .
            mb_strtolower(mb_substr($applicant->name, 1));

        $applicant->lastname = mb_strtoupper(mb_substr($applicant->lastname, 0, 1)) .
            mb_strtolower(mb_substr($applicant->lastname, 1));
    }
}
