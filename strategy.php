<?

interface DiscountStrategy
{
    public function apply(float $value) : float;
}

class NoDiscount implements DiscountStrategy
{
    public function apply(float $value) : float
    {
        return $value;
    }
}

class BaseDiscount implements DiscountStrategy
{
    public function apply(float $value): float
    {
        return $value * 0.9;
    }
}

class BlackFridayDiscount implements DiscountStrategy 
{
    public function apply(float $value): float
    {
        return $value * 0.6;
    }
}

class PriceCalculator 
{
    public function __construct(
        private DiscountStrategy $typeDiscount
    )
    {}

    public function calculate(float $price)
    {
        return $this->typeDiscount->apply($price);
    }
}

$basePriceCalculator = new PriceCalculator(new NoDiscount);
$blackPriceCalculator = new PriceCalculator(new BlackFridayDiscount);

// var_dump(
//     $basePriceCalculator->calculate(100),
//     $blackPriceCalculator->calculate(100)
// );