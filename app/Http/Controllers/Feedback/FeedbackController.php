<?php

namespace App\Http\Controllers\Feedback;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackRequest;
use App\model\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{

    function index() {
        return view('feedback/feedbackForm');
    }

    function feedbackSend(FeedbackRequest $request) {
        if($request->isMethod('post')) {
            $feedback = new Feedback();
            $feedback->fill($request->only(['name', 'review', 'email']));
            $feedback->save();
        }
        return redirect()->route('feedback');
    }
}
