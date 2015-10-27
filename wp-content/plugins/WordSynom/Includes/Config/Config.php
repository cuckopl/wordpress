<?php

namespace Includes\Config;

class Config
{
    protected static $isInitialized = false;
    protected $config               = array();

    /**
     * Singleton.
     */
    private function __construct()
    {
        
    }

    /**
     *
     * @param string $key
     * @param type $data
     * @return \Config\Config
     * @throws Exception
     */
    public function addConfig($key, $data)
    {
        if (isset($this->config[$key])) {
            throw new \Exception(sprintf('Config Key %s already exists.', $key));
        }
        $this->config[$key] = $data;
        return $this;
    }

    /**
     *
     * @param string $key
     * @param type $data
     * @return \Config\Config
     */
    public function replace($key, $data)
    {
        $this->config[$key] = $data;
        return $this;
    }

    /**
     *
     * @param string $key
     * @return type
     * @throws \Exception
     */
    public function getConfig($key)
    {
        if (isset($this->config[$key])) {
            return $this->config[$key];
        }
        throw new \Exception(sprintf('No config exists with key %s', $key));
    }

    /**
     *
     * @return Config
     */
    public static function create()
    {
        if (self::$isInitialized) {
            return self::$isInitialized;
        }

        self::$isInitialized = new Self();
        return self::$isInitialized;
    }
}