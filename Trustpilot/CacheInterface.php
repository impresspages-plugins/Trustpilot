<?php

namespace Plugin\Trustpilot\Trustpilot;

/**
 * This file is part of the ImpressPages Trustpilot plugin.
 *
 * @author Eugene Azuka Christopher <eugeneazuka@gmail.com>
 */


 
interface CacheInterface
{
    /**
     * Get the cache data.
     *
     * @param string|integer $key.
     *
     * @return string|false if the cache is too old or does not exist.
     */
    public function get($key);

    /**
     * Set the cache data.
     *
     * @param string|integer $key.
     * @param string         $value The data to cache.
     */
    public function set($key, $value);

}
