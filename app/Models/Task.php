<?php

namespace App\Models;

use App\Models\Project as ModelsProject;
use App\Project;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'description','project_id','points', 'completion_date', 'added_by',
                            'status', 'manager_id', 'admin_id', 'employee_id', 'icon', 'time', 'department_id', 'experience'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
