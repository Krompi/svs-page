<?php

namespace App\Http\Requests\Twill;

use A17\Twill\Http\Requests\Admin\Request;

class EventRequest extends Request
{
    public function rulesForCreate()
    {
        return $this->rulesForTranslatedFields([], [
            'title' => 'required',
            'teaser' => 'nullable',
        ]);
    }

    public function rulesForUpdate()
    {
        return $this->rulesForTranslatedFields([], [
            'title' => 'required',
            'teaser' => 'nullable',
        ]);
    }
}
