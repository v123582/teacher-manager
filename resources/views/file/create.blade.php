@extends("../layouts/_default")

@section('navbar')
  @include('../partials/_navbar')
@stop

@section('content')
<div class="container">
<h1>新增檔案</h1>


    {!! Form::open(array('url' => '/file/create')) !!}
        {!! Form::hidden('user', $loginUser_id) !!}
        <div class="form-group">
            {!! Form::label('user', '使用者名稱: ') !!}
            {{$loginUser}}
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
            <div id="file_create_div">
                <a href="#" id="a_file_create">上傳</a>
            </div>
            <div style="margin:10px;" id='show_upload'></div>
            {!! Form::hidden('link', Input::old('link'), array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description', '敘述') !!}
            {!! Form::text('description', Input::old('description'), array('class' => 'form-control')) !!}
        </div>
        {!! Form::submit('Create the file!', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}
</div>
@include("partials._file_create_modal")
@stop



@section("footer")
  @include('../partials/_footer')
@stop

@section("js_include")
  {{-- 檔案上傳js --}}
   <script src="/josh-ui/file_create.js"></script>
@stop
