<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table = "countries";
    protected $fillable = ['id','name'];
    protected $hidden = ['create-at', 'pdate_at'];
    public $timestamps = false;

    public function doctor(){
        return $this->hasManyThrough('App\Models\Doctor', 'App\Models\Hospital', 'countrie_id', 'hospital_id', 'id', 'id');
    }

}
