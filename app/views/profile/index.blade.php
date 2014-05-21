@extends('master')

@section('content')
  {{{ $model->name }}}<br>
  {{ $model->email }}<br>
  {{ $model->country }}<br>
@stop
