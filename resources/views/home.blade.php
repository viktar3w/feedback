@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left pt-4 pb-4">
                <h2>Add New Product</h2>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('feedbacks.store') }}" method="POST">
        @csrf
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-4">
                <input required name="Feedback[email]" type="email" class="form-control" id="email" placeholder="Email" maxlength="70">
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-4">
                <input required name="Feedback[name]" type="text" class="form-control" id="name" placeholder="Name" maxlength="70">
            </div>
        </div>
        <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-4">
                <input required name="Feedback[phone]" type="tel" class="form-control" id="phone" placeholder="Phone" maxlength="20" >
            </div>
        </div>
        <div class="form-group row">
            <label for="text" class="col-sm-2 col-form-label">Text</label>
            <div class="col-sm-4">
                <textarea required name="Feedback[text]" class="form-control" id="text" placeholder="Text" maxlength="255"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
