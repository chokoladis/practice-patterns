<?

interface FarmAnimals
{
    public function getBenefits(): array;
}

class Cow implements FarmAnimals
{
    public function getBenefits(): array
    {
        return [
            '100 литров молока',
            '20 кг мяса'
        ];
    }
}

class Pig
{
    public function getBenefits(): array
    {
        return [
            '25 кг мяса'
        ];
    }
}

class FarmFactory {

    static function add(string $class) {
        switch ($class){
            case 'pig':
                return new Pig();
            case 'cow':
                return new Cow();
            default: throw new Exception("Error Processing Request", 1);
        }
    }
}

$cow = FarmFactory::add('cow');
$pig = FarmFactory::add('pig');

var_dump($cow->getBenefits(), $pig->getBenefits());