<?php
namespace Dylan\ComposerTp;

use PDO;
use App\Entity\User;

class UsersManager
{

    private $_db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }

    public function add(User $user): User
    {

    }

    public function delete(User $user): bool
    {

    }

    public function getOne(int $id)
    {
        $sth = $this->_db->prepare('SELECT nom ,role, email FROM user where id= ?;');
        $sth->execute(array($id));
        $ligne = $sth->fetch();
        $user = new User($ligne);
        return $user;

    }

    public function getList(): array
    {
        //retourne la liste de chaque Users
        $ListeDeUsers = array();
        $request = $this->_db->query('SELECT email, role FROM users');
        while ($ligne = $request->fetch(PDO::FETCH_ASSOC)) {

            $user = new User($ligne);
            $ListeDeUsers[] = $user; //entre le user dans le tableau
        }
        return $ListeDeUsers;
    }

    public function update(User $user)
    {

    }

}
