<?php
declare(strict_types=1);
namespace Solluzi\Psr\Cache;

use Psr\SimpleCache\CacheInterface;
use Solluzi\Psr\Logger\FileLogger;

/**
* @version		1.1.1
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
class Redis implements CacheInterface
{
    protected $cache;
    protected $logger;

    public function connect($host)
    {
        $config      = include dirname(__DIR__,3) . "/config/redis.php";
        $credentials = $config[$host];
        $this->cache = new Redis([
            'host'           => $credentials['host'],
            'port'           => $credentials['port'],
            'connectTimeout' => $credentials['timeout'],
            'auth'           => $credentials['auth'],
            'ssl'            => ['verify_peer' => $credentials['verify_peer']]
        ]);
        $this->logger = new FileLogger();
    }

    public function get($key, $default = null)
    {
        try {
            return $this->cache->get($key);
        } catch (\Exception $e) {
            $this->logger->alert($e->getMessage());
        }
    }

    public function set($key, $value, $ttl = null)
    {
        try{
            $this->cache->setEx($key, $ttl, $value);
        } catch (\Exception $e){
            $this->logger->alert($e->getMessage());
        }
    }

    public function delete($key)
    {
        try {
            $this->cache->del($key);
        } catch (\Exception $e) {
            $this->logger->alert($e->getMessage());
        }
    }

    public function clear()
    {
        try {
            $this->cache->flushDb();
        } catch (\Exception $e) {
            $this->logger->alert($e->getMessage());
        }
    }

    public function getMultiple($keys, $default = null)
    {
        try {
            return $this->cache->mGet($keys);
        } catch (\Exception $e) {
            $this->logger->alert($e->getMessage());
        }
    }

    public function setMultiple($values, $ttl = null)
    {
        try {
            foreach($values as $key => $value){
                $this->cache->setEx($key, $ttl, $value);
            }
        } catch (\Exception $e) {
            $this->logger->alert($e->getMessage());
        }
        
    }

    public function deleteMultiple($keys)
    {
        try {
            $this->cache->del($keys);
        } catch (\Exception $e) {
            $this->logger->alert($e->getMessage());
        }
    }

    public function has($key)
    {
        try {
            return $this->cache->exists($key);
        } catch (\Exception $e) {
            $this->logger->alert($e->getMessage());
        }
    }


}