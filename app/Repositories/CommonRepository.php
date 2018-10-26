<?php

namespace App\Repositories;

use App\Repositories\HouseRepository;
use App\Repositories\GolRepository;

/**
 * Class ClientRepository
 * @package App\Repositories
 * @version December 26, 2017, 10:08 am CST
 *
 * @method Client findWithoutFail($id, $columns = ['*'])
 * @method Client find($id, $columns = ['*'])
 * @method Client first($columns = ['*'])
*/
class CommonRepository 
{
 
     private $houseRepository;
     private $golRepository;
     public function __construct(HouseRepository $houseRepo,GolRepository $golRepo){
        $this->houseRepository = $houseRepo;
        $this->golRepository = $golRepo;

     }

     public function houseRepo(){
        return $this->houseRepository;
     }

     public function golRepo(){
        return $this->golRepository;
     }



  
}
