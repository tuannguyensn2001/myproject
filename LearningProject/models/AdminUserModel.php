<?php


class AdminUserModel extends Model
{

    public function  getUser($id='')
    {
        if (empty($id)){
            $query="SELECT * FROM users";
        }
        else{
            $query="SELECT * FROM users WHERE id=$id";
        }
        return $this->getData($query);
    }
    public function editUser($data)
    {


        $result=$this->update($data,"users");




    }
    public function getAdmin($id='')
    {
        $query= empty($id) ? "SELECT * FROM admin WHERE role='admin'" : "SELECT * FROM admin WHERE id=$id ";
        return $this->getData($query);
    }
    public function getManager()
    {
        $query="SELECT * FROM admin WHERE role='Manager'";
        return $this->getData($query);
    }
    public function editAdmin($data)
    {
        $this->update($data,'admin');
    }
    public function countUser()
    {
        $query="SELECT COUNT(id) AS NumberOfUser FROM users";
        return $this->getData($query);
    }
}