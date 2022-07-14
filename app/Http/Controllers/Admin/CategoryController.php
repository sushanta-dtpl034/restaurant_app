<?php

namespace App\Http\Controllers\Admin;
//Default
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Others
use Illuminate\Support\Facades\Blade;
use App\Models\admin\MasterCategory;
use App\View\Components\Listicons;
use DataTables;

class CategoryController extends Controller
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

            $data = MasterCategory::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = Blade::renderComponent(new Listicons(['iconType' => 'both', 'delurl' => 'javascript:void(0)', 'delcustomclass' => 'delrec', 'editurl' => route('category.edit', $row->id), 'editcustomclass' => '', 'id' => $row->id]));
                    return $btn;
                })->rawColumns(['thumb','action'])->make(true);
        }

        $data['pageHeading'] = 'Category List';
        $data['listColumnHeadings'] = ['Name','Action'];
        $data['routeName'] = 'category';
        return view('admin.category.index', $data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        //
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
        $per = MasterCategory::find($id);        
        $per->delete();
        return response()->json(['success' => 'Category deleted successfully.']);
    }
}
