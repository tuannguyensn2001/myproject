<?php


class AdminModel extends Model
{
    public function login($data)
    {
        $username=$data['username'];
        $password=$data['password'];
      $query="SELECT * FROM admin WHERE username='$username' AND password='$password'";
      return $this->getData($query);
    }
    public function getManager()
    {
        $query="SELECT * FROM admin WHERE role='Manager'";
        return $this->getData($query);
    }
    public function updateRoleManager($data)
    {
        foreach ($data as $index){
            $this->update($index,"admin");
        }
    }
}