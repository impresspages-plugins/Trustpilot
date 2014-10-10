<?php

namespace Plugin\Trustpilot;


class SiteController extends \Ip\Controller
{


    public function index() {

        $key = ipGetOption('Trustpilot.domainId'); 

        //$trustpilot = new \Plugin\Trustpilot\Trustpilot\Trustpilot($trustpilotDomainId, new Storage());

        $feed = ipStorage()->get('Trustpilot', $key.'dataValue');
        $timestamp = ipStorage()->get('Trustpilot', $key.'dataCacheTimestamp');

        ipStorage()->remove('Trustpilot', $key.'dataValue');
        ipStorage()->remove('Trustpilot', $key.'dataCacheTimestamp');

        echo var_dump(ipStorage()->getAll('Trustpilot'));  exit;




        //var_dump($trustpilot->getReviews()[0]);

        $data = array('trustpilot' => $trustpilot);

        return ipView('default.php', $data)->render();

        exit;
    }

}