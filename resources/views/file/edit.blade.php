@extends("../layouts/_default")

@section('navbar')
  @include('../partials/_navbar')
@stop

@section('content')

<h1>修改檔案</h1>

{{ $file }}

@stop

@section("footer")
  @include('../partials/_footer')
@stop
