<?php
class Brand {

    private $id_brand;
    private $name;

    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getIdBrand()
    {
        return $this->id_brand;
    }

    /**
     * @param mixed $id_brand
     */
    public function setIdBrand($id_brand)
    {
        $this->id_brand = $id_brand;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public static function add($dbc, $name){
        $query = 'INSERT INTO brand (id_brand, name)
    VALUES (NULL, :name)';
        $aBindParam = array(':name'=>$name);
        $add = $dbc->update($query, $aBindParam, __CLASS__);
        return $add;
    }

}