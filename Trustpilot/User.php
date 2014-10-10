<?php

namespace Plugin\Trustpilot\Trustpilot;

/**
 * This file is part of the ImpressPages Trustpilot plugin.
 *
 * @author Eugene Azuka Christopher <eugeneazuka@gmail.com>
 */



class User
{
    /**
     * The uncompressed data in JSON format.
     *
     * @var string
     */
    protected $user;

    /**
     * Returns the user name.
     *
     * @return string
     */
    public function name() {
        return $this->user->Name;
    }

    /**
     * Returns the total number of reviews written by the user.
     *
     * @return integer
     */
    public function totalReviews() {
        return $this->user->ReviewCount;
    }

    /**
     * Returns the user's city name if any null otherwise.
     *
     * @return string|null
     */
    public function city() {
        return $this->user->City;
    }

    /**
     * Returns the user's locale.
     *
     * @return string
     */
    public function locale() {
        return $this->user->Locale;
    }

    /**
     * Returns true if the user is verified.
     *
     * @return boolean
     */
    public function isVerified() {
        return $this->user->IsVerified;
    }

    /**
     * Returns true if the user has a profile image.
     *
     * @return boolean
     */
    public function hasImage() {
        return $this->user->HasImage;
    }

    /**
     * Returns the user's profile image in different sizes.
     *
     * @param string $size The size of the image (optional).
     *
     * @return string
     *
     * @throws \Exception
     */
    public function imageUrl($size = 'i24')
    {
        if (!in_array($size, array('i24', 'i35', 'i64', 'i73'))) {
            throw new \Exception(sprintf(
                '"%s" is an invalid size please choose between "i24", "i35", "i64" and "i73".',
                $size
            ));
        }

        return $this->user->ImageUrls->{$size};
    }

     /**
     * Constructor.
     *
     * @param string $user The uncompressed data in JSON format.
     */
    public function __construct($user) {
        $this->user = $user;
    }
}
