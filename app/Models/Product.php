<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'slug_name',
        'price',
        'price_sale',
        'infomation',
        'image',
        'product_type_id',
        'is_open',
    ];

    public function sluggable()
    {
        return [
            'slug_name' => [
                'source' => 'name'
            ]
        ];
    }

    public function attribute() {

        return $this->hasMany(Attribute::class,'product_id');

    }

}
