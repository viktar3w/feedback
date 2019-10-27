<?php
/**@var \App\Models\Feedback[] $feedbacks**/
?>
@extends('layouts.app')
@section('content')
    <div class="container">
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
                <th scope="col">phone</th>
                <th scope="col">text</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($feedbacks as $feedback)
                <tr>
                    <td>
                        {{$feedback->id}}
                    </td>
                    <td>
                        {{ $feedback->name }}
                    </td>
                    <td>
                        {{ $feedback->email }}
                    </td>
                    <td>
                        {{ $feedback->phone }}
                    </td>
                    <td>
                        {{ $feedback->text }}
                    </td>
                    <td>
                        {{ \App\Services\FeedbackService::getStatusesLabel()[$feedback->status] }}
                    </td>
                    <td>
                        <a href="{{route('feedbacks.edit',['id'=>$feedback->id])}}">
                            {{__('edit')}}
                        </a>
                    </td>
                    <td>
                        <a href="{{route('feedbacks.destroy',['id'=>$feedback->id])}}">
                            {{__('delete')}}
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $feedbacks->links() }}
@endsection
