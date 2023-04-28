<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Arr;

if (! function_exists('getcsv')) {
    function getcsv($f)
    {
        $csv = file($f);
        $arr = [];
        foreach ($csv as $line) {
            $arr[] = str_getcsv($line);
        }

        return $arr;
    }
}
?>
