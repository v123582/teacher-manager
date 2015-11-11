@extends("../layouts/_default")

@section('navbar')
  @include('../partials/_navbar')
@stop

@section('content')

<p><button><a href='file/create'>create</a></button></p>

@foreach ($files as $file)
  <p>此檔案為 <a href='file/show/{{ $file->id }}'>{{ $file-> name }}</a></p>
@endforeach


@stop

@section("footer")
  @include('../partials/_footer')
@stop
