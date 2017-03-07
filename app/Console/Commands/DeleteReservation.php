<?php

namespace App\Console\Commands;

use App\Adspace;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DeleteReservation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reservations:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all reservations where reserve_until is less than current_time';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

            $res = Reservation::where('reserve_until','<',Carbon::now()->format('Y-m-d'))->get();

            foreach ($res as $re){
                Adspace::findOrFail($re->billboard_id)->update(['status' => 1,'reserve_until' => Carbon::now()]);
            }

            Reservation::where('reserve_until','<',Carbon::now()->format('Y-m-d'))->delete();

            Log::info("Reservation deleted");

    }
}
