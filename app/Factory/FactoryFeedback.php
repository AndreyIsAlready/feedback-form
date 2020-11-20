<?php

namespace App\Factory;

use App\FeedbackInterface\FeedbackFactoryInterface;
use App\FeedbackInterface\FeedbackInterface;
use App\Feedback;

class FactoryFeedback implements FeedbackFactoryInterface
{
    /**
     * @param array $properties
     * @return FeedbackInterface
     */
    public function createFeedback(array $properties): FeedbackInterface
    {
        $feedback = new Feedback();
        $feedback->name = $properties['name'];
        $feedback->phone = $properties['phone'];
        $feedback->subject = $properties['subject'];

        return $feedback;
    }
}