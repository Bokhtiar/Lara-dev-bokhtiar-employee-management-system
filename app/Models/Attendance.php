<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $table='attendances';
    protected $primaryKey='attendance_id';

    protected $fillable = [
        'emp_id', 'job_id', 'in', 'out', 'em', 'let', 'lon', 'streetAdreess', 'status',
    ];

    public function emp()
    {
        return $this->belongsTo(Employee::class, 'emp_id', 'emp_id');
    }
}
