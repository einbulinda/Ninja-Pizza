<?php

class User
{
    private $email;
    private $name;

    public function __construct($name, $email)
    {
        // $this->email = 'einbulinda@gmail.com';
        // $this->name = 'Einstein';

        $this->email = $email;
        $this->name = $name;
    }

    public function login()
    {
        echo $this->name . ' has logged in. <br/>';
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        if (is_string($name) && strlen($name) > 4) :
            $this->name = $name;
            return "The name has been updated to $name";
        else :
            return "$name is not a valid name";
        endif;
    }
}

// $userOne = new User();

// $userOne->login();
// echo $userOne->email;

$userTwo = new User('Ray', 'ray@gmail.com');

// echo $userTwo->email . '<br/>';
// echo $userTwo->name;
// echo $userTwo->getName();
echo $userTwo->setName('566443');
