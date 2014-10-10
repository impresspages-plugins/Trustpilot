<?php

namespace Plugin\Trustpilot\Trustpilot;

/**
 * This file is part of the ImpressPages Trustpilot plugin.
 *
 * @author Eugene Azuka Christopher <eugeneazuka@gmail.com>
 */


class Time
{
    /**
     * The uncompressed data in JSON format.
     *
     * @var string
     */
    protected $time;


    /**
     * Returns the DateTime object made from the UNIX timestamp.
     *
     * @return \DateTime
     */
    public function dateTime() {
        return new \DateTime('@' . $this->getUnixTime());
    }

    /**
     * Returns the human readable representation of the time. Ex: "4 October 2011 10:16:52 GMT".
     *
     * @return string
     */
    public function human() {
        return $this->time->Human;
    }

    /**
     * Returns the UNIX timestamp.
     *
     * @return int
     */
    public function unixTime() {
        return $this->time->UnixTime;
    }

    /**
     * Returns the human readable representation of the date part of the time. Ex: "15. Oct".
     *
     * @return string
     */
    public function humanDate() {
        return $this->time->HumanDate;
    }

    /**
     * Constructor.
     *
     * @param string $time The uncompressed data in JSON format.
     */
    public function __construct($time) {
        $this->time = $time;
    }
}
