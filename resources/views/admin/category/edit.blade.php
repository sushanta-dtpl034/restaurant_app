<x-app-layout>
    <div>
        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <div class="card p-0">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Edit Category</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="new-user-info">
                            <form action="{{ route('category.update', ['category'=>$category->id] ) }}" method="post" id="categoryFormx" name="categoryFormx" class="form-horizontal" enctype="multipart/form-data">
                                @method('PATCH')
                                {{ csrf_field() }}
                                <div class="row">

                                    @if($category->parent_id > 0)
                                    <div class="form-group col-sm-12">
                                        <label for="parent_id" class="form-label">Select Parent Category</label>
                                        <select name="parent_id" id="parent_id" class="selectpicker form-control" data-style="py-0" >
                                            <option value="">Select a category</option>
                                            @foreach($categories as $cat)
                                            <option {{ $cat->id == $category->parent_id ? 'selected' : '' }} value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('parent_id') }}</span>
                                    </div>
                                    @endif

                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="cname">Name</label>
                                        <input type="text" id="name" name="name" class="form-control" id="name" placeholder="Category Name" autocomplete="false" value="{{ $category->name }}">
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="image" class="col-sm-2 control-label">Image</label>
                                        <div class="col-sm-12">
                                            <input type="file" name="image" id="image" class="form-control">
                                            <div id='preview' class="mt-3"></div>
                                            <input type="hidden" name="oldimgpath" id="oldimgpath"  value="{{ $category->image }}" />
                                            <div id='preview' class="mt-3"><img src="{{ $image_thumb }}" width="100"> </div>
                                            <span class="text-danger">{{ $errors->first('image') }}</span>
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="include_admin_script">
        <script type="text/javascript" src="{{ URL::asset('js/admin/category/create.js') }}"></script>
    </x-slot>
</x-app-layout>