<?php

namespace App\Http\Controllers;

use App\Factory\FactoryFeedback;
use App\Factory\FactoryFeedbackFile;
use Illuminate\Http\Request;

class FeedbackFormController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getFeedbackForm(Request $request)
    {
        return view('FeedbackForm');
    }

    /**
     * @param Request $request
     * @return array|mixed|string
     */
    public function saveFeedback(Request $request)
    {

        $credentials = $request->only('name', 'phone', 'subject');

        $validator = \Validator::make($credentials, [
            'name' => ['required', 'max:30'],
            'phone' => ['required'],
            'subject' => ['required', 'max:255']
        ]);

        if ($validator->fails()) {
            return response()
                ->json(['errors' => $validator->errors()], 200);
        }

        $factory = new FactoryFeedback();

        $feedback = $factory->createFeedback($request->all());

        return [$feedback->save()];
    }
}
