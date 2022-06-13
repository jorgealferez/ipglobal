@foreach (config('layout.scripts') as $script)
    <script src="{{$script}}"></script>
@endforeach
