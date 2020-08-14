<?php


class AdminCourse extends  Controller
{
    var $course;
    var $category;
    var $data=array();
    var $adminRole;
    public function __construct()
    {
        if (!isset($_SESSION['adminisLogin']) || $_SESSION['adminisLogin'] == false){
            header("Location: ../Admin");
        } else{

            $this->adminRole=json_decode($_SESSION['adminInfo']['myrole'],true);

        }
        $this->category=$this->model("AdminCategoryModel");

        $this->course = $this->model("AdminCourseModel");
        $this->data['listCategory']=$this->category->getCategory();
        $this->data['listCourse']=$this->listCourse();
    }

    public function viewCourse()
    {


        $this->view("Admin/CourseManager/index",$this->data);
    }
    public function listCourse()
    {

       return $this->course->getCourse();
    }
    public function showCourse()
    {
        $id_role=2;
        if (!isset($this->adminRole[$id_role])){
            $courseDetails=0;
        } else {

            $id = $_POST['content'];
            $courseDetails['courseDetails'] = $this->course->getCourse($id)[0];
        }
        echo json_encode($courseDetails);
    }
    public function editCourse()
    {



       $data=$_POST;
       if (!empty($_FILES['thumbnail']['name'])) $data['typethumbnail']=$_FILES['thumbnail'];


       $this->course->editCourse($data);

       header("Location: viewCourse");
       exit();

    }
    public function addCourse()
    {

        $this->view("Admin/CourseManager/addCourse",$this->data);
    }
    public function createCourse()
    {
        $id_role = 1;
        if (!isset($this->adminRole[$id_role])) {
            setcookie("failed_admin", "Bạn không có quyền này", time() + 10);
        } else {

            $this->course->createCourse();
        }

            header("Location: viewCourse");

    }
    public function deleteCourse($data)
    {
        $id=$data[0];
      $this->course->deleteCourse($id);
      header("Location: ../viewCourse");
    }


}