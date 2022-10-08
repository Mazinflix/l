<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shoe extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const TYPE_SELECT = [
        'sport'   => 'سبورت',
        'classic' => 'كلاسيك',
    ];

    public $table = 'shoes';

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

    public function shoeShoesOptions()
    {
        return $this->hasMany(ShoesOption::class, 'shoe_id', 'id');
    }

    public function shoeOrders()
    {
        return $this->hasMany(Order::class, 'shoe_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
