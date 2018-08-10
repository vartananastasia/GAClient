<?php
/**
 * Created by PhpStorm.
 * User: a.vartan
 * Date: 02.08.2018
 * Time: 10:01
 */

namespace Taber\Podrygka\GoogleAnalytics;

use Bitrix\Main\Diag\Debug;

/**
 * Class GoogleAnalyticsClient
 * @package Taber\Podrygka\GoogleAnalytics
 */
class GoogleAnalyticsClient
{
    private $hitType;
    private $trackingId;

    # API settings
    const VERSION_ID = 1;
    const STATUS_CODE = 200;
    const API_BASE_URL = 'http://www.google-analytics.com/collect';
    const DEBUG_URL = 'http://www.google-analytics.com/debug/collect';
    const DEBUG_FILE = '_log/GA_debug.txt';
    const GA_LOG_FILE = '_log/GA_log.txt';

    /**
     * GoogleAnalyticsClient constructor.
     * @param $trackingId
     */
    public function __construct($trackingId)
    {
        $this->trackingId = $trackingId;
    }

    /**
     * @param GoogleAnalyticsHitInterface $analyticsHit
     * @param bool $debug
     */
    public function execute(GoogleAnalyticsHitInterface $analyticsHit, $debug = false)
    {
        $this->hitType = $analyticsHit->getHitType();
        if ($debug) {
            $url = self::DEBUG_URL;
        } else {
            $url = self::API_BASE_URL;
        }
        $request = 'v=' . self::VERSION_ID . '&tid=' . $this->trackingId . '&t=' . $this->hitType;
        $request .= $analyticsHit->getParamsUrl();

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $request);
        curl_exec($curl);
        curl_close($curl);
        // пишем все запросы к GA в файл со статусами ответов
        Debug::dumpToFile([$url, $request], 'GA_STATUS_ERROR_' . date('d.m.Y_H:i:s'), self::GA_LOG_FILE);
    }

    /**
     * @param $json
     * @return array
     */
    public static function JsonInAr($json)
    {
        $data = json_decode($json);
        $error = json_last_error();
        if ($error == JSON_ERROR_NONE) {
            return [$data, True];
        } else {
            return [json_last_error_msg(), False];
        }
    }
}