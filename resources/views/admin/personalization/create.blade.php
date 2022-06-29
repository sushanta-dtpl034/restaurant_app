<x-app-layout>
    <div>
        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <div class="card p-0">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{isset($personalization->id) ? 'Edit' : 'Add'}} Personalization</h4>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="new-user-info">
                            <form action="{{ isset($personalization->id) ? route('personalization.update', ['personalization'=>$personalization->id] ) : route('personalization.store') }}" method="post" id="personalizationForm" name="personalizationForm" class="form-horizontal @if($errors->any()) needs-validation was-validated @endif" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @if(isset($personalization->id))
                                @method('PATCH')
                                @endif
                                <div class="row">                                   

                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="cname">Field Name: {{old('name')}}</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter field name" autocomplete="off" value="{{ !empty(old('name')) ? old('name') : (isset($personalization->name) ? $personalization->name : '') }}">
                                        <span class="text-danger @if($errors->has('name')) invalid-feedbackzz @endif">
                                            @error('name'){{ $message }} @enderror
                                        </span>
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <label for="type" class="form-label">Field Type</label>
                                        <select class="selectpicker form-control" id="type" name="type" data-style="py-0">
                                            @foreach (personalizationFieldType() as $val)
                                            <option value="{{$val}}" {{ $val == (!empty(old('type')) ? old('type') : (isset($personalization->type) ? $personalization->type : '')) ? 'selected' : '' }} >{{$val}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger @if($errors->has('type')) invalid-feedback-zz @endif">@error('type'){{ $message }} @enderror</span>
                                    </div>

                                    <div id="opt_blk" class="form-group col-sm-12 multi-token">
                                        <label for="options" class="form-label">Field Options</label>
                                        <input type="text" id="options" name="options" class="form-control" placeholder="Enter field options" autocomplete="off" value="" /> <br>
                                        <span class="text-danger @if($errors->has('options')) invalid-feedbackzz @endif">
                                            @error('options'){{ $message }} @enderror
                                        </span>
                                    </div>

                                    <div class="form-group">
                                        <label for="image" class="col-sm-2 control-label">Image</label>
                                        <div class="col-sm-12">
                                            {{old('image')}}
                                            <input type="file" id="inputImg" name="image" id="image" class="form-control">
                                            <div id='previewx' class="mt-3">                                                
                                                <img id="imgPreview" src="@if(!empty($image_thumb)){{ $image_thumb }}@endif" width="100">                                                
                                            </div>
                                            <input type="hidden" name="oldimgpath" id="oldimgpath" value="{{ isset($personalization->image) ? $personalization->image : '' }}" />
                                            <span class="text-danger @if($errors->has('image')) invalid-feedbackzz @endif">
                                                @error('image'){{ $message }} @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <label for="type" class="form-label">Help text </label>
                                        <textarea id="help_text" name="help_text" class="form-control" placeholder="Enter help text" >{{ !empty(old('help_text')) ? old('help_text') : (isset($personalization->help_text) ? $personalization->help_text : '') }}</textarea>                                
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{route('personalization.index')}}" class="btn btn-primary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php  
    $options = !empty(old('options')) ? old('options') : (isset($personalization->options) ? $personalization->options : '');
    $optArr = !empty($options) ? explode('##',$options) : [];
    $optionsValue = [];
    foreach($optArr as $val){
        $optionsValue[] = ['id' => $val, 'value' => $val];
    }  
    ?>
    <x-slot name="include_admin_script">
        <link rel="stylesheet" href="{{asset('plugins/tokeninput/token-input.css')}}" />
        <script type="text/javascript" src="{{asset('plugins/tokeninput/jquery.tokeninput.js')}}"></script>
        <script>
            let freeTokenUrl = "{{route('gettoken')}}";
            let freeTokenValue = {{Js::from($optionsValue)}};
        </script>
        <script type="module" src="{{asset('js/common/util.js')}}"></script>
        <script type="module" src="{{asset('js/admin/personalization/create.js')}}"></script>        
    </x-slot>
</x-app-layout>