@extends('layouts.template')

@section('content')
<div class="row justify-content-md-center p-5">
  <div class="col-md-12 p-5 shadow" style="background:#fff;">
    <h3>{{ config('app.name', 'Laravel Class Management Software') }}</h3>
    <hr/>
    <img src="{{ asset('assets/images/laravel.png') }}" alt="https://cdn-images-1.medium.com/max/1200/1*j76hKq2KBP9-Y-N7KcnM6A.png" style="height:320px"></div>
  </div>
</div>
@endsection