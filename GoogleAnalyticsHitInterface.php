<?php
/**
 * Created by PhpStorm.
 * User: a.vartan
 * Date: 02.08.2018
 * Time: 12:10
 */

namespace Taber\Podrygka\GoogleAnalytics;

/**
 * Interface GoogleAnalyticsHitInterface
 * @package Taber\Podrygka\GoogleAnalytics
 */
interface GoogleAnalyticsHitInterface
{
    public function getParamsUrl();
    public function getHitType();
    public function getParams();
}