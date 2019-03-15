<?php

namespace App\Dao;

use App\src\Conexao\Conexao;

/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 14/03/2019
 * Time: 11:09
 */

class BugFix
{
    public function __construct()
    {
        $this->conexao = Conexao::getInstance();
    }

    public function selectWithoutLatAndLon()
    {
        $sql = "SELECT * FROM pesquisa WHERE pesquisa.latitude = '0' AND pesquisa.cidade NOT LIKE 'Nao Informado' AND cidade NOT LIKE ''";
        $prepare = $this->conexao->prepare($sql);
        $prepare->execute();

        $result = $prepare->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function setLatitude($latitude, $longitude, $id)
    {
        $sql = "UPDATE pesquisa 
                    SET latitude  = :latitude, 
                        longitude = :longitude
              WHERE id = :id";


        $prepare = $this->conexao->prepare($sql);
         $prepare->bindParam(":id",$id,\PDO::PARAM_INT);
         $prepare->bindParam(":latitude",$latitude,\PDO::PARAM_STR);
         $prepare->bindParam(":longitude",$longitude,\PDO::PARAM_STR);
        $prepare->execute();
    }

}