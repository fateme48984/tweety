<?php

namespace App\Jobs;

use App\Models\Weather;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class GetWeatherData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $url = 'https://api.openweathermap.org/data/2.5/weather';
    private $key = 'bf65d8b174418831a16055a19f50144f';
    private $cities = [
        'Berlin Mitte' => [ 'latitude' => 52.520008, 'longitude' => 13.404954],
        'Berlin Friedrichshain' => [ 'latitude' => 52.515816, 'longitude' => 13.454293]
    ];

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->cities as $name => $values) {
            $result = Http::get($this->url,[
                'lat' => $values['latitude'],
                'lon' => $values['longitude'],
                'appid' => $this->key,
                'units' => 'metric'
            ])->json();

            Weather::factory()->create([
               'time'=>now(),
               'name'=>$result['name'],
               'latitude'=>$result['coord']['lat'],
               'longitude'=>$result['coord']['lon'],
               'temp_celsius'=>$result['main']['temp'],
               'pressure'=>$result['main']['pressure'],
               'humidity'=>$result['main']['humidity'],
               'temp_min'=>$result['main']['temp_min'],
               'temp_max'=>$result['main']['temp_max'],
            ]);
        }
    }
}
