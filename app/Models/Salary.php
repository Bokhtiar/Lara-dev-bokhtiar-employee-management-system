<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $table='salaries';
    protected $primaryKey='salary_id';

    protected $fillable = [
        'name', 'job_id', 'salary', 'day', 'month', 'year', 'status',
    ];

    public function emp()
    {
        return $this->belongsTo(Employee::class, 'emp_id', 'emp_id');
    }
}
