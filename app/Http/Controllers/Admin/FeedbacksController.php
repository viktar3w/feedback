<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FeedbackAdminRequest;
use App\Models\Feedback;
use App\Http\Requests\FeedbackGuestRequest;
use App\Repositories\FeedbackRepository;
use App\Repositories\UserFeedbackLogRepository;
use App\Services\FeedbackService;

/**
 * Class FeedbacksController
 * @property FeedbackRepository feedbackRepository
 */
class FeedbacksController extends Controller
{
    /**@var FeedbackRepository $feedbackRepository * */
    private $feedbackRepository;

    /**
     * FeedbacksController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->feedbackRepository = app(FeedbackRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->feedbackRepository
            ->getAllWithPaginate(FeedbackService::QUANTITY);

        return view('admin.feedbacks.index', compact('paginator'));
    }

    /**
     * Store a newly created resource in storage.
     * @param FeedbackGuestRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FeedbackGuestRequest $request)
    {
        Feedback::create($request->input());

        return redirect()->route('home')
            ->with('success', 'Feedback created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $feedback = $this->feedbackRepository->getEdit($id);
        if (!$feedback) {
            abort(404);
        }
        return view('admin.feedbacks.show', compact('feedback'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        $feedback = $this->feedbackRepository->getEdit($id);
        if (!$feedback) {
            abort(404);
        }
        return view('admin.feedbacks.edit', compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FeedbackAdminRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(FeedbackAdminRequest $request, int $id)
    {
        $feedback = $this->feedbackRepository->getEdit($id);
        if (!$feedback) {
            return back(301)
                ->with('error', __("Feedback with Key №{$id} not found"))
                ->withInput();
        }
        $result = $feedback
            ->fill($request->input())
            ->save();
        if ($result) {
            return back()
                ->with('success', __("Feedback with Key №{$id} success updated"));
        }
        return back()
            ->with('error', __("Feedback with Key №{$id} didn't update"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $result = Feedback::destroy($id);
        if ($result) {
            return back()
                ->with('success',__('Feedback deleted'));
        }
        return back()
            ->with('error',__("Feedback didn't delete"));
    }
}
