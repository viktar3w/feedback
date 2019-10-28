@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left pt-4 pb-4">
                <h1>
                    {{__('Add New Feedback')}}
                </h1>
            </div>
        </div>
    </div>
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>
                {{__('Whoops!')}}
            </strong>
            {{__('There were some problems with your input.')}}
            <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('feedback.store') }}" method="post">
        @csrf
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">
                {{__('Email')}}
            </label>
            <div class="col-sm-4">
                <input required name="email"
                       type="email"
                       class="form-control"
                       id="email"
                       placeholder="{{__('Email')}}"
                       maxlength="70">
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">
                {{__('Name')}}
            </label>
            <div class="col-sm-4">
                <input required name="name"
                       type="text"
                       class="form-control"
                       id="name"
                       placeholder="{{__('Name')}}"
                       maxlength="70">
            </div>
        </div>
        <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">
                {{__('Phone')}}
            </label>
            <div class="col-sm-4">
                <input required name="phone"
                       type="tel"
                       class="form-control"
                       id="phone"
                       placeholder="{{__('Phone')}}"
                       maxlength="20">
            </div>
        </div>
        <div class="form-group row">
            <label for="text" class="col-sm-2 col-form-label">
                {{__('Text')}}
            </label>
            <div class="col-sm-4">
                <textarea required
                          name="text"
                          class="form-control"
                          id="text"
                          placeholder="{{__('Text')}}"
                          maxlength="255"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">
                    {{__('Submit')}}
                </button>
            </div>
        </div>
    </form>
@endsection
