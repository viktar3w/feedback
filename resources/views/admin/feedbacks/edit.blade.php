<?php
/**@var \App\Models\Feedback $feedback * */
?>

@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left pt-4 pb-4">
                <h1>
                    {{__('Edit Feedback')}}
                </h1>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>
                {{__('Whoops!')}}
            </strong>{{__('There were some problems with your input.')}}<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('feedbacks.update',['id'=>$feedback->id]) }}"
          method="POST">
        @csrf
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">
                {{__('Email')}}
            </label>
            <div class="col-sm-4">
                <input required name="email"
                       type="email" class="form-control"
                       id="email"
                       value="{{$feedback->email}}"
                       placeholder="Email"
                       maxlength="70">
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">
                {{__('Name')}}
            </label>
            <div class="col-sm-4">
                <input required name="name" type="text"
                       class="form-control"
                       value="{{$feedback->name}}"
                       id="name"
                       placeholder="Name" maxlength="70">
            </div>
        </div>
        <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">
                {{__('Phone')}}
            </label>
            <div class="col-sm-4">
                <input required name="phone"
                       type="tel" class="form-control"
                       value="{{$feedback->phone}}"
                       id="phone" placeholder="Phone"
                       maxlength="20">
            </div>
        </div>
        <div class="form-group row">
            <label for="text" class="col-sm-2 col-form-label">
                {{__('Text')}}
            </label>
            <div class="col-sm-4">
                <textarea required name="text" class="form-control"
                          id="text"
                          placeholder="Text" maxlength="255">{{$feedback->text}}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="text" class="col-sm-2 col-form-label">
                {{__('Status')}}
            </label>
            <div class="col-sm-4">
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input"
                               type="radio"
                               name="status"
                               id="status-disabled"
                               value="{{\App\Services\FeedbackService::STATUS_DISABLED}}"
                            {{$feedback->status?'':'checked'}}>
                        <label class="form-check-label"
                               for="status-disabled">
                            {{\App\Services\FeedbackService::getStatusesLabel()[\App\Services\FeedbackService::STATUS_DISABLED]}}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio"
                               name="status" id="status-active"
                               value="{{\App\Services\FeedbackService::STATUS_ACTIVE}}" {{$feedback->status?'checked':''}}>
                        <label class="form-check-label" for="status-active">
                            {{\App\Services\FeedbackService::getStatusesLabel()[\App\Services\FeedbackService::STATUS_ACTIVE]}}
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
