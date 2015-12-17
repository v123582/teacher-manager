
@extends("layouts/_default")

@section('navbar')
  @include('partials/_navbar')
@stop

@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">All Users
            <small>所有使用者</small>
        </h1>
    </div>
</div>
<?php $count = 1 ?>
@foreach ($users as $user)
  @if ($count %6 === 1)
    <div class="row">
  @endif

  <div class="col-md-2 portfolio-item" style='margin-bottom:20px;'>
      <a href="user/{{ $user->id }}">
            <center>{{ $user->name }}
      </a>
  </div>

  @if ($count %6 === 0)
    </div>
  @endif
<?php $count += 1 ?>
@endforeach
</div>
@stop

@section("footer")
  @include('partials/_footer')
@stop
