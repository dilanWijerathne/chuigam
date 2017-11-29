<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class requestModel extends Model
{
    protected $table = 'help_requests';
    // protected $dates = [
    //     'created_at',
    //     'updated_at',
    //     'deleted_at'
    // ];
    protected $dateFormat = 'U';
}
