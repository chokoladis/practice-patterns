<?

interface Bakery {
    public function cost(): float;
}

// interface Crooisant
// {

// }

class Crooisant implements Bakery
{
    public function cost() : float
    {
        return 100;
    }
}

class Cake implements Bakery
{
    public function cost() : float
    {
        return 75;
    }
}

class CreamDecorator implements Bakery
{
    const CREAM_RATIO = 1.1;

    public function __construct(
        public Bakery $product
    )
    {        
    }

    public function cost() : float
    {
        return round($this->product->cost() * self::CREAM_RATIO, 2);
    }
}

$crooisant = new Crooisant;
$cake = new Cake;
echo '<br>',$crooisant->cost();
echo '<br>',$cake->cost();
echo '<br>';
$cakeWithCream = new CreamDecorator($cake);
var_dump($cakeWithCream->cost());
