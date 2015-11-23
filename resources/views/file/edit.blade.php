@extends("../layouts/_default")

@section('navbar')
  @include('../partials/_navbar')
@stop

@section('content')

<h1>修改檔案</h1>
<!-- {!! Form::open(array('url' => '/file/update', $file->id)) !!} -->
{!! Form::model($file,array('url' => '/file/update', $file->id, 'method' => 'post'))!!}
{!! Form::hidden('id', $file->id) !!}
{!! Form::hidden('user', $loginUser_id) !!}

  <div class="form-group">
      {!! Form::label('user', '使用者名稱: ') !!}
      {{$loginUser}}
  </div>
  <div class="form-group">
      {!! Form::label('name', '檔案名稱') !!}
      {!! Form::text('name',  $file -> name, array('class' => 'form-control')) !!}
  </div>
  <div class="form-group">
      {!! Form::label('subject', '科目') !!}
      {!! Form::text('subject',  $file -> subject, array('class' => 'form-control')) !!}
  </div>
  <div class="form-group">
      {!! Form::label('chapter', '章節') !!}
      {!! Form::text('chapter',  $file -> chapter,array('class' => 'form-control')) !!}
  </div>
  <div class="form-group">
      {!! Form::label('grade', '年級') !!}
      {!! Form::text('grade',  $file -> grade,array('class' => 'form-control')) !!}
  </div>
  <div class="form-group">
      {!! Form::label('topic', '主題') !!}
      {!! Form::text('topic',  $file -> topic, array('class' => 'form-control')) !!}
  </div>
  <div class="form-group">
      {!! Form::label('link', '網址') !!}
      {!! Form::text('link',  $file -> link,array('class' => 'form-control')) !!}
  </div>
  <div class="form-group">
      {!! Form::label('description', '敘述') !!}
      {!! Form::text('description', $file -> description,array('class' => 'form-control')) !!}
  </div>
  {!! Form::submit('update the file!', array('class' => 'btn btn-primary')) !!}
{!! Form::close() !!}
@stop

@section("footer")
  @include('../partials/_footer')
@stop
