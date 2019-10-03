<?php

namespace App\Http\Controllers;

use \App\Http\Controllers\Controller;
use App\Http\Helpers\GeoIP;
use App\Http\Helpers\Url;
use App\Http\Repository\UrlRepository;
use App\Http\Repository\UrlStatisticsRepository;
use \Illuminate\Http\Request;

class UrlController extends Controller
{
    public function welcome(Request $request)
    {
        if ($request->isMethod('post')) {

            $validatedData = $request->validate([
                'link' => 'required|max:2048|url',
            ]);

            $repository = new UrlRepository();
            $linkId = $repository->createLink($request->input('link'));

            $encodedId = Url::encode($linkId);

            $data = ['encodedUri' => $encodedId];
            return view('welcome', $data);
        }

        $data = [];
        return view('welcome', $data);
    }

    public function redirectToUri(Request $request, $id)
    {
        try {
            $linkId = (int)Url::decode($id);
            $repository = new UrlRepository();
            $link = $repository->getLinkById($linkId);
            $this->logStatistics($linkId);
            return redirect($link);
        } catch (\Exception $e) {
            return view('no_such_link');
        }
    }

    private function logStatistics($linkId)
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $location = GeoIP::getByIP($ip);
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $system = $this->getOperatingSystem();

        $repository = new UrlStatisticsRepository();
        $repository->createLinkStats($linkId, $ip, $location, $userAgent, $system);
    }

    private function getOperatingSystem() {
        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $operating_system = 'Unknown Operating System';

        if (preg_match('/linux/i', $u_agent)) {
            $operating_system = 'Linux';
        } elseif (preg_match('/macintosh|mac os x|mac_powerpc/i', $u_agent)) {
            $operating_system = 'Mac';
        } elseif (preg_match('/windows|win32|win98|win95|win16/i', $u_agent)) {
            $operating_system = 'Windows';
        } elseif (preg_match('/ubuntu/i', $u_agent)) {
            $operating_system = 'Ubuntu';
        } elseif (preg_match('/iphone/i', $u_agent)) {
            $operating_system = 'IPhone';
        } elseif (preg_match('/ipod/i', $u_agent)) {
            $operating_system = 'IPod';
        } elseif (preg_match('/ipad/i', $u_agent)) {
            $operating_system = 'IPad';
        } elseif (preg_match('/android/i', $u_agent)) {
            $operating_system = 'Android';
        } elseif (preg_match('/blackberry/i', $u_agent)) {
            $operating_system = 'Blackberry';
        } elseif (preg_match('/webos/i', $u_agent)) {
            $operating_system = 'Mobile';
        }

        return $operating_system;
    }

    public function uriStatistics(Request $request, $id)
    {
        $linkId = (int)Url::decode($id);
        $repository = new UrlStatisticsRepository();
        $stats = $repository->getLinkStats($linkId);
        return view('stats', ['data' => $stats]);
    }
}
