@extends('forone::layouts.master')

@section('title', '查看'.$page_name)

@section('main')

    {!! Form::model($data,['url'=>Request::url().'/edit','class'=>'form-horizontal', 'method'=>'GET']) !!}
    @include($uri.'.form', ['show'=>true])
    {!! Form::close() !!}

@stop