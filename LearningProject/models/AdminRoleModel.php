<?php


class AdminRoleModel extends Model
{
    public function getRole($id='')
    {
        if (empty($id))
        $query="SELECT * FROM role";
        else{
            $query="SELECT * FROM role where id =$id";
        }
        return $this->getData($query);
    }
    public function editRole($data)
    {
        $this->update($data,"role");
    }
    public function addRole($data)
    {
        $this->create($data,"role");

    }
    public function deleteRole($id)
    {
        $this->delete($id,"role");
    }
    public function getLastestRole()
    {
        $query="SELECT id FROM role ORDER BY id DESC";
        return $this->getData($query);
    }
}