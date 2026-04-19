<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $fillable = [
       'name',
       'price',
       'stock',
       'description',
       'sale',
       'image',
       'category_id',
       'vendor_id'

   ];
}
