<?php


class Model
{
    public $conn;
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "learning1";

    public function __construct(){
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

    }
    public function getData($query){
        $result=$this->conn->query($query);
        $array=array();
        while ($row = $result -> fetch_assoc()){
            $array[] = $row;
        }
        return $array;
    }
    public function delete($id,$table){

        $query="DELETE FROM $table WHERE id=$id";

        $result=$this->conn->query($query);

    }
    public function doQuery($query){
        $result=$this->conn->query($query);
        return $result;
    }
    public  function update($data,$table)
    {
        $query_array=[];



        foreach ($data as $key=>$val){

            $query_array[] = is_numeric($val) ? $key."=".$val : $key."="."'$val'";


        }
        $id=$data['id'];
        unset($query_array[0]);
        $query=implode(",",$query_array);
        $query="UPDATE $table SET $query WHERE id=$id";

        $result=$this->doQuery($query);
            return $result;
    }
    public function create($data,$table)
    {


        $column=[];
        $value=[];
        foreach($data as $key=>$val){
            $column[]=$key;
            $value[]= is_numeric($val) ? $val : "'$val'";
        }
        $columnquery=implode(",",$column);
        $valuequery=implode(",",$value);
        $query="INSERT INTO $table ($columnquery) VALUES ($valuequery) ";

        $result=$this->doQuery($query);


    }

}