@php
    /**@var \App\Models\Feedback $feedback **/
    /**@var \Illuminate\Support\ViewErrorBag $errors **/
@endphp
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left pt-4 pb-4">
                    <h1>
                        {{__('Add New Feedback')}}
                    </h1>
                </div>
            </div>
        </div>
        {{ Form::model($feedback, ['route' => ['feedback.store',$feedback->id], 'method' => 'post']) }}
            <div class="form-group row">
                {{ Form::label('name', __('Name'),['class'=>'col-sm-2 col-form-label']) }}
                <div class="col-sm-4">
                    {{ Form::text('name', null, [
                    'class' => 'form-control' . (($errors->has('name')) ? ' is-invalid' : ''),
                    'required'=>true,
                    'maxlength'=>70,
                    'placeholder'=>__('Name')
                    ]) }}
                    @if ($errors->has('name'))
                        <div class="invalid-feedback ">
                            {{$errors->first('name')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('email', __('Email'),['class'=>'col-sm-2 col-form-label']) }}
                <div class="col-sm-4">
                    {{ Form::email('email', null, [
                    'class' => 'form-control' . (($errors->has('email')) ? ' is-invalid' : ''),
                    'required'=>true,
                    'maxlength'=>70,
                    'placeholder'=>__('Email')
                    ]) }}
                    @if ($errors->has('email'))
                        <div class="invalid-feedback ">
                            {{$errors->first('email')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('phone', __('Phone'),['class'=>'col-sm-2 col-form-label']) }}
                <div class="col-sm-4">
                    {{ Form::tel('phone', null, [
                    'class' => 'form-control' . (($errors->has('phone')) ? ' is-invalid' : ''),
                    'required'=>true,
                    'maxlength'=>20,
                    'placeholder'=>__('Phone')
                    ]) }}
                    @if ($errors->has('phone'))
                        <div class="invalid-feedback ">
                            {{$errors->first('phone')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('text', __('Text'),['class'=>'col-sm-2 col-form-label']) }}
                <div class="col-sm-4">
                    {{ Form::textarea('text', null, [
                    'class' => 'form-control' . (($errors->has('text')) ? ' is-invalid' : ''),
                    'required'=>true,
                    'maxlength'=>255,
                    'placeholder'=>__('Text'),
                    'rows'=>3
                    ]) }}
                    @if ($errors->has('text'))
                        <div class="invalid-feedback ">
                            {{$errors->first('text')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    {{ Form::submit(__('Create'), ['class' => 'btn btn-primary']) }}
                </div>
            </div>
        {{ Form::close() }}
    </div>
@endsection
