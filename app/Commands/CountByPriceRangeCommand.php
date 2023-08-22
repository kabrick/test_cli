<?php

namespace App\Commands;

use App\JsonReader;
use App\Services\FilterService;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Log;
use LaravelZero\Framework\Commands\Command;

class CountByPriceRangeCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'count_by_price_range {start} {end}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Return number of objects in stock according to a given range';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $start = $this->argument('start');
        $end = $this->argument('end');
        $url = config('variables.url');

        $json_reader = new JsonReader();
        $offer_collection = $json_reader->read($url);

        $filter_service = new FilterService($offer_collection);

        Log::channel("custom_channel")->error("Something going on");

        $this->info($filter_service->filterByPrice($start, $end));
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
