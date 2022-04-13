<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SuperCategory;
use App\View\Components\Listicons;
use App\Helpers\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Storage;
use DataTables;

class SuperCategoryController extends Controller
{
    use File;

    private $imagepath =  'admin/supercategory/';
    private $thumb_arr = [
        ['w' => 50, 'h' => 50],
        ['w' => 300, 'h' => 300],
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = array();
        if ($request->ajax()) {
           
            $data = SuperCategory::select(DB::raw("CONCAT('".asset('storage')."/',REPLACE(image, '.', '_thumb50.')) AS image"),'id','name');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = Blade::renderComponent(new Listicons(['iconType' => 'both', 'delurl' => 'javascript:void(0)', 'delcustomclass' => 'deletecategory', 'editurl' => 'javascript:void(0)', 'editcustomclass' => 'editcategory', 'id' => $row->id]));
                    return $btn;
                })->rawColumns(['action'])->make(true);
        }
        return view('admin.supercategory.index', $data);
        //
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
        $item = new SuperCategory;
        $table = $item->getTable();
        if ($request->id > 0) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:'.$table.',name,' . $request->id,
                'oldimgpath' => 'required'
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:'.$table,
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        }
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }   
        
        if($request->hasFile('image')){     
            $file = $request->file('image');
            $originalImagePath = $this->file($file,$this->imagepath,$this->thumb_arr);
            if(!empty($request->oldimgpath)){
                $this->deleteFile($request->oldimgpath,$this->thumb_arr);
            }                
        } else {
            $originalImagePath = $request->oldimgpath;
        }

        $ins_arr = ['name' => ucfirst($request->name),
        'image' => $originalImagePath,
        'modify_by' => auth()->id()];

        if(!$request->id){
            $ins_arr['created_by'] = auth()->id();
        }
       
        //auth()->id()
        SuperCategory::updateOrCreate(
            ['id' => $request->id],
            $ins_arr
        );
        return response()->json(['success' => 'Super Category saved successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\SuperCategory  $superCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SuperCategory $superCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\SuperCategory  $superCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = SuperCategory::find($id,[DB::raw("CONCAT('".asset('storage')."/',REPLACE(image, '.', '_thumb300.')) AS imagepath"),'id','name','image']);
        //print_r($category); exit;
        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\SuperCategory  $superCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = SuperCategory::find($id);
        $this->deleteFile($cat->image,$this->thumb_arr);
        $cat->is_delete = 1;
        $cat->save();

        $cat->delete();
        return response()->json(['success' => 'Super Category deleted successfully.']);
    }
}
