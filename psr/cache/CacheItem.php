<?php
declare(strict_types=1);
namespace Solluzi\Psr\Cache;

use DateInterval;
use DateTimeInterface;
use Psr\Cache\CacheItemInterface;

/**
* @version		1.0.0
* @category		Action
* @package		
* @subpackage		
* @author		(name) <email@codesolluzi.com>
* @copyright	Copyright (c) 2022 Solluzi Tecnologia da Informação LTDA-ME. (https://codesolluzi.com)
* @license		https://codesolluzi.com/framework-license
*	
*	
*	
*/
class CacheItem implements CacheItemInterface
{
    public function getKey()
    {
        // TODO: implement this method
    }

    public function get()
    {
        // TODO: implement this method
    }

    public function isHit()
    {
        // TODO: implement this method
    }

    public function set(mixed $value)
    {
        // TODO: implement this method
    }

    public function expiresAt(?DateTimeInterface $expiration)
    {
        // TODO: implement this method
    }

    public function expiresAfter($time)
    {
        // TODO: implement this method
    }
    


}