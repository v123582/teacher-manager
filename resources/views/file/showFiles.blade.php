@extends("../layouts/_default")

@section('navbar')
  @include('../partials/_navbar')
@stop

@section('content')

<h1>所有檔案</h1>

<p><button><a href='file/create'>新增</a></button></p>

@foreach ($files as $file)
  <p>此檔案為 <a href='file/show/{{ $file->id }}'>{{ $file-> name }}</a></p>
@endforeach


@stop

@section("footer")
  @include('../partials/_footer')
@stop
