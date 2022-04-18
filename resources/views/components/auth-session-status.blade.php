@props(['status'])

@if ($status)
<div class="alert alert-left alert-success alert-dismissible fade show mb-3" role="alert">
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600']) }}>
        {{ $status }}
    </div>
    </div>
@endif
