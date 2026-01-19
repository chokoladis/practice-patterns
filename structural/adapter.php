<?

interface BasePayment
{
    public function pay(float $value) : void;
}

// outside component/module 
class TBankPayment // other implements
{
    public function payment(int $sum)
    {
        echo 'прошла оплата: ',$sum; //send request
        return true; 
    }
}

class TBankPaymentAdapter implements BasePayment
{
    public function __construct(
        private TBankPayment $tbankPayment
    )
    {        
    }

    public function pay(float $value): void
    {
        $this->tbankPayment->payment((int)round($value));
    }
}

$tbankAdapter = new TBankPaymentAdapter(new TBankPayment);
$tbankAdapter->pay(1400);