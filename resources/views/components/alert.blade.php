@props(['type' => 'info', 'message'])

<div class="alert alert-left alert-{{ $type }} alert-dismissible fade show mb-3" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24">
        @if($type == 'success')
        <use xlink:href="#check-circle-fill3"></use>
        @elseif($type == 'warning')
        <use xlink:href="#exclamation-triangle-fill01"></use>
        @elseif($type == 'danger')
        <use xlink:href="#exclamation-triangle-fill01"></use>
        @else
        <use xlink:href="#info-fill"></use>
        @endif
    </svg>
    <span id="{{ $type }}_alert_message"> {{ $message }}</span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>