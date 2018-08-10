<?php
/**
 * Created by PhpStorm.
 * User: a.vartan
 * Date: 02.08.2018
 * Time: 12:08
 */

namespace Taber\Podrygka\GoogleAnalytics;
use Taber\Podrygka\GoogleAnalytics\Utils\Transaction;

/**
 * отправка заказа в GA
 * Class TransactionGoogleAnalyticsHit
 * @package Taber\Podrygka\GoogleAnalytics
 */
class TransactionGoogleAnalyticsHit implements GoogleAnalyticsHitInterface
{
    /**
     * @var Transaction
     */
    private $_transaction;
    /**
     * тип запроса
     */
    const HIT_TYPE = 'transaction';

    public function __construct(Transaction $transaction)
    {
        $this->_transaction = $transaction;
    }

    /**
     * @return string
     */
    public function getParamsUrl()
    {
        $paramsUrl = '&ti=' . $this->_transaction->getTransactionId();
        $paramsUrl .= '&cid=' . $this->_transaction->getClientId();
        $paramsUrl .= $this->_transaction->getTransactionAffiliation() ? '&ta=' . $this->_transaction->getTransactionAffiliation() : '';
        $paramsUrl .= $this->_transaction->getTransactionRevenue() ? '&tr=' . $this->_transaction->getTransactionRevenue() : '';
        $paramsUrl .= $this->_transaction->getTransactionShipping() ? '&ts=' . $this->_transaction->getTransactionShipping() : '';
        $paramsUrl .= $this->_transaction->getTransactionTax() ? '&tt=' . $this->_transaction->getTransactionTax() : '';
        $paramsUrl .= $this->_transaction->getCurrencyCode() ? '&cu=' . $this->_transaction->getCurrencyCode() : '';
        //  '&cid=555&ti=12345&ta=westernWear&tr=0.00&ts=0.00&tt=0.00&cu=EUR'
        return $paramsUrl;
    }

    /**
     * @return string
     */
    public function getHitType()
    {
        return self::HIT_TYPE;
    }

    /**
     * @return array
     */
    public function getParams(){
        return [
            'cid' => 'Anonymous Client ID',
            'ti' => ['Transaction ID', 'Required'],
            'ta' => 'Transaction affiliation',
            'tr' => 'Transaction revenue',
            'ts' => 'Transaction shipping',
            'tt' => 'Transaction tax',
            'cu' => 'Currency code',
        ];
    }
}