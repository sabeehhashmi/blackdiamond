<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
class Property extends Model
{
    use HasFactory;
    use SearchableTrait;

    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'properties.name' => 10,
            'properties.city' => 10,
            'properties.address' => 8,
            'properties.detail_information' => 8,
            
        ],
        
    ];
    public function images(){
        return $this->hasMany(Attachment::class,'source_id','id');
    }
}
