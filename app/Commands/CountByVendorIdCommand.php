<?php

namespace App\Commands;

use App\JsonReader;
use App\Models\Offer;
use App\Services\FilterService;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class CountByVendorIdCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'count_by_vendor_id {id}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Return number of objects in stock related to the vendor';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $vendor_id = $this->argument('id');
        $url = config('variables.url');

        $json_reader = new JsonReader();
        $offer_collection = $json_reader->read($url);

        $filter_service = new FilterService($offer_collection);

        $this->info($filter_service->filterByVendor($vendor_id));
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
