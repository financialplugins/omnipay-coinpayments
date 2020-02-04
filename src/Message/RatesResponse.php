<?php

namespace Omnipay\Coinpayments\Message;

/**
 * Class RatesResponse
 * @package Omnipay\Coinpayments\Message
 *
 * Example API response:
 * {
 * "error": "ok",
 * "result": {
 *  "BTC": {
 *  "is_fiat": 0,
 *  "rate_btc": "1.000000000000000000000000",
 *  "last_update": "1375473661",
 *  "tx_fee": "0.00100000",
 *  "status": "online",
 *  "name": "Bitcoin",
 *  "confirms": "2",
 *  "capabilities": ["payments", "wallet", "transfers", "convert"]
 * },
 * ...
 * ...
 *
 */
class RatesResponse extends Response
{
    public function getPaymentCurrencies()
    {
        return array_filter($this->getData(), function ($currency) {
            return $currency['is_fiat'] == 0 && $currency['status'] == 'online' && $currency['accepted'] == 1;
        });
    }
}
