<?php


class AdminLesson extends Controller
{
    var $category,$course,$lesson;
    var $data,$adminRole;
    public function __construct()
    {
        if (!isset($_SESSION['adminisLogin']) || $_SESSION['adminisLogin'] == false){
            header("Location: ../Admin");
        } else{

            $this->adminRole=json_decode($_SESSION['adminInfo']['myrole'],true);

        }
        $this->course=$this->model("AdminCourseModel");
        $this->category=$this->model("AdminCategoryModel");
        $this->lesson=$this->model("AdminLessonModel");
        $this->data['category']=$this->category->getCategory();
    }

    public function viewLesson()
    {

       $this->view("Admin/LessonManager/viewLesson",$this->data);
    }
    public function showCourse()
    {
            $category_id=$_POST['category_id'];
            $data=$this->course->getCourseByCategory($category_id);
            echo json_encode($data);
    }
    public function getLesson()
    {
        $id_role=5;
        if (!isset($this->adminRole[$id_role])){
            echo 0;
        } else {
            $lesson_id = $_POST['lesson_id'];
            $lesson = $this->lesson->getLesson($lesson_id);
            echo json_encode($lesson);
        }
    }
    public function  editLesson()
    {
        if (!empty($_POST)) {
            $data = [];


            $data = array_chunk($_POST, 3);
            $id = [];

            foreach ($_POST as $key => $value) {
                array_push($id, $this->indexName($key));
            }
            $id = array_unique($id);

            for ($i = 0; $i < count($data); $i++) {
                $data[$i]['id'] = $id[$i * 3];
                $data[$i]['name'] = $data[$i][0];
                $data[$i]['video'] = $data[$i][1];
                $data[$i]['is_active'] = $data[$i][2];
                unset($data[$i][0], $data[$i][1], $data[$i][2]);
            }

//            echo "<pre>";
//            print_r($data);
//            die;
            $this->lesson->editLesson($data);


        }
    }
    public function  indexName($str)
    {
        $data=explode("-",$str);
        return $data[1];
    }
    public function  addLesson()
    {
        $id_role=4;
        if (!isset($this->adminRole[$id_role])){
            echo 0;
        } else {
            $id_course = $_POST['id_course'];
            $this->lesson->createLesson($id_course);
            $id = $this->lesson->getLessonLastest();
            echo $id[0]['id'];
        }
    }
}