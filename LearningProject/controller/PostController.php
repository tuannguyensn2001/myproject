<?php


class PostController extends Controller
{
    var $post;
    public function __construct()
    {
        $this->post=$this->model("PostModel");
    }

    public function viewPost($id='')
    {

       if (empty($id)){
           $post=$this->post->getPost();
           $this->view("Outside/posts",$post);
       }
       else{
           $id=$id[0];
           $post=$this->post->getPost($id);
           $this->view("Outside/postsDetails",$post[0]);
       }
    }
}