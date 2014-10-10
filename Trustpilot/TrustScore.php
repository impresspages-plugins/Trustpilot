<?php

namespace Plugin\Trustpilot\Trustpilot;

/**
 * This file is part of the ImpressPages Trustpilot plugin.
 *
 * @author Eugene Azuka Christopher <eugeneazuka@gmail.com>
 */



class TrustScore
{
    /**
     * The uncompressed data in JSON format.
     *
     * @var string
     */
    protected $trustScore;


    /**
     * Returns the trust score in stars.
     *
     * @return integer
     */
    public function stars() {
        return $this->trustScore->Stars;
    }

    /**
     * Returns the trust score.
     *
     * @return integer
     */
    public function score() {
        return $this->trustScore->Score;
    }

    /**
     * Returns the human readable trust score.
     *
     * @return string
     */
    public function readableScore() {
        return $this->trustScore->Human;
    }

    /**
     * Returns the url of the image which shows the number of stars.
     * Available sizes are: "small", "medium" and "large".
     * The default size is "small".
     *
     * @param string $size The size of the image, small, medium or large (optional).
     *
     * @return string
     *
     * @throws \Exception
     */
    public function imageUrl($size = 'small') {
        if (!in_array($size, array('small', 'medium', 'large'))) {
            throw new \Exception(sprintf(
                '"%s" is an invalid size please choose between "small", "medium" and "large".',
                $size
            ));
        }

        return $this->trustScore->StarsImageUrls->{$size};
    }

    /**
     * Constructor.
     *
     * @param string $trustScore The uncompressed data in JSON format.
     */
    public function __construct($trustScore) {
        $this->trustScore = $trustScore;
    }
}
