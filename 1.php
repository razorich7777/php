<?php

declare(strict_types=1);

    class UserStatuses{
        const CREATED = 0;
        const ACTIVATED = 1;
        const BANED = 2;
    }
    class FuncOfSuperUser{
        const DELETE = 'Delete';
        const HELP = 'Help';
        const UPDATE = 'Update';
        const  STOP = 'Stop';
    }


    class User{
        public $name;
        private $status;
        private $id;
        public $login;
        public $created;

        public function __construct(int $id,string $login,string $name,int $status, $created){
            $this -> id = $id;
            $this -> login = $login;
            $this -> name = $name;
            $this -> status = $status;
            $this -> created = $created;
            $this -> now = time();
        }
        public function activate(){
            $this -> status = UserStatuses::ACTIVATED;
    
        }
        public function ban(){
            $this -> status = UserStatuses::BANED;
    
        }
        public function pro(){
            $this -> status = UserStatuses::CREATED;
    
        }
    }
    class SuperUser extends User{
        private $change;

        public function __construct(int $id, string $login, string $name, int $status, $created)
        {
            parent::__construct($id, $login, $name, $status, $created);
            $change = FuncOfSuperUser::HELP;
            $this->change = $change;
        }


        public function helpMe()
        {
            $this->change = FuncOfSuperUser::HELP;
        }
        public function stopMe()
        {
            $this->change = FuncOfSuperUser::STOP;
        }
        public function deleteMe()
        {
            $this->change = FuncOfSuperUser::DELETE;
        }
        public function updateMe()
        {
            $this->change = FuncOfSuperUser::UPDATE;
        }
    }

$user1 = new User(99, 'sergius', 'Sergey', 404, date('H:i:s'));
$user1->activate();
$user1->pro();



//var_dump($user1);
echo '<pre>';
print_r($user1);
echo '</pre>';


$user2 = new User(86, 'ulius', 'Ulia', 505, date('H:i:s'));


$user2->ban();
echo '<pre>';
print_r($user2);
echo '</pre>';

$user3 = new SuperUser(89, 'super user', 'Nastya', 200, date('H:i:s'));
$user3->deleteMe();
$user3->ban();

echo '<pre>';
print_r($user3);
echo '</pre>';

class myList
{
    private $users;

    public function __construct()
    {
        $this->users = [];
    }

    public function addUsers(User $users)
    {
        $this->users[] = $users;
    }
}

$list = new myList();
$list->addUsers($user1);
$list->addUsers($user2);
$list->addUsers($user3);

echo '<pre>';
print_r($list);
echo '</pre>';