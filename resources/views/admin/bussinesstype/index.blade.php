<x-app-layout>
    @include('admin.common.list')
    @include('admin.bussinesstype.create')
    {{-- {{ $bussiness_type->business_type}}  --}}
        <x-slot name="datatablescript">
            <script>
                let routesindex = "{{ route('bussinesstype.index') }}";
                let columnArr = [{
                        data: 'business_type',
                        name: 'name'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ];            
                //Add in popup
                let actionsSettings = {add:"popup",popupMid:'record_form',import:1,export:1,hideFromExport:[1]};
                let hideFromExport = [1];//give column index to hide from export        
                var routesstore = "{{ route('bussinesstype.store') }}";
            </script>
            
            <script type="module" src="{{asset('js/libraries/jquery-validate1.19.3/jquery.validate.min.js')}}"></script>
            <script type="module" src="{{asset('js/libraries/jquery-validate1.19.3/additional-methods.min.js')}}"></script>
            <script type="module" src="{{ URL::asset('js/admin/bussinesstype/index.js') }}"></script>
    
        </x-slot>
      
    </x-app-layout>
