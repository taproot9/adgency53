<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
class AdminComposer
{
    //    public function compose(View $view){
    //        $view->with('married', random_int(0,1));
    //        $view->with('test', 'say test!');
    //    }

    public function create(View $view){

        $view->with('married', random_int(0,1));
        $view->with('test', 'say test!');

    }
}