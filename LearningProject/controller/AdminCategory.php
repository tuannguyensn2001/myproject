<?php


class AdminCategory extends  Controller
{
    var $category;
    var $data;
    var $adminRole;
    public function __construct()
    {
        $this->category=$this->model("AdminCategoryModel");
        $this->data['listCategory']=$this->category->getCategory();
        if (!isset($_SESSION['adminisLogin']) || $_SESSION['adminisLogin'] == false){
            header("Location: ../Admin");
        } else{

            $this->adminRole=json_decode($_SESSION['adminInfo']['myrole'],true);

        }
    }

    public function viewCategory()
    {
        $this->view("Admin/CategoryManager/index",$this->data);
    }
    public function showCategory()
    {
        $id_role = 12;
        if (!isset($this->adminRole[$id_role])) {
            echo 0;
        } else {


            $id = $_POST['content'];
            $list = $this->category->getCategory($id)[0];
            echo json_encode($list);
        }
    }
    public function editCategory()
    {
        $data['id']=$_POST['id'];
        $data['name']=$_POST['name'];


        $this->category->editCategory($data);
        header("Location: viewCategory");
    }
    public function addCategory()
    {
        $id_role=14;
        if (!isset($this->adminRole[$id_role])){
            setcookie("failed_admin","Bạn không có quyền thêm mới danh mục",time()+2);
        } else {
            $data['name'] = $_POST['name'];
            if (!empty($data['name'])) {
                $this->category->addCategory($data);

            }
        }
        header("Location: viewCategory");
    }
    public function deleteCategory($data)
    {
        $id_role=15;
        if (!isset($this->adminRole[$id_role])){
            setcookie("failed_admin1","Bạn không có quyền xóa khóa học",time()+2);
        } else {
            $id = $data[0];
            $this->category->deleteCategory($id);
        }
        header("Location: ../viewCategory");

    }
}