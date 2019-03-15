<?php
/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 14/03/2019
 * Time: 10:59
 */

class Pesquisa
{

    private $id;
    private $latitude;
    private $longitude;

    /**
     * Pesquisa constructor.
     * @param $id
     * @param $latitude
     * @param $longitude
     */
    public function __construct($id, $latitude, $longitude)
    {
        $this->id = $id;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }
}