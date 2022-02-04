<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $table='employees';
    protected $primaryKey='emp_id';

    protected $fillable = [
        'emp_image', 'job_id','password', 'emp_name', 'emp_email', 'emp_phone', 'department_id', 'designation_id', 'emp_salary', 'join_date', 'end_date', 'emp_em', 'status'
    ];

    public function dep()
    {
        return $this->belongsTo(Department::class, 'dep_id', 'dep_id');
    }
}
