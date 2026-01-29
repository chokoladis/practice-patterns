<?php

Class Product {
    function __construct(
        public string $name,
        public string $description,
        public int $barcode,
        public float $price,
    )
    {
    }
}

Class ProductBuilder {

    public string $name;
    public string $description;
    public int $barcode;
    public float $price;

    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
        return $this;
    }

    public function setBarcode(int $barcode)
    {
        $this->barcode = $barcode;
        return $this;
    }

    public function setPrice(float $price)
    {
        $this->price = $price;
        return $this;
    }

    public function build()
    {
        return new Product(
            $this->name,
            $this->description,
            $this->barcode,
            $this->price
        );
    }
}

$product = (new ProductBuilder())
    ->setName('test')->setDescription('description')->setBarcode(123)->setPrice(456)->build();
var_dump($product);