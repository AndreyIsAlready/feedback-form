<?php

namespace App;

use App\FeedbackInterface\FeedbackInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Feedback extends Model implements FeedbackInterface
{
    /**
     * Связанная с моделью таблица.
     *
     * @var string
     */
    protected $table = 'feedback';

    /**
     * @var array
     */
    protected $rules = array(
        'name' => 'required|max:30',
        'phone' => 'required',
        'subject' => 'required|max:255'
    );

    /**
     * @param $inputs
     * @return bool
     */
    public function validate($inputs): Bool
    {
        $v = Validator::make($inputs, $this->rules);
        if($v->passes()) return true;
        $this->errors = $v->messages();
        return false;
    }
}
