<?php

namespace App\Factory;

use App\FeedbackFile;
use App\FeedbackInterface\FeedbackFactoryInterface;
use App\FeedbackInterface\FeedbackInterface;

class FactoryFeedbackFile implements FeedbackFactoryInterface
{
    /**
     * @param array $properties
     * @return FeedbackInterface
     */
    public function createFeedback(array $properties): FeedbackInterface
    {
        $feedback = new FeedbackFile();
        $feedback->name = $properties['name'];
        $feedback->phone = $properties['phone'];
        $feedback->subject = $properties['subject'];

        return $feedback;
    }
}
