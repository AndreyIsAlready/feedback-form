<?php

namespace App\FeedbackInterface;

interface FeedbackFactoryInterface
{
    /**
     * @param array $properties
     * @return FeedbackInterface
     */
    public function createFeedback(array $properties): FeedbackInterface;
}