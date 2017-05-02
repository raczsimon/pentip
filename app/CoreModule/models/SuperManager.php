<?php
namespace App\CoreModule\Models;

use Nette;

class SuperManager
{
    public $database;

    public function __construct(Nette\Database\Context $database)
    {
        $this->database = $database;
    }

    /**
     * Check if the option is available
     * @param string $option
     * @return bool is the option available?
     */
    protected static function check($option)
    {
        return isset($option);
    }
}
