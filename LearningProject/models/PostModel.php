<?php


class PostModel extends Model
{
    public function getPost($id='')
    {
        if (empty($id)){
            $query="SELECT p.*,c.name as category 
        FROM posts p 
        LEFT JOIN category c ON p.category_id=c.id";
        } else{
            $query="SELECT p.*,c.name as category 
        FROM posts p 
        LEFT JOIN category c ON p.category_id=c.id
        WHERE p.id=$id";
        }
        return $this->getData($query);
    }
}