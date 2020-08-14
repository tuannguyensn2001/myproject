<?php


class AdminUser extends  Controller
{
    var $user,$course;
    var $data,$adminRole,$role;
    public function __construct()
    {
        if (!isset($_SESSION['adminisLogin']) || $_SESSION['adminisLogin'] == false){
            header("Location: ../Admin");
        } else{

            $this->adminRole=json_decode($_SESSION['adminInfo']['myrole'],true);

        }
        $this->role=$this->model("AdminRoleModel");
        $this->user=$this->model("AdminUserModel");
        $this->course=$this->model("AdminCourseModel");
        $this->data['listUser']=$this->user->getUser();
        $this->data['listCourse']=$this->course->getCourseActive();
        $this->data['listRole']=$this->role->getRole();
        $this->data['listadmin']=$this->user->getAdmin();
    }

    public function viewUser()
    {


        $this->view("Admin/UserManager/viewUser",$this->data);
    }
    public function editUser()
    {
        if ( empty($_POST['password'])) unset($_POST['password']);
        $data=$_POST;
        $mycourse=$this->user->getUser($_POST['id'])[0]['mycourse'];
        $mycourse=json_decode($mycourse,true);
        foreach($mycourse as $key=>$index){
            $mycourse[$key]= isset($data[$key]) ? 1 : 0;
            unset($data[$key]);
        }
       $data['mycourse']=json_encode($mycourse);
        $this->user->editUser($data);

        header("Location: viewUser");

    }
    public function showUser()
    {
        $id_role=3;
        if (!isset($this->adminRole[$id_role])){
            echo 0;
        } else {
            $id = $_POST['id'];
            $data = $this->user->getUser($id)[0];
            echo json_encode($data);
        }
    }
    public function viewAdmin()
    {




          $this->view("Admin/UserManager/viewAdmin",$this->data);
    }
    public function  showAdmin()
    {
        $id=$_POST['id'];
        $result=$this->user->getAdmin($id)[0];
        echo json_encode($result);
    }
    public function editAdmin()
    {
        if (isset($_POST['id'])){
            $data=$_POST;
//            $myrole=$this->user->getAdmin($_POST['id'])[0]['myrole'];
//            $myrole=json_decode($myrole,true);
//            foreach($myrole as $key=>$index){
//                $myrole[$key]= isset($data[$key]) ? 1 : 0;
//                unset($data[$key]);
//            }
            $data1=$data;
            unset($data1['id']);
            foreach($data1 as $key=>$value){
                $myrole[$key]=1;
                unset($data[$key]);
            }
            $data['myrole']=json_encode($myrole);
            $this->user->editAdmin($data);
            header("Location: viewAdmin");
        }
    }
}