<?php

class UserStore
{
    private $users = [];

    public function addUser($name, $mail, $pass)
    {
        if (isset($this->user[$mail])) {
            throw new Exception("User already exists");
        }
        if (strlen($pass) < 5) {
            throw new Exception("Password is too short");
        }
        $this->users[$mail] = ['pass' => $pass, 'mail' => $mail, 'name' => $name];

        return true;
    }

    public function notifyPasswordFailure($mail)
    {
        if (isset($this->user[$mail])) {
            $this->users[$mail]['failed'] = time();
        }
    }

    public function getUser($mail)
    {
        return $this->users[$mail];
    }

    public function removeUser($mail)
    {
        if (!isset($this->users[$mail])) {
            throw new Exception("User not exists");
        }

        unset($this->users[$mail]);
        return true;
    }
}
