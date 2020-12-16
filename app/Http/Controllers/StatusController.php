<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;

use Validator;

class StatusController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $statuses = Status::orderBy('name', 'asc')->Paginate(3);
        // $statuses = Status::orderBy('name', 'asc')->simplePaginate(3);

        return view('statuses.index', ['statuses'=>$statuses]);
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), ['name'=>'required|max:255']);

        if($validator->fails()) {
            return redirect('/status')->withInput()->withErrors($validator);
        }


        $status = new Status;
        $status->name = $request->name;
        $status->save();
        return redirect('/status');
    }

    public function delete(Status $status) {
        $status->delete();
        return redirect('/status');
    }

    public function show(Status $status) {
        return view('statuses.show', ['status'=>$status]);
    }

    public function update(Request $request, Status $status) {
        $validator = Validator::make($request->all(), ['name'=>'required|max:255']);

        if($validator->fails()) {
            return redirect('status/'.$status->id)->withInput()->withErrors($validator);
        }

        $status->update(['name'=>$request->name]);
        return redirect('/status');
    }
}
