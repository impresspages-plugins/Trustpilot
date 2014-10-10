<?php

namespace Plugin\Trustpilot\Trustpilot;

/**
 * This file is part of the ImpressPages Trustpilot plugin.
 *
 * @author Eugene Azuka Christopher <eugeneazuka@gmail.com>
 */



class Category
{
    /**
     * The uncompressed data in JSON format.
     *
     * @var string
     */
    protected $category;


    /**
     * Returns the category name.
     *
     * @return string
     */
    public function name() {
        return $this->category->Name;
    }

    /**
     * Returns the position number in the category.
     *
     * @return integer
     */
    public function position() {
        return $this->category->Position;
    }

    /**
     * Returns the amount of domains in the category.
     *
     * @return integer
     */
    public function totalCount() {
        return $this->category->Count;
    }

    /**
     * Returns the image url.
     * The "i100" size is the default one.
     *
     * @param string $size The width or the image (optional).
     *
     * @return string
     *
     * @throws \Exception
     */
    public function imageUrl($size = 'i100') {
        if (!in_array($size, array('i100', 'i120', 'i140', 'i180', 'i220', 'i280'))) {
            throw new \Exception(sprintf(
                '"%s" is an invalid size please choose between "i100", "i120", "i140", "i180", "i220" and "i280".',
                $size
            ));
        }

        return $this->category->ImageUrls->{$size};
    }

    /**
     * Constructor.
     *
     * @param string $category The uncompressed data in JSON format.
     */
    public function __construct($category) {
        $this->category = $category;
    }
}
