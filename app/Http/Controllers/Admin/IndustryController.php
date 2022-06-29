<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Industry;
use App\View\Components\Listicons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use DataTables;

class IndustryController extends Controller
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
           
            $data = Industry::select('id','name');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = Blade::renderComponent(new Listicons(['iconType' => 'both', 'delurl' => 'javascript:void(0)', 'delcustomclass' => 'deleteindustry', 'editurl' => 'javascript:void(0)', 'editcustomclass' => 'editindustry', 'id' => $row->id]));
                    return $btn;
                })->rawColumns(['action'])->make(true);
        }
        return view('admin.industry.index', $data);
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:msts_industries,name',
        ]);

        $ins_arr = ['name' => ucfirst($request->name),
        'modify_by' => auth()->id()];

        if(!$request->id){
            $ins_arr['created_by'] = auth()->id();
        }

        $qry = Industry::updateOrCreate(
            ['id' => $request->id],
            $ins_arr
        );

        if ($qry) {
            return response()->json(['success' => 'Industry saved successfully.']);
        }
        return response()->json(['error' => 'Unable to save industry.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function show(Industry $industry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Industry::find($id,['id','name']);
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Industry $industry)
    {
        $id = $industry->id;
        $request->validate([
            'name' => 'required|unique:msts_industries,name,'.$id,
        ]);        
        $industry->name = ucfirst($request->name);
        $industry->modify_by = auth()->id();

        if ($industry->save()) {
            return redirect()->route('category.index')->with(['success' => 'Industry successfully updated.']);
        }
        return redirect()->back()->with(['fail' => 'Unable to update industry.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $industry = Industry::find($id);
        $industry->is_delete = 1;
        $industry->save();
        $industry->delete();
        return response()->json(['success' => 'Industry deleted successfully.']);
    }
}
