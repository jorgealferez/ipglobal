@foreach (config('layout.styles') as $style)
    <link rel="stylesheet" href="{{$style}}">
@endforeach
