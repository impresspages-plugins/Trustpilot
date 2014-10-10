<?php

namespace Plugin\Trustpilot\Trustpilot;

/**
 * This file is part of the ImpressPages Trustpilot plugin.
 *
 * @author Eugene Azuka Christopher <eugeneazuka@gmail.com>
 */



class Review
{
    /**
     * The uncompressed data in JSON format.
     *
     * @var string
     */
    protected $review;


    /**
     * Returns the Time object of the review creation.
     *
     * @return Time
     */
    public function getTime() {
        return new Time($this->review->Created);
    }

    /**
     * Returns the title of the review.
     *
     * @return string
     */
    public function title() {
        return $this->review->Title;
    }

    /**
     * Returns the content of the review.
     *
     * @return string
     */
    public function content() {
        return $this->review->Content;
    }

    /**
     * Return the TrustScore object of the review.
     *
     * @return TrustScore
     */
    public function getTrustScore() {
        return new TrustScore($this->review->TrustScore);
    }

    /**
     * Returns the reply content of the company.
     *
     * @return string
     */
    public function companyReply() {
        return $this->review->CompanyReply;
    }

    /**
     * Returns the User object of the review.
     *
     * @return User
     */
    public function getuser() {
        return new User($this->review->User);
    }

    /**
     * Returns the url of the review.
     *
     * @return string
     */
    public function url() {
        return $this->review->Url;
    }

    /**
     * Returns true is the review is verified.
     *
     * @return boolean
     */
    public function isVerified() {
        return $this->review->IsVerified;
    }

    /**
     * Constructor.
     *
     * @param string $review The uncompressed data in JSON format.
     */
    public function __construct($review) {
        $this->review = $review;
    }
}
