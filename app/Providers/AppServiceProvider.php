<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //        $age = Carbon::createFromDate(1989, 8, 25)->age;
//        View::share('age', $age);
//        View::share('myname', 'Ryan');
//
//        View::composer('*', function ($view){
//            $view->with('auth', Auth::user());
//        });




        Blade::directive('age', function ($expression){

            $data = json_decode($expression);

            $year = $data[0];
            $month = $data[1];
            $day = $data[2];

            $age = Carbon::createFromDate($year,$month,$day)->age;

//            dd($data);
            return "<?php echo $age; ?>";
        });

        Blade::directive('selectedsubscription', function ($expression){
            return $expression;
//            $data = json_decode($expression);
//
//            $year = $data[0];
//            $month = $data[1];
//            $day = $data[2];
//
//            $age = Carbon::createFromDate($year,$month,$day)->age;
//
////            dd($data);
//
        });


        Blade::directive('sayHello', function ($expression){
            return "<?php echo 'hello'. $expression; ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $age = Carbon::createFromDate(1989, 8, 25)->age;
        View::share('age', $age);
        View::share('myname', 'Ryan');

        View::composer('*', function ($view){
            $view->with('auth', Auth::user());
        });
    }
}
