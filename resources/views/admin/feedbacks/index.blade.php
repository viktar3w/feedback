<?php
/**@var \App\Models\Feedback[] $paginator**/
?>
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
                <li class="breadcrumb-item active" aria-current="page">
                    {{__('Feedbacks')}}
                </li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left pt-4 pb-4">
                    <h1>Feedbacks</h1>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th colspan="3" scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($paginator as $feedback)
                <tr>
                    <td>
                        {{$feedback->id}}
                    </td>
                    <td>
                        {{ $feedback->name }}
                    </td>
                    <td>
                        <a href="mailto:{{ $feedback->email }}" target="_blank">
                            {{ $feedback->email }}
                        </a>
                    </td>
                    <td>
                        {{ \App\Services\FeedbackService::getStatusesLabel()[$feedback->status] }}
                    </td>
                    <td>
                        <a href="{{route('feedback.show',['id'=>$feedback->id])}}">
                            {{__('show')}}
                        </a>
                    </td>
                    <td>
                        <a href="{{route('feedback.edit',['id'=>$feedback->id])}}">
                            {{__('edit')}}
                        </a>
                    </td>
                    <td>
                        {{ Form::open(['url' => route('feedback.destroy',['id'=>$feedback->id]), 'class' => 'pull-right']) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit(__('delete'), ['class' => 'btn btn-outline-dark']) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $paginator->links() }}
@endsection
