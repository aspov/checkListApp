<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckListItem extends Model
{
    protected $fillable = [
        'text', 'status'
    ];

    public function checkList()
    {
        return $this->belongsTo('App\CheckList', 'check_list_id');
    }
}
