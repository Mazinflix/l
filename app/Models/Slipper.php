<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slipper extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const TYPE_SELECT = [
        'slipper'   => 'شبشب',
        'flip-flop' => 'شحاط',
    ];

    public $table = 'slippers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function slipperSlipperOptions()
    {
        return $this->hasMany(SlipperOption::class, 'slipper_id', 'id');
    }

    public function slipperSlipperOrders()
    {
        return $this->hasMany(SlipperOrder::class, 'slipper_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
