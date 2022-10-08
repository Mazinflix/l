<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'orders';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name_id',
        'shoe_id',
        'option_id',
        'price',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function name()
    {
        return $this->belongsTo(Customer::class, 'name_id');
    }

    public function shoe()
    {
        return $this->belongsTo(Shoe::class, 'shoe_id');
    }

    public function option()
    {
        return $this->belongsTo(ShoesOption::class, 'option_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
