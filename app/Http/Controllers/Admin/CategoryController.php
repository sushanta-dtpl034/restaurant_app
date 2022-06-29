<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\SuperCategory;
use App\View\Components\Listicons;
use App\Helpers\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use DataTables;

class CategoryController extends Controller
{
    use File;

    private $imagepath =  'admin/category/';
    private $thumb_arr = [
        ['w' => 50],
        ['w' => 300],
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

            $data = Category::with('parent')->with('supercategory');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('thumb', function ($row) {
                    return asset('storage') . str_replace('.', '_thumb50.', $row->image);
                })
                ->addColumn('parent', function ($row) {
                    return (isset($row->parent) && isset($row->parent->name)) ? $row->parent->name : '-';
                })
                ->addColumn('supercategory', function ($row) {
                    return (isset($row->supercategory) && isset($row->supercategory->name)) ? $row->supercategory->name : '-';
                })
                ->addColumn('action', function ($row) {
                    $btn = Blade::renderComponent(new Listicons(['iconType' => 'both', 'delurl' => 'javascript:void(0)', 'delcustomclass' => 'deletecategory', 'editurl' => route('category.edit', $row->id), 'editcustomclass' => '', 'id' => $row->id]));
                    return $btn;
                })->rawColumns(['thumb', 'parent','supercategory', 'action'])->make(true);
        }
        return view('admin.category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->where('parent_id', '0');
        $superCategories = SuperCategory::all();
        $category = []; 
        $image_thumb = '';
        $parentValue = [];
        return view('admin.category.create')->with(compact(['category','categories','image_thumb','parentValue','superCategories']));
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
            'category_type' => 'required',
            //'super_category_id' => 'required',
            'parent_id' => 'required_if:category_type,=,"sub_category"',
            'name' => 'required|unique:msts_category,name',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|required_without:oldimgpath'
        ],
        [ 
            'parent_id.required_if' => 'Parent category field is required.',
            //'super_category_id' => 'Cuisines field is required.',
            'image.required_without' => 'Image field is required.',
            'image.image' => 'The image must be a file of type: jpeg, png, gif, svg.'
        ]);

        $category = new Category;
        $category->name = ucfirst($request->name);
        $category->parent_id = $request->category_type == 'sub_category' ? $request->parent_id : 0;
        $category->super_category_id = $request->super_category_id;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $originalImagePath = $this->file($file, $this->imagepath, $this->thumb_arr);
            if (!empty($request->oldimgpath)) {
                $this->deleteFile($request->oldimgpath, $this->thumb_arr);
            }
        } else {
            $originalImagePath = $request->oldimgpath;
        }

        $category->image = $originalImagePath;
        $category->created_by = $category->modify_by = auth()->id();

        if ($category->save()) {
            return redirect()->route('category.index')->with(['success' => 'Category added successfully.']);
        }

        return redirect()->back()->with(['fail' => 'Unable to add category.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $image_thumb = asset('storage') . str_replace('.', '_thumb50.', $category->image);
        $categories = Category::all()->where('parent_id', '0');
        $selectParent = isset($category->parent) ? [['id' => $category->parent->id, 'name' => $category->parent->name]] : [];
        $parentValue = $selectParent;
        $superCategories = SuperCategory::all();
        $superCategoryName = '';
        if(isset($category->super_category_id) > 0){
            $superCategoryName = SuperCategory::where('id', $category->super_category_id)->pluck('name')->first();
        }
        $categories = Category::all()->where('parent_id', '0');
        return view('admin.category.create')->with(compact(['category', 'categories','image_thumb','parentValue','superCategories','superCategoryName']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //pr($request->all(),1);
        $id = $category->id;
        $request->validate([
            'name' => 'required|unique:msts_category,name,'.$id,
            //'super_category_id' => 'required',
            'parent_id' => 'required_if:category_type,=,"sub_category"',//|not_in:0
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|required_without:oldimgpath'
        ],
        [
            //'super_category_id' => 'Cuisines field is required.',
            'parent_id.required_if' => 'Parent category field is required.',
            'parent_id.not_in' => 'Parent category field is required.',
            'image.required_without' => 'Image field is required.',
            'image.image' => 'Invalid file type. Please select image'
        ]);
        
        $category->name = ucfirst($request->name);
        $category->parent_id = $request->category_type == 'sub_category' ? $request->parent_id : 0;
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $originalImagePath = $this->file($file, $this->imagepath, $this->thumb_arr);
            if (!empty($request->oldimgpath)) {
                $this->deleteFile($request->oldimgpath, $this->thumb_arr);
            }
        } else {
            $originalImagePath = $request->oldimgpath;
        }

        $category->image = $originalImagePath;
        $category->modify_by = auth()->id();

        if($request->category_type == 'sub_category'){
            $category->super_category_id = Category::where('id', $category->parent_id)->pluck('super_category_id')->first();
        } else {
            $category->super_category_id = $request->super_category_id;
        }

        if ($category->save()) {
            return redirect()->route('category.index')->with(['success' => 'Category successfully updated.']);
        }

        return redirect()->back()->with(['fail' => 'Unable to update category.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::find($id);
        $this->deleteFile($cat->image, $this->thumb_arr);
        $cat->is_delete = 1;
        $cat->save();
        $cat->delete();
        return response()->json(['success' => 'Super Category deleted successfully.']);
    }

    /**
     * Function to return Autosuggest Parent records
     */
    function getParentAutosuggest(Request $request) {
        $input = $request->all();
        $searchTerm = $input['query'];
        $categories = Category::query()->where('parent_id', '0')->where('name', 'LIKE', "%{$searchTerm}%")->get()->toArray();
        return response()->json($categories);
    }
}
