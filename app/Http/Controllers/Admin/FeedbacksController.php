<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feedback;
use App\Http\Requests\FeedbackGuestRequest;
use App\Services\FeedbackService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbacksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = Feedback::latest()
            ->paginate(FeedbackService::QUANTITY);

        return view('admin.feedbacks.index', compact('feedbacks'))
            ->with('i', (request()->input('page', 1) - 1) * FeedbackService::QUANTITY);
    }

    /**
     * Store a newly created resource in storage.
     * @param FeedbackGuestRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FeedbackGuestRequest $request)
    {
        $validated = $request->validated();

        Feedback::create($validated);

        return redirect()->route('home')
            ->with('success','Feedback created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $feedback = Feedback::find($id);
        if (!$feedback) {
            return redirect()->route('feedback.index');
        }
        return view('admin.feedbacks.show', compact('feedback'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $feedback = Feedback::find($id);
        if (!$feedback) {
            return redirect()->route('feedback.index');
        }
        return view('admin.feedbacks.edit',compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
