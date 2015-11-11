@extends("../layouts/_default")

@section('navbar')
  @include('../partials/_navbar')
@stop

@section('content')


<p>此檔案為 {{ $file-> name }} </a></p>

<p><button><a href='/file/update/{{ $file-> id }}'>修改</a></button></p>
<p><button><a href='/file/update/{{ $file-> id }}'>刪除</a></button></p>

@stop

@section("footer")
  @include('../partials/_footer')
@stop
