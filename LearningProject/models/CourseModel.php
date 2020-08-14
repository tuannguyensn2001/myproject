<?php


class CourseModel extends Model
{
    public function getCourse()
    {
        $query="SELECT * FROM course ";
        return $this->getData($query);
    }
    public function getLesson($id)
    {
        $query="SELECT l.*,c.name as course, c.description
FROM learning l
LEFT JOIN course c ON c.id=l.id_course
WHERE c.id=$id AND l.is_active=1";
        return $this->getData($query);
    }
    public function getMyCourse($data)
    {
        $result=array();
        foreach($data as $index){
            $query="SELECT * FROM course WHERE id=$index";
            array_push($result,$this->getData($query)[0]);
        }
        return $result;
    }

}