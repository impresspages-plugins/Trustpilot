<?php

namespace Plugin\Trustpilot;

class Event
{
    public static function ipBeforeController() {
        ipAddCss('assets/trustpilot.css');
    }

}