<?php


class HomeController extends Controller
{
    public function index()
    {
    $course = $this->model("CourseModel");
    $post=$this->model("PostModel");


    $data['course']=$course->getCourse();
    $data['post']=$post->getPost();




    $this->view("Outside/index",$data);
    }

}