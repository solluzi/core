<?php
declare(strict_types=1);
namespace Solluzi\Psr\Cache;

use Psr\Cache\CacheItemInterface;
use Psr\Cache\CacheItemPoolInterface;

/**
* @version		0.0.0
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
class CacheItemPool implements CacheItemPoolInterface
{
    public function getItem(string $key)
    {
        // TODO: implement this method.
    }

    public function getItems(array $keys = [])
    {
        // TODO: implement this method.
    }

    public function hasItem(string $key)
    {
        // TODO: implement this method.
    }

    public function clear()
    {
        // TODO: implement this method.
    }

    public function deleteItem(string $key)
    {
        // TODO: implement this method.
    }

    public function deleteItems(array $keys)
    {
        // TODO: implement this method.
    }

    public function save(CacheItemInterface $item)
    {
        // TODO: implement this method.
    }

    public function saveDeferred(CacheItemInterface $item)
    {
        // TODO: implement this method.
    }

    public function commit()
    {
        // TODO: implement this method.
    }
}