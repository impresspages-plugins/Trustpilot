<?php

namespace Plugin\Trustpilot;


class Filter {
    public static function ipWidgetManagementMenu($optionsMenu,$widgetRecord)
    {
        if( $widgetRecord['name'] == 'Trustpilot' ) {
            $optionsMenu[] = array(
                'title' => __( 'Settings', 'Trustpilot', false ),
                'attributes' => array(
                    'class' => '_edit ipsWidgetEdit',
                )
            );
        }
        return $optionsMenu;
    }
}