<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\AncientScope;

class Offrts extends Model
{
    use HasFactory;

    protected $table = "offrts";
    protected $fillable = ['name','price', 'photo', 'details', 'created_at', 'Update_at', 'name_ar', 'name_en', 'statues'];
    protected $hidden = ['create-at', 'Update_at'];
    #protected $updated_at = false;


    // globel Scope thr error or not all select
    /*
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new AncientScope);
    }
    */

    // Local Scope
    public function scopeInactive($quere){
        return $quere->where('statues', 1);
    }

    public function scopeInvaled($quere){
        return $quere->where('statues', 1)->whereNull('details');
    }

    //Set Attribute mutators
    public function setNameEnAttribute($value)
    {
        $this->attributes['name_en'] = strtoupper($value);
    }
}
