<?php


namespace Omnipay\Coinpayments\Message;

class AccountInfoRequest extends AbstractRequest
{
    protected function getCommand(): string
    {
        return 'get_basic_info';
    }    
}
