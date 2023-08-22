<?php

namespace Tests\Unit;

use App\JsonReader;
use App\Services\FilterService;
use PHPUnit\Framework\TestCase;

test('test_number_returned', function () {
    $vendor_id = 84;
    $url = "http://127.0.0.1:8000/test_api";

    $json_reader = new JsonReader();
    $offer_collection = $json_reader->read($url);

    $filter_service = new FilterService($offer_collection);

    expect($filter_service->filterByVendor($vendor_id))->toBe(1);
});