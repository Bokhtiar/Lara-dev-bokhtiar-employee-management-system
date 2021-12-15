<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $table='designations';
    protected $primaryKey='d_id';

    protected $fillable = [
        'd_name', 'status',
    ];
}
