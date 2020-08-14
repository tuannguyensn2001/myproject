<?php


class AdminLessonModel extends  Model
{
    public function  getLesson($id)
    {
        $query="SELECT * FROM learning WHERE id_course=$id";
        return $this->getData($query);
    }
    public function editLesson($data)
    {
       foreach($data as $index){
           $this->update($index,"learning");
       }
       header("Location: viewLesson");
    }
    public function createLesson($id)
    {
        $query="INSERT INTO learning (id_course) VALUES ($id)";
        $this->doQuery($query);
    }
    public function getLessonLastest()
    {
        $query="SELECT id FROM learning ORDER BY id DESC LIMIT 1";
        return $this->getData($query);
    }
    public function countLesson()
    {
        $query="SELECT COUNT(id) AS NumberOfLesson FROM learning";
        return $this->getData($query);
    }
}