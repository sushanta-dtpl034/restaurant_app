<div class="modal" id="{{ $modelId?? '' }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="modelHeading">{{ $title }}</h4>
            <a href="javascript:void(0)" class="close fs-15" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
        <div class="modal-body">
            {{ $slot }}
        </div>
        </div>
    </div>
</div>