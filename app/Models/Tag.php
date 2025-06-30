<?php

namespace App\Models;


// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $table = 'topics';
    public $timestamps = false;

    public function __construct(){
        parent::boot();
        static::addGlobalScope(new \App\Scopes\ActiveScope);
    }

    public function scopeGetDefault($query, $channelId){
        return $query->whereIn('channel_id', [(int)$channelId, (string)$channelId])
                    ->whereNotNull("regional_name")
                    ->where("english_name", '!=', '')
                    ->where("english_name", '!=', ' ')
                    ->where("slug", '!=', '')
                    ->where("slug", '!=', '-');
                    //->orderBy('eng_name', 'asc');
    }

    public function creater(){
        return $this->belongsTo(User::class, 'created_by', 'id');      
        
    }

}