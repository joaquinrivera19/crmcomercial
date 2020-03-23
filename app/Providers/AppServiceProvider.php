<?php

namespace crmcomercial\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
        \DB::listen(function ($query) {

            if (strstr($query->sql, ' ', true) == "insert" || strstr($query->sql, ' ', true) == "update" || strstr($query->sql, ' ', true) == "delete") {

                Storage::disk('local')->append('logs.txt', 'Fecha: ' . Carbon::now());
                Storage::disk('local')->append('logs.txt', 'Consulta: ' . $query->sql);
                Storage::disk('local')->append('logs.txt', 'Valores: ');
                foreach ($query->bindings as $binding) {
//                    dump($log);
                    Storage::disk('local')->append('logs.txt', $binding);
//                    $bindings = $binding;
                }

                Storage::disk('local')->append('logs.txt', '------------------------------------------------------------------------------------------------');

            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
