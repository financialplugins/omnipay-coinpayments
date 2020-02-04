<?php

namespace Omnipay\Coinpayments\Message;

class TransactionResponse extends Response
{
    public function getTransactionReference()
    {
        return $this->getData()['txn_id'];
    }
}
