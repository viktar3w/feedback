<?php
/**@var \App\Models\Feedback $feedback * */
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
                        {{__('Show Feedback') . ' #' . $feedback->id }}
                    </h1>
                </div>
            </div>
        </div>
        <div>
            <div class="row">
                <div class="col-8">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">
                                {{__('Name')}}
                            </th>
                            <th scope="col">
                                {{__('Email')}}
                            </th>
                            <th scope="col">
                                {{__('Phone')}}
                            </th>
                            <th scope="col">
                                {{__('Text')}}
                            </th>
                            <th scope="col">
                                {{__('Status')}}
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                {{$feedback->name}}
                            </td>
                            <td>
                                {{$feedback->email}}
                            </td>
                            <td>
                                {{$feedback->phone}}
                            </td>
                            <td>
                                {{$feedback->text}}
                            </td>
                            <td>
                                {{App\Services\FeedbackService::getStatusesLabel()[$feedback->status ?? 0] ?? ''}}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                @if($feedback->userFeedbackLogs->isNotEmpty())
                    <div class="col-4">
                        <h3>{{__('Logs')}}</h3>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">
                                    {{__('User Name')}}
                                </th>
                                <th scope="col">
                                    {{__('Action')}}
                                </th>
                                <th scope="col">
                                    {{__('Date action')}}
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($feedback->userFeedbackLogs as $log)
                                <?php /**@var App\Models\UserFeedbackLog $log**/?>
                                <tr>
                                    <td>
                                        {{$log->user->name}}
                                    </td>
                                    <td>
                                        {{$log->action}}
                                    </td>
                                    <td>
                                        {{$log->created_at}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
            <a href="{{route('feedback.edit',$feedback->id)}}">
                {{__('edit')}}
            </a>
        </div>
    </div>
@endsection
