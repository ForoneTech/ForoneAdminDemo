@extends('forone::layouts.master')

@section('title', '查看标签详情')

@section('main')

    {!! Form::model($data,['url'=>Request::url().'/edit','class'=>'form-horizontal', 'method'=>'GET']) !!}
    @include('tags.form', ['show'=>true])
    {!! Form::close() !!}

@stop