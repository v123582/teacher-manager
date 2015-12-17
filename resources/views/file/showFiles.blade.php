@extends("../layouts/_default")

@section('navbar')
  @include('../partials/_navbar')
@stop

@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">All Files
            <small>所有檔案</small>
        </h1>
    </div>
</div>
<?php $count = 1 ?>
@foreach ($files as $file)
  @if ($count %4 === 1)
    <div class="row">
  @endif

  <div class="col-md-3 portfolio-item" style='margin-bottom:20px;'>
      <a href="file/show/{{ $file->id }}">
              <center>{{ $file-> name }}
              <center>{!! Html::image( $file-> link ,  'no picture !' ,array( 'width' => 70, 'height' => 70 )) !!}
      </a>
  </div>

  @if ($count %4 === 0)
    </div>
  @endif
<?php $count += 1 ?>
@endforeach
</div>

<button class="btn btn-default" style="margin-left:48%;margin-top:10px;"><a href='file/create'>新增</a></button>
@stop

@section("footer")
  @include('../partials/_footer')
@stop
