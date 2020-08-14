<?php


class UserModel extends Model
{
    public function checkUser($data)
    {

        $query="SELECT * FROM users WHERE email='".$data['email']."' AND password='".$data['password']."'";
        $result=$this->getData($query);
        return $result;
    }
    public function checkCourse(){

        $query="SELECT id FROM course";
        $result=$this->getData($query);
        $data=array();
        foreach ($result as $index){
            $data[$index['id']]=0;
        }


        return json_encode($data);
    }
    public function getMyCourse($id){
        $query="SELECT mycourse FROM users WHERE id=$id";
        $data=$this->getData($query)[0]['mycourse'];

        return json_decode($data,true);

    }
    public function setCourse($data){
       $id=$data['id'];
       $mycourse=json_encode($data['mycourse']);
       $query="UPDATE users SET mycourse='".$mycourse."' WHERE id=$id";
        $this->conn->query($query);


    }
    public function  createUser($user)
    {
        $myCourse=$this->checkCourse();
        $user['mycourse']=$myCourse;
        $user['is_active']=1;
        $this->create($user,"users");


        header("Location: signIn");
    }

}