@extends("../layouts/_default")

@section('navbar')
  @include('../partials/_navbar')
@stop

@section('content')
<div class='container'>
<center>
<h1>檢視檔案</h1>


<p style="color:#FF6347;"> {{ $file-> name }} </a></p>
{!! Html::image( $file-> link ,  'no picture !' ,array( 'width' => 200, 'height' => 200 )) !!}
<p><button class="btn btn-default"><a href='/file/update/{{ $file-> id }}'>修改</a></button></p>
<!-- <p><button><a href='/file/delete/{{ $file-> id }}'>刪除</a></button></p> -->
{!! Form::open([
           'method' => 'DELETE',
           'url' => ['/file/delete', $file->id]
       ]) !!}

           {!! Form::submit('刪除',array('class' => 'btn btn-default')) !!}
{!! Form::close() !!}

</center>
</div>
@stop

@section("footer")
  @include('../partials/_footer')
@stop
