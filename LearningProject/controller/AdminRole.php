<?php


class AdminRole extends Controller
{
    var $role;
    var $data;
    public function __construct()
    {
        $this->role=$this->model("AdminRoleModel");
        $this->data['listRole']=$this->role->getRole();
    }

    public function viewRole()
    {
        $this->view("Admin/RoleManager/index",$this->data);
    }
    public function showRole()
    {
        $id=$_POST['content'];
        $list=$this->role->getRole($id)[0];
        echo json_encode($list);
    }
    public function editRole()
    {
        $data['id']=$_POST['id'];
        $data['name']=$_POST['name'];


        $this->role->editRole($data);
        header("Location: viewRole");
    }
    public function addRole()
    {
        $data['name']=$_POST['name'];
        if (!empty($data['name'])){
            $admin=$this->model("AdminUserModel");
            $adminRoles1=$admin->getManager();
            $adminRoles=json_decode($adminRoles1[0]['myrole'],true);
            $new=$this->role->getLastestRole()[0]['id'];
            $adminRoles[$new]=1;
            $datas['id']=$adminRoles1[0]['id'];
            $datas['myrole']=json_encode($adminRoles);



            $admin->editAdmin($datas);

            $this->role->addRole($data);

        }

        header("Location: viewRole");
    }
    public function deleteRole($data)
    {
        $id=$data[0];

        $this->role->deleteRole($id);
        header("Location: ../viewRole");

    }
}