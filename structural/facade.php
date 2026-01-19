<?

class OrderCreateDTO
{
    public function __construct(
        public array $items,
        public string $typeDelivery
    )
    {
    }
}

class Basket
{
    public int $total = 0;

    public function addItem(string $item, int $price)
    {
        $this->total += $price;

        echo 'в корзину положили ',$item, ', с ценой ', $price;
    }
}

class Payment
{
    public function pay(int $value)
    {
        echo 'оплачено ',$value;
    }
}

class Delivery
{
    public function send(string $deliveryType)
    {
        echo 'Передано в доставку - ', $deliveryType;
    }
}

class OrderFacade
{
    public function __construct(
        private OrderCreateDTO $orderCreateDTO
    )
    {
    }

    public function create()
    {
        $basket = new Basket();

        foreach($this->orderCreateDTO->items as $item){
            $basket->addItem($item[0], $item[1]);
        }
        
        (new Payment)->pay($basket->total);
        (new Delivery)->send($this->orderCreateDTO->typeDelivery);
    }
}

$orderFacade = new OrderFacade(
    new OrderCreateDTO(
        [
            ['Хлеб', 100],
            ['Торт', 800],
            ['Трусы', 500]
        ],
        'Курьерская'
    )
);
$orderFacade->create();