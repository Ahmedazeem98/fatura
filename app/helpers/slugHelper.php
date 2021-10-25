<?php

namespace App\helpers;

use Illuminate\Support\Str;

class slugHelper
{
    public static function slugHandling(&$request)
    {
        $request->request->add(['slug' => strtolower(Str::slug($request->title, '-'))]);
    }

}
