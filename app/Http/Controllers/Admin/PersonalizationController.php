<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Personalization;
use App\View\Components\Listicons;
use App\Http\Requests\Admin\PersonalizationRequest;
use App\Helpers\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use DataTables;

class PersonalizationController extends Controller
{
    use File;

    private $imagepath =  'admin/personalization/';
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

            $data = Personalization::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('thumb', function ($row) {
                    return asset('storage') . str_replace('.', '_thumb50.', $row->image);
                })
                ->addColumn('action', function ($row) {
                    $btn = Blade::renderComponent(new Listicons(['iconType' => 'both', 'delurl' => 'javascript:void(0)', 'delcustomclass' => 'deletePersonalization', 'editurl' => route('personalization.edit', $row->id), 'editcustomclass' => '', 'id' => $row->id]));
                    return $btn;
                })->rawColumns(['thumb','action'])->make(true);
        }
        return view('admin.personalization.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $image_thumb = '';
        return view('admin.personalization.create')->with(compact(['image_thumb']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonalizationRequest $request)
    {
        $personalization = new Personalization;
        $personalization->name = ucfirst($request->name);
        $personalization->type = $request->type;
        $personalization->options = isset($request->options) && !empty($request->options) ? $request->options : '';
        $personalization->help_text = $request->help_text;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $originalImagePath = $this->file($file, $this->imagepath, $this->thumb_arr);
            if (!empty($request->oldimgpath)) {
                $this->deleteFile($request->oldimgpath, $this->thumb_arr);
            }
        } else {
            $originalImagePath = $request->oldimgpath;
        }

        $personalization->image = $originalImagePath;
        $personalization->created_by = $personalization->modify_by = auth()->id();

        if ($personalization->save()) {
            return redirect()->route('personalization.index')->with(['success' => 'Personalization added successfully.']);
        }
        return redirect()->back()->with(['fail' => 'Unable to add personalization.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\Personalization  $personalization
     * @return \Illuminate\Http\Response
     */
    public function show(Personalization $personalization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\Personalization  $personalization
     * @return \Illuminate\Http\Response
     */
    public function edit(Personalization $personalization)
    {
        $image_thumb = asset('storage') . str_replace('.', '_thumb50.', $personalization->image);   
        return view('admin.personalization.create')->with(compact(['personalization', 'image_thumb']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\Personalization  $personalization
     * @return \Illuminate\Http\Response
     */
    public function update(PersonalizationRequest $request, Personalization $personalization)
    {
        $personalization->name = ucfirst($request->name);
        $personalization->type = $request->type;
        $personalization->options = isset($request->options) && !empty($request->options) ? $request->options : '';        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $originalImagePath = $this->file($file, $this->imagepath, $this->thumb_arr);
            if (!empty($request->oldimgpath)) {
                $this->deleteFile($request->oldimgpath, $this->thumb_arr);
            }
        } else {
            $originalImagePath = $request->oldimgpath;
        }
        $personalization->help_text = $request->help_text;
        $personalization->image = $originalImagePath;
        $personalization->modify_by = auth()->id();

        if ($personalization->save()) {
            return redirect()->route('personalization.index')->with(['success' => 'Personalization updated successfully.']);
        }

        return redirect()->back()->with(['fail' => 'Unable to update personalization.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\Personalization  $personalization
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $per = Personalization::find($id);
        $this->deleteFile($per->image, $this->thumb_arr);
        $per->is_delete = 1;
        $per->save();
        $per->delete();
        return response()->json(['success' => 'Personalization deleted successfully.']);
    }
}
