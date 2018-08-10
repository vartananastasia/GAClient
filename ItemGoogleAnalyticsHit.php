<?php
/**
 * Created by PhpStorm.
 * User: a.vartan
 * Date: 02.08.2018
 * Time: 12:09
 */

namespace Taber\Podrygka\GoogleAnalytics;
use Taber\Podrygka\GoogleAnalytics\Utils\Item;

/**
 * отправка товаров из заказа в GA
 * Class ItemGoogleAnalyticsHit
 * @package Taber\Podrygka\GoogleAnalytics
 */
class ItemGoogleAnalyticsHit implements GoogleAnalyticsHitInterface
{
    /**
     * @var Item
     */
    private $_item;
    /**
     * тип запроса
     */
    const HIT_TYPE = 'item';

    public function __construct(Item $item)
    {
        $this->_item = $item;
    }

    /**
     * @return string
     */
    public function getParamsUrl()
    {
        $paramsUrl = '&ti=' . $this->_item->getTransactionId();
        $paramsUrl .= '&in=' . $this->_item->getItemName();
        $paramsUrl .= '&cid=' . $this->_item->getClientId();
        $paramsUrl .= $this->_item->getItemPrice() ? '&ip=' . $this->_item->getItemPrice() : '';
        $paramsUrl .= $this->_item->getItemQuantity() ? '&iq=' . $this->_item->getItemQuantity() : '';
        $paramsUrl .= $this->_item->getItemCode() ? '&ic=' . $this->_item->getItemCode() : '';
        $paramsUrl .= $this->_item->getItemCategory() ? '&iv=' . $this->_item->getItemCategory() : '';
        $paramsUrl .= $this->_item->getItemCurrencyCode() ? '&cu=' . $this->_item->getItemCurrencyCode() : '';
        // '&cid=555&ti=12345&in=sofa&ip=00&iq=2&ic=u3eqds43&iv=furniture&cu=EUR'
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
            'in' => ['Item name', 'Required'],
            'ip' => 'Item price',
            'iq' => 'Item quantity',
            'ic' => 'Item code / SKU',
            'iv' => 'Item variation / category',
            'cu' => 'Currency code',
        ];
    }
}