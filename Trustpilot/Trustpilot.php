<?php

namespace Plugin\Trustpilot\Trustpilot;

/**
 * Trustpilot class.
 *
 * This file is part of the ImpressPages Trustpilot plugin.
 *
 * @author Eugene Azuka Christopher <eugeneazuka@gmail.com>
 */



class Trustpilot
{
    /**
     * Version.
     */
    const VERSION = '0.1.0';

    /**
     * The uncompressed data in JSON format.
     *
     * @var string
     */
    protected $data;

    /**
     * The url feed.
     *
     * @var string
     */
    const FEED = 'http://s.trustpilot.com/tpelements/%s/f.json.gz';


    /**
     * Returns the domain name.
     *
     * @return string
     */
    public function getDomainName() {
        return $this->get()->DomainName;
    }

    /**
     * Returns the Time object of the last feed update.
     *
     * @return Time
     */
    public function getLastUpdate() {
        return new Time($this->get()->FeedUpdateTime);
    }

    /**
     * Returns the url of the Trustpilot page.
     *
     * @return string
     */
    public function getUrl() {
        return $this->get()->ReviewPageUrl;
    }

    /**
     * Returns the total number of reviews.
     *
     * @return integer
     */
    public function getTotalReviews() {
        return $this->get()->ReviewCount->Total;
    }

    /**
     * Returns an array of the number of reviews grouped by number of stars.
     *
     * @return array
     */
    public function getDistributionOverStars() {
        return $this->get()->ReviewCount->DistributionOverStars;
    }

    /**
     * Returns an array of Review object.
     *
     * @return array object
     */
    public function getReviews() {

        if (!isset($this->get()->Reviews) or count($this->get()->Reviews) === 0) {
            return array();
        }

        foreach ($this->get()->Reviews as $review) {
            $reviews[] = new Review($review);
        }

        return $reviews;
    }

    /**
     * Returns an array of Category object.
     *
     * @return array object
     */
    public function getCategories() {
        if (count($this->get()->Categories) === 0) {
            return array();
        }

        foreach ($this->get()->Categories as $category) {
            $categories[] = new Category($category);
        }

        return $categories;
    }

    /**
     * Returns the TrustScore object.
     *
     * @return TrustScore
     */
    public function getTrustScore() {
        return new TrustScore($this->get()->TrustScore);
    }

    /**
     * Returns the User object.
     *
     * @return TrustScore
     */
    public function getUser() {
        return new User($this->get()->User);
    }

    /**
     * Set the data result.
     *
     * @param string $data The data result.
     */
    protected function set($data) {
        $this->data = $data;
    }

    /**
     * Get the data result.
     *
     * @return string
     */
    protected function get() {
        return $this->data;
    }

    /**
     * Decode a gzip compressed string.
     *
     * @param string $data A gzip compressed string.
     *
     * @return string
     */
    protected function gzdecode($data) {

        if (!$data) { return null; }

        return function_exists('gzdecode') ? gzdecode($data) : gzuncompress($data);
    }

     /**
     * Get Feed from a Trustpilot.
     *
     * @param int
     *
     * @return string
     *
     * @throws \Exception
     */
    protected function getFeed($id) {

        $url = sprintf(self::FEED, $id);

        if (function_exists('curl_version')) {
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            if (ini_get('open_basedir') == '' && ini_get('safe_mode') == 'Off') {
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            }
            $data = curl_exec($ch);
            curl_close($ch);

            return $data;
        }
        else if (file_get_contents(__FILE__) && ini_get('allow_url_fopen')) {
            
            return file_get_contents($url);
        }
        else {

            throw new \Exception('You have neither cUrl installed nor allow_url_fopen activated. Please setup one of those!');
        }
    }

    /**
     * Constructor.
     *
     * @param string|int      $id      The Trustpilot site id.
     * @param CacheInterface  $cache   The CacheInterface to use (optional).
     */
    public function __construct($id, CacheInterface $cache=null) {

        $data ='';

        if ($cache !== null) {
            $data = $cache->get($id);

            if (!$data) {
                $data = $this->gzdecode($this->getFeed($id));

                if ($data) {
                    $cache->set($id, $data);
                }
            }
        }
        else {
            $data = $this->gzdecode($this->getFeed($id));
        }
        
        if ($data) {
            $this->set(json_decode($data));
        }  
    }

}
