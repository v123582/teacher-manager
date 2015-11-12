@extends("../layouts/_default")

@section('navbar')
  @include('../partials/_navbar')
@stop

@section('content')

<h1>修改檔案</h1>
{!! Form::open(array('url' => '/file/update')) !!}
  <div class="form-group">
      {!! Form::label('user', '使用者名稱') !!}
      {!! Form::text('user', Input::old('user'), array('class' => 'form-control')) !!}
  </div>
  <div class="form-group">
      {!! Form::label('name', '檔案名稱') !!}
      {!! Form::text('name', Input::old('name'), array('class' => 'form-control')) !!}
  </div>
  <div class="form-group">
      {!! Form::label('subject', '科目') !!}
      {!! Form::text('subject', Input::old('subject'), array('class' => 'form-control')) !!}
  </div>
  <div class="form-group">
      {!! Form::label('chapter', '章節') !!}
      {!! Form::text('chapter', Input::old('chapter'), array('class' => 'form-control')) !!}
  </div>
  <div class="form-group">
      {!! Form::label('grade', '年級') !!}
      {!! Form::text('grade', Input::old('grade'), array('class' => 'form-control')) !!}
  </div>
  <div class="form-group">
      {!! Form::label('topic', '主題') !!}
      {!! Form::text('topic', Input::old('topic'), array('class' => 'form-control')) !!}
  </div>
  <div class="form-group">
      {!! Form::label('link', '網址') !!}
      {!! Form::text('link', Input::old('link'), array('class' => 'form-control')) !!}
  </div>
  <div class="form-group">
      {!! Form::label('description', '敘述') !!}
      {!! Form::text('description', Input::old('description'), array('class' => 'form-control')) !!}
  </div>
  {!! Form::submit('Create the file!', array('class' => 'btn btn-primary')) !!}



{!! Form::close() !!}
@stop

@section("footer")
  @include('../partials/_footer')
@stop