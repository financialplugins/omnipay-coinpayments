<?php


namespace Omnipay\Coinpayments\Message;

class RatesRequest extends AbstractRequest
{
    protected function getCommand(): string
    {
        return 'rates';
    }

    public function getData()
    {
        $data = parent::getData();

        $data['accepted'] = 1;

        return $data;
    }
}
