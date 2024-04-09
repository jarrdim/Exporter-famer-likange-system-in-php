<?php

class Country extends Model
{
    protected $table = 'countries';
    public static function getCountries()
    {
        $country = new Country();

        $row =$country->where(['disabled'=>0]);
        if($row)
        {
            return $row;
        }
        
    }
    public function getStates()
    {
        $state = new Db();

        $sql =  "select * from state where disabled = :disabled";
        $row = $state->query($sql,['disabled'=>0]);
        if($row)
        {
            return $row;
        }
    }
    public static function getCountry($id)
    {

        $id = (int)$id;
        $country = new Country();

        $row =$country->where(['disabled'=>0,'id'=>$id]);

  
            
            return is_array($row) ? $row[0] : false;

    
        
    }
    public function getState($id)
    {
        $id = (int)$id;
        $state = new Db();

        $sql =  "select * from state where disabled = :disabled and id = :id";
        $row = $state->query($sql,['disabled'=>0, 'id'=>$id]);
     
        return is_array($row) ? $row[0] : false;
    }

}