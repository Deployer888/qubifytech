@props(['image' => '', 'class' => ''])

@if ($image)
    <img src="{{$image}}" class="{{$class}}" style="height: 50px;" />
@else
    <img src="{{asset('images/QubifyMain.png')}}" class="{{$class}}" style="height: 50px; width:auto;" />
@endif