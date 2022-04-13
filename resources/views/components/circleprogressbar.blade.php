@props(['id','color','image'.'value','imgClass','progressPercent','progressTitle'])
<div>
    <div class="card-profile-progress mb-3">
        <div id="circle-progress-{{$id}}" class="circle-progress  circle-progress-basic circle-progress-{{$color}}" data-min-value="0" data-max-value="100" data-value="{{$value ?? ''}}" data-type="percent"></div>
     <img src="{{asset('images/layouts/')}}/{{ $image ?? '' }}" class="img-fluid  rounded-circle card-img {{$imgClass ?? '' }} rotete-infinite" alt="image" >    
</div>
<div class="text-center">
    <p class="mb-2">{{$progressPercent ?? ''}}</p>
    <h6 class="heading-title fw-bolder">{{$progressTitle ?? ''}}</h6>
</div>
</div>



<!--<div>
<div class="card-profile-progress mb-3">
    <div id="circle-progress-{{$id}}" class="circle-progress  circle-progress-basic circle-progress-{{$color}}" data-min-value="0" data-max-value="100" data-value="{{$value ?? ''}}" data-type="percent"></div>
    <img src="{{asset('images/layouts/')}}/{{ $image ?? '' }}" class="img-fluid  rounded-circle card-img {{$imgClass ?? '' }} rotete-infinite" alt="image" >    
</div>
<div class="text-center">
    <p class="mb-2">{{$progressPercent ?? ''}}</p>
    <h6 class="heading-title fw-bolder">{{$progressTitle ?? ''}}</h6>
</div>
</div> -->