<?
error_reporting(E_ALL);

interface Log
{
    static function getInstance(string $fileName) : static;
    public function log(mixed $content) : mixed;
}

class Logger implements Log
{
    // if $instance - singleton, if $instances is array  - multiton
    private static array $instances = []; 
    
    public function __construct(
        private string $fileName
    )
    {}

    static function getInstance(
        string $fileName
    ) : static
    {
        if (!isset(static::$instances[$fileName])) {
            static::$instances[$fileName] = new Logger($fileName.'.txt');
        }

        return static::$instances[$fileName];
    }

    public function log(mixed $content) : int|false
    {
        return file_put_contents($_SERVER['DOCUMENT_ROOT'].'/'.$this->fileName, $content ."\n", FILE_APPEND);
    }
}

$loger1 =  Logger::getInstance('pay');
$loger2 =  Logger::getInstance('pay');
$loger3 =  Logger::getInstance('delivery');

// $loger1->log('test data 1231');