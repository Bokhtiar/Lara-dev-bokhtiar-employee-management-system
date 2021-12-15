<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $table='departments';
    protected $primaryKey='dep_id';

    protected $fillable = [
        'dep_name', 'status',
    ];
}
