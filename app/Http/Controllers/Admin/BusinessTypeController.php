<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\MasterBusinessType;
use Illuminate\Support\Facades\Blade;
use App\View\Components\Listicons;
use DataTables;
use Response;

class BusinessTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = array();
        if ($request->ajax()) {
            $data = MasterBusinessType::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = Blade::renderComponent(new Listicons(['iconType' => 'both', 'delurl' => 'javascript:void(0)', 'delcustomclass' => '', 'editurl' =>'javascript:void(0)', 'editcustomclass' => '', 'id' => $row->id]));
                    return $btn;
                })->rawColumns(['action'])->make(true);
        }

        $data['pageHeading'] = 'Bussiness Type List';
        $data['listColumnHeadings'] = ['Name','Action'];
        $data['routeName'] = 'bussinesstype';
        return view('admin.bussinesstype.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // To identify if a request is for store or update
        $id =empty($request->id) ? 'NULL':$request->id;        
        $validatedData =$request->validate([
            'name' => 'required|unique:master_business_types,business_type,'.$id,
        ]);
        $message =empty($request->id)?"Bussiness Type saved successfully.":"Bussiness Type updated successfully.";
        if($validatedData->fails()){
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
        
            ), 400); // 400 being the HTTP code for an invalid request.
        }

        $ins_arr = ['business_type' => string_ucwords($request->name),
        'updated_by' => auth()->id()];

        if(!$request->id){
            $ins_arr['created_by'] = auth()->id();
        }
        $qry = MasterBusinessType::updateOrCreate(
            ['id' => $request->id],
            $ins_arr
        );
        if($qry) {
            return response()->json(['success' =>  $message]);
        }
        return response()->json(['error' => 'Unable to save Bussiness Type.']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)  
    {
        $bussiness_type = MasterBusinessType::find($id,['id','business_type']);
        return response()->json(['status'=>200,'data'=>$bussiness_type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bussiness_type = MasterBusinessType::find($id)->delete();
        if($bussiness_type){
            return response()->json(['status'=>200,'success' => 'Bussiness Type deleted successfully.']);
        }else{
            return response()->json(['status'=>500,]);
        }
    }

    /**
     * check duplicate value using jquery validator calling
     */
    function checkDuplicateBussinesstype(Request $request){
        if($request->ajax()){
            $business_type = $request->name;
            $business_typeCount = MasterBusinessType::where('business_type', $business_type)->count();
            if($business_typeCount >0){
                echo "false";
            } else {
                echo "true";
            }
        }
    }



}
