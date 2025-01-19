<?php

namespace App\Http\Repositories\v1;

use App\Http\Interfaces\v1\MovementsInterface;
use App\Models\v1\Movement;

class MovementsRepository implements MovementsInterface {
    
    private Movement $careerObjectives;
    public function __construct() {
        $this->careerObjectives = new Movement();
    }

    public function index(string|null $serch) {
        return $this->careerObjectives::index(serch: $serch);
    }  
}

?>