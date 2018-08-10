<?php
/**
 * Created by PhpStorm.
 * User: a.vartan
 * Date: 02.08.2018
 * Time: 14:34
 */

namespace Taber\Podrygka\GoogleAnalytics\Utils;


class Transaction
{
    private $transactionId;
    private $clientId;
    private $transactionAffiliation;
    private $transactionRevenue;
    private $transactionShipping;
    private $transactionTax;
    private $currencyCode;

    public function __construct($transactionId, $clientId)
    {
        $this->setTransactionId($transactionId);
        $this->setClientId($clientId);
    }

    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
    }

    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    }

    public function setTransactionAffiliation($transactionAffiliation)
    {
        $this->transactionAffiliation = $transactionAffiliation;
    }

    public function setTransactionRevenue($transactionRevenue)
    {
        $this->transactionRevenue = $transactionRevenue;
    }

    public function setTransactionShipping($transactionShipping)
    {
        $this->transactionShipping = $transactionShipping;
    }

    public function setTransactionTax($transactionTax)
    {
        $this->transactionTax = $transactionTax;
    }

    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
    }

    public function getTransactionId()
    {
        return $this->transactionId;
    }

    public function getClientId()
    {
        return $this->clientId;
    }

    public function getTransactionAffiliation()
    {
        return $this->transactionAffiliation;
    }

    public function getTransactionRevenue()
    {
        return $this->transactionRevenue;
    }

    public function getTransactionShipping()
    {
        return $this->transactionShipping;
    }

    public function getTransactionTax()
    {
        return $this->transactionTax;
    }

    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }
}