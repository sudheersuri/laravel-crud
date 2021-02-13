<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activities;

class ActivitiesController extends Controller
{
    public function index()
    {
        $activityname = request('activityname');
        $timespent = request('timespent');
        $activitiesobj=new Activities(); 
        $activitiesobj->activityname=$activityname;
        $activitiesobj->timespent=$timespent;
        $activitiesobj->save();
        return redirect('home');
    }
    public function edit()
    {
        $id = request('activityid');
        $record = Activities::findOrFail($id);
        $record->activityname=request('activityname');
        $record->timespent=request('timespent');
        $record->save();
        return redirect('home');
    }
    public function delete($id)
    {
        $record = Activities::findOrFail($id);
        $record->delete(); 
        return redirect('home');
    }
    public function activitydetail($id)
    {
        $record = Activities::where('id',$id)->get(); 
        return response()->json($record);
    }
}
