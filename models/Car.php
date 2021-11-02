<?php
class Car {
    private $id_car;
    private $seats;
    private $licencePlate;
    private $serialNumber;
    private $color;
    private $brand_id_brand;
    private $model_id_model;

    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getBrandIdBrand()
    {
        return $this->brand_id_brand;
    }

    /**
     * @param mixed $brand_id_brand
     */
    public function setBrandIdBrand($brand_id_brand)
    {
        $this->brand_id_brand = $brand_id_brand;
    }

    /**
     * @return mixed
     */
    public function getModelIdModel()
    {
        return $this->model_id_model;
    }

    /**
     * @param mixed $model_id_model
     */
    public function setModelIdModel($model_id_model)
    {
        $this->model_id_model = $model_id_model;
    }

    /**
     * @return mixed
     */
    public function getIdCar()
    {
        return $this->id_car;
    }

    /**
     * @param mixed $id_car
     */
    public function setIdCar($id_car)
    {
        $this->id_car = $id_car;
    }

    /**
     * @return mixed
     */
    public function getSeats()
    {
        return $this->seats;
    }

    /**
     * @param mixed $seats
     */
    public function setSeats($seats)
    {
        $this->seats = $seats;
    }

    /**
     * @return mixed
     */
    public function getLicencePlate()
    {
        return $this->licencePlate;
    }

    /**
     * @param mixed $licencePlate
     */
    public function setLicencePlate($licencePlate)
    {
        $this->licencePlate = $licencePlate;
    }

    /**
     * @return mixed
     */
    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

    /**
     * @param mixed $serialNumber
     */
    public function setSerialNumber($serialNumber)
    {
        $this->serialNumber = $serialNumber;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * Affiche la liste des véhicules
     *
     * @param $dbc
     * @return false|string
     */
    public static function getListJson($dbc) {
        $query = ("SELECT serialNumber, seats FROM car ORDER BY id_car");
        $reponse = $dbc->classlistJson($query, PDO::FETCH_ASSOC);
        return json_encode($reponse);

    }

    /**
     * Permet d'afficher un véhicule via son serialNumber et d'afficher
     * son numéro de série, le nb de siege et la couleur
     *
     * @param $dbc
     * @param $serialNumber
     * @return false|string
     */
    public static function getCarBySerialNumberJson($dbc, $serialNumber) {
        $query = ('SELECT serialNumber, seats, color, name FROM `car`
INNER JOIN brand ON brand_id_brand = id_brand WHERE serialNumber = :serialNumber');
        $aBindParam = array(':serialNumber'=>$serialNumber);
        $select = $dbc->selectJson($query, $aBindParam, __CLASS__);
        return json_encode($select);
    }

    /**
     * Permet d'ajouter un véhicule
     *
     * @param $dbc
     * @param $seats
     * @param $licensePlate
     * @param $serialNumber
     * @param $color
     * @param $brand_id_brand
     * @param $model_id_model
     * @return mixed
     */
    public static function addCar($dbc, $seats, $licencePlate, $serialNumber, $color, $brand_id_brand, $model_id_model){
        $query = 'INSERT INTO car (id_car, seats, licencePlate, serialNumber, color, brand_id_brand, model_id_model)
    VALUES (NULL, :seats, :licencePlate, :serialNumber, :color, :brand_id_brand, :model_id_model)';
        $aBindParam = array(':seats'=>$seats,':licencePlate'=>$licencePlate,':serialNumber'=>$serialNumber, ':color'=>$color, ':brand_id_brand'=>$brand_id_brand, ':model_id_model'=>$model_id_model);
        $add = $dbc->update($query, $aBindParam, __CLASS__);
        return $add;
    }

    /**
     * Permet de modifier un véchicule
     *
     * @param $dbc
     * @param $id_car
     * @param $seats
     * @param $licencePlate
     * @param $serialNumber
     * @param $color
     * @param $brand_id_brand
     * @param $model_id_model
     * @return mixed
     */
    public static function updateCar($dbc, $id_car, $seats, $licencePlate, $serialNumber, $color, $brand_id_brand, $model_id_model) {

        $query = 'UPDATE car
    SET seats = :seats,
        licencePlate = :licencePlate,
        serialNumber = :serialNumber,
        color = :color,
        brand_id_brand = :brand_id_brand,
        model_id_model = :model_id_model
    WHERE id_car = :id_car';
        $aBindParam = array(':id_car'=>$id_car,':seats'=>$seats,':licencePlate'=>$licencePlate,':serialNumber'=>$serialNumber, ':color'=>$color, ':brand_id_brand'=>$brand_id_brand, ':model_id_model'=>$model_id_model);
        $update = $dbc->update($query, $aBindParam, __CLASS__);
        return $update;
    }

    /**
     * Permet de supprimer un véhicule
     *
     * @param $dbc
     * @param $id_car
     */
    public static function delete($dbc, $id_car) {
        $query = 'DELETE FROM car WHERE id_car = :id_car';
        $aBindParam = array('id_car'=>$id_car);
        $dbc->update($query, $aBindParam, __CLASS__);
    }

}