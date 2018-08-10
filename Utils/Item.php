<?php
/**
 * Created by PhpStorm.
 * User: a.vartan
 * Date: 02.08.2018
 * Time: 14:34
 */

namespace Taber\Podrygka\GoogleAnalytics\Utils;


class Item
{
    private $transactionId;
    private $itemName;
    private $clientId;
    private $itemPrice;
    private $itemQuantity;
    private $itemCode;
    private $itemCategory;
    private $currencyCode;

    public function __construct($transactionId, $itemName, $clientId)
    {
        $this->setTransactionId($transactionId);
        $this->setItemName($itemName);
        $this->setClientId($clientId);
    }

    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
    }

    public function setItemName($itemName)
    {
        $this->itemName = $itemName;
    }

    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    }

    public function setItemPrice($itemPrice)
    {
        $this->itemPrice = $itemPrice;
    }

    public function setItemQuantity($itemQuantity)
    {
        $this->itemQuantity = $itemQuantity;
    }

    public function setItemCode($itemCode)
    {
        $this->itemCode = $itemCode;
    }

    public function setItemCategory($itemCategory)
    {
        $this->itemCategory = $itemCategory;
    }

    public function setItemCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
    }

    public function getTransactionId()
    {
        return $this->transactionId;
    }

    public function getItemName()
    {
        return $this->itemName;
    }

    public function getClientId()
    {
        return $this->clientId;
    }

    public function getItemPrice()
    {
        return $this->itemPrice;
    }

    public function getItemQuantity()
    {
        return $this->itemQuantity;
    }

    public function getItemCode()
    {
        return $this->itemCode;
    }

    public function getItemCategory()
    {
        return $this->itemCategory;
    }

    public function getItemCurrencyCode()
    {
        return $this->currencyCode;
    }
}