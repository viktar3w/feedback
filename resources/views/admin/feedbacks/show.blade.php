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
                        {{__('Show Feedback') . " #{$feedback->id}" }}
                    </h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-between">
            <div class="col-12 col-md-4">
                <h3>{{__('Details')}}</h3>
                <table class="table table-sm">
                    <tbody>
                    <tr>
                        <th scope="col">
                            {{__('Name')}}
                        </th>
                        <td>
                            {{$feedback->name}}
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">
                            {{__('Email')}}
                        </th>
                        <td>
                            {{$feedback->email}}
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">
                            {{__('Phone')}}
                        </th>
                        <td>
                            {{$feedback->phone}}
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">
                            {{__('Text')}}
                        </th>
                        <td>
                            {{$feedback->text}}
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">
                            {{__('Status')}}
                        </th>
                        <td>
                            {{App\Services\FeedbackService::getStatusesLabel()[$feedback->status ?? 0] ?? ''}}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a href="{{route('feedback.edit',$feedback->id)}}">
                                {{__('edit')}}
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            @if($feedback->userFeedbackLogs->isNotEmpty())
                <div class="col-12 col-md-6">
                    <h3>{{__('Logs')}}</h3>
                    <table class="table table-sm">
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
                        @foreach($feedback->userFeedbackLogs->slice(0,4) as $log)
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
                        @if ($feedback->userFeedbackLogs->count() > 5)
                            <tr>
                                <td colspan="2">
                                    <a href="#">
                                        {{ __('See more logs')}}
                                    </a>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
