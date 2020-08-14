<?php


class CourseController extends Controller
{
    public function  index($data)
    {
        $id=$data[0];

        $course=$this->model("CourseModel");
        $lesson['lesson']=$course->getLesson($id);

            $lesson['id_lesson']=$data[1];
            if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true) {
                $myCourse = $this->MyCourse($_SESSION['dataUser']['id']);

                $isCourse = $myCourse[$id] == 1 ? 1 : 0;

                $lesson['check'] = $isCourse;

            }
//            if ($lesson['check'] == 1)  $this->view("Outside/course",$lesson);
//            else{
//                header("Location: ../../../");
//
//            }

        $this->view("Outside/course",$lesson);


    }
    public function showMyCourse()
    {
        $myCourse=array();
        if (isset($_SESSION['isLogin'])) {
            if ($_SESSION['isLogin'] == true) {
                $data = $this->MyCourse(array($_SESSION['dataUser']['id']));
                $result = array();
                foreach ($data as $key => $value) {
                    if ($value == 1) array_push($result, $key);
                }

                $course = $this->model("CourseModel");
                $myCourse=$course->getMyCourse($result);


            }
        }

        $this->view("Outside/mycourse",$myCourse);
    }
    public function MyCourse($id)
    {
        $id=$id[0];
        $user=$this->model("UserModel");
        return ($user->getMyCourse($id));
    }
    public function check(){
        $user=$this->model("UserModel");
        $user->checkCourse();
    }


    public function setCourse($id)
    {
        if (isset($_SESSION['isLogin'])) {
            if ($_SESSION['isLogin'] == true) {
                $course = $this->MyCourse(array($_SESSION['dataUser']['id']));
                $id_course = $id[0];
                $course[$id_course] = intval($id[1]);
                $user = $this->model("UserModel");
                $data['mycourse'] = $course;
                $data['id'] = $_SESSION['dataUser']['id'];


                $user->setCourse($data);
            }
        }
    }


}