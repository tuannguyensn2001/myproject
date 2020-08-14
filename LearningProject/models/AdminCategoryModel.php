<?php


class AdminCategoryModel extends Model
{
    public function getCategory($id='')
    {
        if (empty($id))
        $query="SELECT * FROM category";
        else
            $query="SELECT * FROM category WHERE id=$id";

        return $this->getData($query);
    }
    public function countCategory()
    {
        $query="SELECT COUNT(id) AS NumberOfCategory FROM category";
        return $this->getData($query);
    }
    public function editCategory($data)
    {
        $this->update($data,"category");
    }
    public function addCategory($data)
    {
        $this->create($data,"category");
    }
    public function deleteCategory($id)
    {
        $this->delete($id,"category");
    }

}