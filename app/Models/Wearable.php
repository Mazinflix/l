<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wearable extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const TYPE_SELECT = [
        'trousers' => 'بنطلون',
        'shirt'    => 'قميص',
        'T-shirt'  => 'تيشيرت',
    ];

    public $table = 'wearables';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'country',
        'type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function wearableWearableOptions()
    {
        return $this->hasMany(WearableOption::class, 'wearable_id', 'id');
    }

    public function wearableWearableOrders()
    {
        return $this->hasMany(WearableOrder::class, 'wearable_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
