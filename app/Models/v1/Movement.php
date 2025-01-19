<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Movement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    protected $guarded = ['id'];

    public static function index(string|null $serch){
        $cacheKey = "movements_index_{$serch}";

        return Cache::remember($cacheKey, now()->addMinutes(30), function () use ($serch) {
            $records = self::select(
                'movements.name as moviment_name', 
                'users.name as user_name', 
                'personal_records.value as personal_record_value', 
                'personal_records.date as personal_record_date'
            )->leftJoin('personal_records', 'personal_records.movement_id', '=', 'movements.id')
            ->leftJoin('users', 'users.id', '=', 'personal_records.user_id')
            ->when(isset($serch), function ($query) use ($serch) {
                return $query->where('movements.name', 'like', '%' . $serch . '%');
            })
            ->whereNotNull('personal_records.id')
            ->orderBy('personal_record_value', 'desc')
            ->limit(50)
            ->get()
            ->toArray();
            
           
            $position = 1;
            $records = collect($records)->groupBy('personal_record_value')->map(function($data) use (&$position) {
                $data = collect($data)->toArray();
                $data = array_merge(['position' => $position, 'persons' => (array)$data]);
                $position++;
                return $data;
            });
            
            

            return $records->values();
        });
    }
}
