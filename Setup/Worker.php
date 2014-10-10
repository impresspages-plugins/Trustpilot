<?php
/**
 * @package ImpressPages
 *
 */
namespace Plugin\Trustpilot\Setup;

class Worker extends \Ip\SetupWorker
{

    public function activate() {}

    public function deactivate() {}

    public function remove() {
        $storage = new \Plugin\Trustpilot\Storage();
        $storage->remove(ipGetOption('Trustpilot.domainId'));
    }

}