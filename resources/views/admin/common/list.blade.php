<div class="row">
    <div class="col-sm-12">               
        @if(session('success') || session('fail'))
        <div id="showsuccess">
            <x-alert :type="session('fail')? 'danger' : 'success'" :message="session('fail')? session('fail') : session('success')" class="mb-4" />
        </div>
        @endif
       
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">{{$pageHeading}}</h4>
                </div>
            </div>
            <div class="card-body px-4">
                <div class="table-responsive">
                @if(isset($listColumnHeadings) && is_array($listColumnHeadings) && count($listColumnHeadings) > 0)
                    <table id="datatable" class="table table-striped" role="grid">
                        <thead>
                            <tr class="ligth">
                            @foreach ($listColumnHeadings as $columnHeading)
                                <th>{{$columnHeading}}</th>
                            @endforeach
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
        
    </div>
</div>
<x-slot name="include_admin_script">
    <script type="module" src="{{ URL::asset('js/common/datatable.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</x-slot>