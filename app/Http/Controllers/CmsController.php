<?php

namespace App\Http\Controllers;

use App\Models\Cms;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCmsRequest;
use App\Http\Requests\UpdateCmsRequest;
use Illuminate\Support\Facades\Validator;

class CmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = [];
        if ($request->ajax()) {
            $data = Cms::orderBy('id', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('check', function($row1){
                    $btn1 = '<div class="custom-control custom-checkbox">
                        <input class="custom-control-input values" name="userselect[]"
                        value="'.$row1->id.'" type="checkbox" id="' . $row1->id.'">
                        <label class="custom-control-label" for="' . $row1->id.'"></label>
                        </div>';

                return $btn1;
                })
                ->addColumn('action', function($row){
                    $btn = '<div class="col-md-8 row">
                    <a target="_blank" data-toggle="tooltip" href="'.route('cms.preview',$row->slug).'" class="btn btn-info btn-sm btn-preview"><i
                    class="icon-eye2"></i>Preview</a> <a data-toggle="tooltip" href="'.route('cms.edit',$row->id).'" class="btn btn-primary btn-sm btn-edit ml-1"><i
                    class="icon-pencil"></i>Edit</a> <a data-toggle="tooltip" href="'.route('cms.destroy',$row->id).'" class="btn btn-danger btn-sm btn-edit ml-1"><i
                    class="icon-trash2"></i>Delete</a>
                    </div>';
                    
                    return $btn;
                })
                ->rawColumns(['check','action'])
                ->make(true);
        }
        return view('cms.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['result'] = ['method' => 'add'];
        return view('cms.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCmsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
        ]);
        if ($validator->fails()) {

            return redirect()->route('cms.create')->withErrors($validator)->withInput();
            // return response()->json(['error' => $validator->errors()->all()]);
        } else {
            $slug = url_title($request->title, "dash", true);
            $cms = new Cms();
            $cms->title = $request->title;
            $cms->slug = $slug;
            $cms->content = $request->content;
            $cms->save();

            return redirect()->route('cms.index')->with('success', '<i class="icon-tick"></i><strong>Well done!</strong>, Success');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cms  $cms
     * @return \Illuminate\Http\Response
     */
    public function show(Cms $cms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cms  $cms
     * @return \Illuminate\Http\Response
     */
    public function edit(Cms $cms, $id)
    {
        $cms = Cms::find($id);
        $data['result'] = ['method' => 'edit'];
        return view('cms.form', $data, compact('cms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCmsRequest  $request
     * @param  \App\Models\Cms  $cms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            // $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('cms.create')->withErrors($validator)->withInput();
            // return response()->json(['error' => $validator->errors()->all()]);
        } else {
            $slug = url_title($request->title, "dash", true);
            $cms = Cms::where('id', $id)->first();
            $cms->title = $request->title;
            $cms->slug = $slug;
            $cms->content = $request->content;
            $cms->save();

            return redirect()->route('cms.index')->with('success', '<i class="icon-tick"></i><strong>Well done!</strong>, Success');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cms  $cms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cms $cms, $id)
    {
        $card = Cms::where('id', $id)->delete();
        return redirect()->route('cms.index')->with('success', '<i class="icon-tick"></i><strong>Well done!</strong>, Success');
    }

    public function preview($slug)
    {
        $cms = Cms::where('slug', $slug)->first();
        return view('cms.preview', compact('cms'));
        // if ($cms->count() > 0) {
        //     $record = $cms->first();
        //     $response = ['status' => true, 'message' => 'Success', 'record' => $record];
        // } else {
        //     $response = ['status' => false, 'message' => 'Please enter valid email and password'];
        // }
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $cms = Cms::whereIn('id', $ids)->delete();
        if ($cms) {
            $arr = ["success" => true, "message" => 'Selected CMS Delete successfully.'];
            return $arr;
        }
    }
}
