<?php

class Role{
    protected $id;
    protected $role;


    public function getRoleById($connect, $id){
        $req = $connect->query("SELECT id, role FROM role WHERE id = ".$id);
        $req->setFetchMode(PDO::FETCH_OBJ);

        $role = new Role();
        while ($obj = $req->fetch()){
            $role->setId($obj->id);
            $role->setRole($obj->role);
        }
        return $role;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;

        return $this;
    }

    public function getRole(){
        return $this->role;
    }

    public function setRole($role){
        $this->role = $role;

        return $this;
    }
}