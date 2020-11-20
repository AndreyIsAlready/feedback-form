<?php

namespace App;

use App\FeedbackInterface\FeedbackInterface;

class FeedbackFile implements FeedbackInterface
{
    /** @var string*/
    public $name = '';

    /** @var string */
    public $phone = '';

    /** @var string*/
    public $subject = '';

    /**
     * @return bool
     */
    public function save(): bool
    {
        file_put_contents('../app/db/db.txt', $this->createString(), FILE_APPEND);
        return true;
    }

    private function createString()
    {
        return json_encode($this)."\r\n";
    }
}