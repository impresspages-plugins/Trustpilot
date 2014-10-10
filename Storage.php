<?php

namespace Plugin\Trustpilot;



class Storage implements Trustpilot\CacheInterface
{


    /**
     * The time limit to use the cached file.
     *
     * @var string
     */
    protected $cacheTimeLimit;


    public function get($key) {
        $feed = ipStorage()->get('Trustpilot', $key.'dataValue');
        $timestamp = ipStorage()->get('Trustpilot', $key.'dataCacheTimestamp');

        if($feed) {
            if(strtotime(date('d-m-Y H:i:s')) - strtotime($timestamp) <= $this->cacheTimeLimit ) {

                return $feed;
            }
            else {
                $this->remove($key);

                return false;
            }
        }

        return false;
    }

    public function set($key, $value) {
        ipStorage()->set('Trustpilot', $key.'dataValue', $value);
        ipStorage()->set('Trustpilot', $key.'dataCacheTimestamp', date('d-m-Y H:i:s'));
    }

    public function remove($key) {
        ipStorage()->remove('Trustpilot', $key.'dataValue');
        ipStorage()->remove('Trustpilot', $key.'dataCacheTimestamp');
    }

    public function __construct() {
        $this->cacheTimeLimit = ipGetOption('Trustpilot.timeLimit') ? : 10800;
    }

}
