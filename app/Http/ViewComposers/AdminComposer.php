<?php

/**
 * Created by PhpStorm.
 * User: jayson
 * Date: 2/17/2017
 * Time: 3:05 PM
 */

namespace App\Http\AdminComposer;

use Illuminate\View\View;
class AdminComposer
{
    public function create(View $view){



        $view->with('married', random_int(0,1));
        $view->with('test', 'say test!');

    }
}