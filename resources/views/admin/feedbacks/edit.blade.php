@php
    /**@var \App\Models\Feedback $feedback * */
    /**@var \Illuminate\Support\ViewErrorBag $errors **/
@endphp
@extends('layouts.app')
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('home')}}">
                        {{__('Home')}}
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{route('feedback.index')}}">
                        {{__('Feedbacks')}}
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ $feedback->name }}
                    (#{{ $feedback->id }})
                </li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left pt-4 pb-4">
                    <h1>
                        {{__('Edit Feedback') . ' #' . $feedback->id }}
                    </h1>
                </div>
            </div>
        </div>
        {{ Form::model($feedback, ['route' => ['feedback.update',$feedback->id], 'method' => 'post']) }}
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
            <label class="col-sm-2 col-form-label">
                {{__('Status')}}
            </label>
            <div class="col-sm-4">
                <div class="col-sm-10">
                    <div class="form-check">
                        {{ Form::radio('status', 0, ($feedback->status) ? false : true , ['class' => 'form-check-input','id'=>'status-disabled']) }}
                        {{ Form::label('status-disabled', \App\Services\FeedbackService::getStatusesLabel()[\App\Services\FeedbackService::STATUS_DISABLED],['class'=>'form-check-label']) }}
                    </div>
                    <div class="form-check">
                        {{ Form::radio('status', 1, ($feedback->status) ? true : false , ['class' => 'form-check-input','id'=>'status-active']) }}
                        {{ Form::label('status-active', \App\Services\FeedbackService::getStatusesLabel()[\App\Services\FeedbackService::STATUS_ACTIVE],['class'=>'form-check-label']) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                {{ Form::submit(__('Update'), ['class' => 'btn btn-primary']) }}
            </div>
        </div>
        {{ Form::close() }}
    </div>
@endsection
