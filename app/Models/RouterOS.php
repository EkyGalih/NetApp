<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouterOS extends Model
{
    use HasFactory;

    protected $table = 'router_os';
    protected $guarded = [];

}
