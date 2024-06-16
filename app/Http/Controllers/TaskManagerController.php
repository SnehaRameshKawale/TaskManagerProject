<?php

namespace App\Http\Controllers;

use App\Models\CompleteTaskModel;
use App\Models\TaskManagerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function complete($id)
    {
        $data = TaskManagerModel::find($id);
        if(empty($data)){
            $data = [
                'status'=>200,
                'message'=>'The requested id not found'
            ];
            return response($data,200);
        }else{

            $title = $data->title;
            $description = $data->description;
            $priority = $data->priority;
            $duedate = $data->duedate;

            $addTask = new CompleteTaskModel;

            $addTask->title = $title;
            $addTask->description = $description;
            $addTask->priority = $priority;
            $addTask->duedate = $duedate;
            $addTask->save();
        

            $data->delete();
            return redirect('/taskManager');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required',
            'priority'=>'required',
            'duedate'=>'required'
        ]);

        if($validation->fails()){
            $data = [
                'status'=>200,
                'message'=>$validation->messages()
            ];
            return response()->json($data,200);
        }else{
            $addTask = new TaskManagerModel;

            $addTask->title = $request->input('title');
            $addTask->description = $request->input('description');
            $addTask->priority = $request->input('priority');
            $addTask->duedate = $request->input('duedate');
            $addTask->save();

            return redirect('/api/taskManager');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data = TaskManagerModel::all();

        $compactData = compact('data');

        return view('taskManager')->with($compactData);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = TaskManagerModel::find($id);

        $compactData = compact('data');

        return view('editForm')->with($compactData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = TaskManagerModel::find($id);

        $data->title = $request->input('title');
        $data->description = $request->input('description');
        $data->priority = $request->input('priority');
        $data->duedate = $request->input('duedate');
        $data->save();

        return redirect('/taskManager');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function remove($id)
    {
        $iteam = TaskManagerModel::find($id);

        if(empty($iteam)){
            $data = [
                'status'=>200,
                'message'=>'The requested id not found'
            ];
            return response($data,200);
        }else{
            $iteam->delete();
            return redirect('/taskManager');
        }
    }

    public function removeCompletedTask($id){
        $iteam = CompleteTaskModel::find($id);

        if(empty($iteam)){
            $data = [
                'status'=>200,
                'message'=>'The requested id not found'
            ];
            return response($data,200);
        }else{
            $iteam->delete();
            return redirect('/taskManager/completedTasks');
        }
    }

    public function showCompletedTask(){
        $data = CompleteTaskModel::all();
        $compactData = compact('data');

        return view('completedTask')->with($compactData);
    }
}
