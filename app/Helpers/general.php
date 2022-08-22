<?php

use App\Models\Department;
use App\Models\Project;

function _getAllDepartments()
{
    $departments = Department::all();
    return $departments;
}

function _getAllProjects()
{
    $projects = Project::all();
    return $projects;
}

?>