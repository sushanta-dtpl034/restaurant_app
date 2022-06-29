<x-app-layout>
    <div>
        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <div class="card p-0">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{isset($category->id) ? 'Edit' : 'Add'}} Category</h4>
                        </div>
                    </div>
                    @if($errors->any())
                    {{ implode(' ', $errors->all()) }}@endif
                    <div class="card-body">
                        <div class="new-user-info">
                            <form action="{{ isset($category->id) ? route('category.update', ['category'=>$category->id] ) : route('category.store') }}" method="post" id="categoryForm" name="categoryForm" class="form-horizontal @if($errors->any()) needs-validation was-validated @endif" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @if(isset($category->id))
                                @method('PATCH')
                                @endif
                                <div class="row">

                                    <div class="form-group col-sm-12">
                                        <label for="parent_category_type" class="form-label">Select Option</label>
                                        <div class="checkbox">
                                            <label class="form-label" for="parent_category_type">
                                                <input name="category_type" class="form-check-input me-2" type="radio" value="parent_category" id="parent_category_type" required {{ (empty(old('category_type')) || old('category_type')) == 'parent_category' || (isset($category->parent_id) && $category->parent_id == 0 ) ? 'checked' : '' }}>Parent category</label>
                                            <label class="form-label" for="sub_category_type">
                                                <input name="category_type" class="form-check-input me-2" type="radio" value="sub_category" id="sub_category_type" {{ old('category_type') == 'sub_category'  || (isset($category->parent_id) && $category->parent_id > 0 ) ? 'checked' : '' }}>Sub category</label>
                                            <br>
                                            <span class="text-danger @if($errors->has('category_type')) invalid-feedback @endif">
                                                @error('category_type'){{ $message }} @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div id="cuisines_blk" class="form-group col-sm-12">
                                        @if(isset($category->super_category_id) && $category->super_category_id > 0)
                                        <label for="super_category_id" class="form-label">Cuisines: </label>  
                                        <span>{{$category->supercategory->name}}</span>
                                        <input type="hidden" id="super_category_id" name="super_category_id" value="{{!empty(old('super_category_id')) ? old('super_category_id') : (isset($category->super_category_id) ? $category->super_category_id : '')}}" />
                                        @else                                    
                                        <label for="super_category_id" class="form-label">Select Cuisines</label>
                                        <select class="selectpicker form-control" id="super_category_id" name="super_category_id" data-style="py-0">
                                            <option value="">Select Cuisines</option>
                                            @foreach ($superCategories as $sc)
                                            <option value="{{$sc->id}}" {{ $sc->id == (!empty(old('super_category_id')) ? old('super_category_id') : (isset($category->super_category_id) ? $category->super_category_id : '')) ? 'selected' : '' }}>{{$sc->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger @if($errors->has('super_category_id')) invalid-feedback-zz @endif">@error('super_category_id'){{ $message }} @enderror</span>
                                        @endif
                                    </div>

                                    <div id="parent_blk" class="form-group col-sm-12">
                                        <label for="parent_id" class="form-label">Select Parent Category</label>
                                        <input type="text" id="parent_id_m" name="parent_id_m" class="form-control" placeholder="Category Name" autocomplete="off" /> <br>
                                        <span class="text-danger @if($errors->has('parent_id')) invalid-feedback @endif">
                                            @error('parent_id'){{ $message }} @enderror
                                        </span>
                                        <input type="hidden" name="parent_id" id="parent_id" value="{{ !empty(old('parent_id')) ? old('parent_id') : (isset($category->parent_id) ? $category->parent_id : '') }}" />

                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="cname">Name: {{old('name')}}</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Category Name" autocomplete="off" required value="{{ !empty(old('name')) ? old('name') : (isset($category->name) ? $category->name : '') }}">

                                        <span class="text-danger @if($errors->has('name')) invalid-feedback @endif">
                                            @error('name'){{ $message }} @enderror
                                        </span>
                                    </div>

                                    <div class="form-group">
                                        <label for="image" class="col-sm-2 control-label">Image</label>
                                        <div class="col-sm-12">
                                            {{old('image')}}
                                            <input type="file" id="catImg" name="image" @if(!isset($category->id)) required @endif id="image" class="form-control">
                                            <div id='previewx' class="mt-3">                                                
                                                <img id="catImgPreview" src="@if(!empty($image_thumb)){{ $image_thumb }}@endif" width="100">                                                
                                            </div>
                                            <input type="hidden" name="oldimgpath" id="oldimgpath" value="{{ isset($category->image) ? $category->image : '' }}" />
                                            <span class="text-danger @if($errors->has('image')) invalid-feedback @endif">
                                                @error('image'){{ $message }} @enderror
                                            </span>
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="include_admin_script">
        <link rel="stylesheet" href="{{asset('plugins/magicsuggest/magicsuggest.css')}}" />
        <script type="text/javascript" src="{{asset('plugins/magicsuggest/magicsuggest.js')}}"></script>
        <script>
            let autourl = "{{route('autosuggestcategory')}}";
            let parentValue = {{Js::from($parentValue)}};
        </script>
        <script type="text/javascript" src="{{asset('js/admin/category/create.js')}}"></script>
    </x-slot>
</x-app-layout>