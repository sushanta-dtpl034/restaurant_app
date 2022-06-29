<x-app-layout>
    <div>
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
                            <h4 class="card-title">Personalization List</h4>
                        </div>
                        <a class="btn btn-success" href="{{ route('personalization.create') }}" id="createNewPersonalization">Add New Personalization</a>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">

                            <table id="datatable" class="table table-striped" role="grid">
                                <thead>
                                    <tr class="ligth">
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th style="min-width: 100px">Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="datatablescript">
        <script>
            var routesindex = "{{ route('personalization.index') }}";
        </script>
        <script type="module" src="{{ URL::asset('js/admin/personalization/list.js') }}"></script>
    </x-slot>
</x-app-layout>