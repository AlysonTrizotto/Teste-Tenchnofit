<?php 

namespace App\Http\Services\v1;

use App\Http\Repositories\v1\MovementsRepository;

class MovementsServices {
    private MovementsRepository $movements;

    public function __construct() {
        $this->movements = new MovementsRepository();
    }

    public function index(string|null $serch) {
        return $this->movements->index(serch: $serch);
    }
}

?>