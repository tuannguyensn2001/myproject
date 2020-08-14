<?php


class Admin extends Controller
{
    var $data;
    var $users,$courses,$lessons,$posts,$categories;
    var $role;
    public function __construct()
    {
//            $this->categories=$this->model("AdminCategoryModel");
//            $this->data['NumberOfCategories']=$this->categories->countCategories()[0]['NumberOfCategories'];
           $array=[
               "User"=>"users",
               "Course"=>"courses",
               "Lesson"=>"lessons",
               "Post"=>"posts",
               "Category"=>"categories",
           ];

           foreach($array as $index=>$value){
               $this->$value=$this->model("Admin".$index."Model");
                $func="count$index";

               $this->data['NumberOf'.$index]=$this->$value->$func()[0]['NumberOf'.$index];

           }

            $this->role=$this->model("AdminRoleModel");
           $roles=$this->role->getRole();
           if (isset($_SESSION['adminInfo']['myrole'])) {
               $adminrole = json_decode($_SESSION['adminInfo']['myrole'], true);
               foreach ($roles as &$index) {
                   if (array_key_exists($index['id'], $adminrole)) {
                       $index['check'] = 1;
                   } else  $index['check'] = 0;
               }
           }
           $this->data['role']=$roles;



    }

    public function index()
    {




        if (!isset($_SESSION['adminisLogin']) || $_SESSION['adminisLogin'] == false)
        $this->view("Admin/login");
        else{

            $this->view("Admin/index",$this->data);
        }
    }
    public function adminLogin()
    {

       if (isset($_POST['username']) && isset($_POST['password'])){
           $data['username']=$_POST['username'];
           $data['password']=$_POST['password'];
           $admin=$this->model("AdminModel");
           $result=$admin->login($data);
           if (empty($result)) {
               setcookie("msgAdmin","Đăng nhập không thành công",time()+10);
               header("Location: ../Admin");

           } else{
               $_SESSION['adminisLogin']=true;
               $_SESSION['adminInfo']=$result[0];

               header("Location: ../Admin");
           }
    }


    }
    public function adminLogout()
    {
        unset($_SESSION['adminisLogin']);
        header("Location: ../Admin");
    }
    public function setManager()
    {
        $myrole=[];
        $admin=$this->model("AdminModel");
        $role=$this->model("AdminRoleModel");
        $dataRole=$role->getRole();
        foreach ($dataRole as $index){
            $myrole[$index['id']]=1;
        }
        $myrole=json_encode($myrole);
        $listAdmin=$admin->getManager();
        foreach ($listAdmin as &$index){
            $index['myrole']=$myrole;
        }
        $admin->updateRoleManager($listAdmin);
    }


}