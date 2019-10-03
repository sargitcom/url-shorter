<?php

namespace App\Http\Helpers;

class GeoIP
{
    public static function getByIP($ipAddress)
    {
        $url = 'http://api.ipstack.com/' . $ipAddress . '?access_key=89634b85cbd6c5cd2f2c9eb4404a3591';

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($output);

        return $data->region_name;
    }
}
