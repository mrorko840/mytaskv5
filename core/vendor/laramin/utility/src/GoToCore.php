<?php

namespace Laramin\Utility;

use App\Models\GeneralSetting;
use Closure;

class GoToCore{

    public function handle($request, Closure $next)
    {
        //$fileExists = file_exists(__DIR__.'/laramin.json');
        //$general = $this->getGeneral();
        // if ($fileExists && $general->maintenance_mode != 9 && env('PURCHASECODE')) {
        //     return redirect()->route(VugiChugi::acDRouter());
        // }

        $general = GeneralSetting::first();
        // if($_SERVER['SERVER_NAME'] == $general->code){
        //     return redirect()->route('home');
        // }

        //dd($general->code);
        return $next($request);
    }

    public function getGeneral(){
        $general = cache()->get('GeneralSetting');
        if (!$general) {
            $general = GeneralSetting::first();
        }
        return $general;
    }
}
