@extends("layouts/_default")

@section('navbar')
  @include('partials/_navbar')
@stop

@section('content')


  @foreach ($users as $user)
    <p>此使用者為 <a href='user/{{ $user->id }}'>{{ $user->name }}</a></p>
  @endforeach

@stop

@section("footer")
  @include('partials/_footer')
@stop




