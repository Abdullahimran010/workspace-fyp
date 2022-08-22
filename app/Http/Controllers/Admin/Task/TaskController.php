<?php

namespace App\Http\Controllers\Admin\Task;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where("manager_id","!=",0)->latest()->get();
        $assignedtasks = Task::where(["manager_id" => 0])->latest()->get();
        return view('admin.task.index', compact('tasks','assignedtasks'));
    }

    public function create()
    {
        return view('admin.task.create');
    }

    public function store(Request $request)
    {
        
        $managers = Manager::with('department')->where(['experience' => $request->experience, 'department_id' => $request->department_id])->get();
          
        $counterForManagerFilteration = 0;
        $numberOfTasksForComparisonBetweenManagers = 0;
        $selectedManagerId = 0;

        foreach($managers as $manager)
        {
            $numberOfTasks = Task::where(["manager_id" => $manager->id,"status" => "ongoing"])->get();
            if(count($numberOfTasks) < 2)
            {
                if($counterForManagerFilteration == 0)
                {
                    $numberOfTasks = Task::where(["manager_id" => $manager->id,"status" => "ongoing"])->get();
                    $numberOfTasksForComparisonBetweenManagers = count($numberOfTasks);
                    $selectedManagerId = $manager->id;
                }else
                {
                    $numberOfTasks = Task::where(["manager_id" => $manager->id,"status" => "ongoing"])->get();
                    if(count($numberOfTasks) < $numberOfTasksForComparisonBetweenManagers)
                    {
                        $selectedManagerId = $manager->id;
                    }
                }
            }
            $counterForManagerFilteration++;
        }

        $task = Task::create($request->all());
        
        $task->update([
            "manager_id" => $selectedManagerId 
        ]);

        if($selectedManagerId == 0)
        {
            return redirect(route('adminTasks.index'))->with('error', 'All managers are busy. Try to assign manually.');
        }
        
        if($task !=null)
        {
            return redirect(route('adminTasks.index'))->with('success', 'Task Created Successfully.');
        }else   
        {
            return redirect(route('adminTasks.index'))->with('error', 'unable to create task.');
        }

        
    }

    public function show(Task $adminTask)
    {
        return view('admin.task.show', compact('adminTask'));
    }

    public function edit(Request $request, Task $adminTask)
    {
        return view('admin.task.edit', compact('adminTask'));
    }

    public function update(Request $request, Task $adminTask)
    {
        $adminTask->update($request->except('icon'));

        if ($request->hasFile('icon')) {
            $filePath = $request->file('icon')->store('task', 'public');
            $adminTask->update([
                "icon" => $filePath
            ]);
        }
        return redirect(route('adminTasks.index'))->with('success', 'Task Updated Successfully');
    }

    public function destroy(Task $adminTask)
    {
        $adminTask->delete();
        return redirect()->back()->with('success', 'Task Deleted Successfully');
    }

    public function predictManagers(Request $request)
    {
        $managersHtmlToSend = "";
        $managers = "";
        if ($request->experience == 0) {
            $managers = Manager::with('department')->where(['department_id' => $request->department_id])->get();
        } else if ($request->department_id == 0) {
            $managers = Manager::where(['experience' => $request->experience])->get();
        } else {
            $managers = Manager::with('department')->where(['experience' => $request->experience, 'department_id' => $request->department_id])->get();
        } 

        if (count($managers) > 0) {
            foreach ($managers as $manager) {
                if ($manager->no_of_assigned_tasks < 4) {
                    if ($manager->no_of_assigned_tasks < 1) {

                        $managersHtmlToSend .= "<div class='card m-2 shadow-lg col-md-5 pt-2' style='height:200px'>
                         <div class='row'>
                              <div class='col-md-5'>
                                 <img style='height:100px;width:100px;border-radius:15px;' src='https://images.unsplash.com/photo-1471879832106-c7ab9e0cee23?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mnx8fGVufDB8fHx8&w=1000&q=80' />
                                 <p>" . $manager->name . "</p>
                                 <p>" . $manager->department->name . "</p>

                             </div>
                              <div class='col-md-7'>
                                 <p> <span style='font-size: x-large;'>" . $manager->experience . "</span>&nbsp;Years experience</p>
                                 <p><span style='font-size: x-large;'>100%</span>&nbsp;Task Assigning</p>
    
                              </div>
                         </div>
                     </div>";
                    } else if ($manager->no_of_assigned_tasks == 1) {

                        $managersHtmlToSend .= "<div class='card m-2 shadow-lg col-md-5 pt-2' style='height:200px'>
                         <div class='row'>
                              <div class='col-md-5'>
                                 <img style='height:100px;width:100px;border-radius:15px;' src='https://images.unsplash.com/photo-1471879832106-c7ab9e0cee23?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mnx8fGVufDB8fHx8&w=1000&q=80' />
                                 <p>" . $manager->name . "</p>
                                 <p>" . $manager->department->name . "</p>
                             </div>
                              <div class='col-md-7'>
    
                                 <p> <span style='font-size: x-large;'>" . $manager->experience . "</span>&nbsp;Years experience</p>
                                 <p><span style='font-size: x-large;'>75%</span>&nbsp;Task Assigning</p>
    
                              </div>
                         </div>
                     </div>";
                    } else if ($manager->no_of_assigned_tasks == 2) {
                        $managersHtmlToSend .= "<div class='card m-2 shadow-lg col-md-5 pt-2' style='height:200px'>
                        <div class='row'>
                             <div class='col-md-5'>
                                <img style='height:100px;width:100px;border-radius:15px;' src='https://images.unsplash.com/photo-1471879832106-c7ab9e0cee23?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mnx8fGVufDB8fHx8&w=1000&q=80' />
                                <p>" . $manager->name . "</p>
                                <p>" . $manager->department->name . "</p>
                            </div>
                             <div class='col-md-7'>
    
                                <p> <span style='font-size: x-large;'>" . $manager->experience . "</span>&nbsp;Years experience</p>
                                <p><span style='font-size: x-large;'>50%</span>&nbsp;Task Assigning</p>
    
                             </div>
                        </div>
                    </div>";
                    } else if ($manager->no_of_assigned_tasks == 3) {
                        $managersHtmlToSend .= "<div class='card m-2 shadow-lg col-md-5 pt-2' style='height:200px'>
                        <div class='row'>
                             <div class='col-md-5'>
                                <img style='height:100px;width:100px;border-radius:15px;' src='https://images.unsplash.com/photo-1471879832106-c7ab9e0cee23?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mnx8fGVufDB8fHx8&w=1000&q=80' />
                                <p>" . $manager->name . "</p>
                                <p>" . $manager->department->name . "</p>
                            </div>
                             <div class='col-md-7'>
    
                                <p> <span style='font-size: x-large;'>" . $manager->experience . "</span>&nbsp;Years experience</p>
                                <p><span style='font-size: x-large;'>25%</span>&nbsp;Task Assigning</p>
    
                             </div>
                        </div>
                    </div>";
                    }
                }
            }
        } else {
            $managersHtmlToSend .= "<div class='card shadow-lg col-md-12 pt-2' style='height:150px'>
            <div class='row pt-5' style='padding:20px;'>
                <h2>No Managers found.</h2>                                             
            </div>    
        </div>";
        }

        return $managersHtmlToSend;
    }
}
