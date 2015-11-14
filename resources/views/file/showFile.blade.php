@extends("../layouts/_default")

@section('navbar')
  @include('../partials/_navbar')
@stop

@section('content')

<h1>檢視檔案</h1>



<p><button><a href='/file/update/{{ $file-> id }}'>修改</a></button></p>
<!-- <p><button><a href='/file/delete/{{ $file-> id }}'>刪除</a></button></p> -->
{!! Form::open([
           'method' => 'DELETE',
          'url' => ['/file/delete', $file->id]
       ]) !!}

           {!! Form::submit('刪除') !!}
{!! Form::close() !!}
<p>此檔案為 {{ $file-> name }} </a></p>


@stop

@section("footer")
  @include('../partials/_footer')
@stop
