<?

use SplObserver;
use SplSubject;

class EmailNotify implements SplObserver
{
    public function update(SplSubject $subject): void
    {
        echo 'mail';
        // mail($from, $to, $content);
    }
}

class SMSNotify implements SplObserver
{
    public function update(SplSubject $subject): void
    {
        
    }

    public function send(
        string $from, string $to, string $content
    ) : bool
    {
        return true; // some sms api -> sendCurl($from, $to, $content);
    }
}

class Order implements SplSubject
{
    public function attach(SplObserver $observer): void
    {

    }

    public function detach(SplObserver $observer): void
    {

    }

    public function notify(): void
    {

    }
    // 

    protected array $arObservers = [];

    public function addNotify(SplObserver $observer)
    {
        if (!in_array($observer, $this->arObservers)){
            $this->arObservers[] = $observer;
        }
    }

    public function create()
    {
        // some calc and save to db
        $this->afterCreate();
    }

    private function afterCreate()
    {
        foreach($this->arObservers as $observer) {
            $observer->send();
        }
    }
}