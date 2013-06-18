<?php

namespace Honeybadger\HoneybadgerAPI;

use Guzzle\Common\Collection;
use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;
use Honeybadger\Plugin\HoneybadgerAuth\HoneybadgerAuthPlugin;

/**
 * My example web service client
 */
class HoneybadgerAPIClient extends Client
{
    /**
     * Factory method to create a new HoneybadgerAPIClient
     *
     * The following array keys and values are available options:
     * - api_key: Private API key for the Honeybadger.io project.
     *
     * @param array|Collection $config Configuration data
     *
     * @return self
     */
    public static function factory($config = array())
    {
        $default = array();
        $required = array('api_key');
        $config = Collection::fromConfig($config, $default, $required);

        $client = new self($config->get('base_url'), $config);
        // Attach a service description to the client
        $description = ServiceDescription::factory(__DIR__ . '/services.php');
        $client->setDescription($description);

        $auth_plugin = new HoneybadgerAuthPlugin($config->get('api_key'));
        $client->addSubscriber($auth_plugin);

        return $client;
    }

    /**
     * Get information about a folder's items.
     *
     * @param integer $id The folder ID.
     * @param integer $id The folder ID.
     * @param integer $id The folder ID.
     * @param integer $id The folder ID.
     * @return array|mixed
     */
    public function sendNotice($id, $fields = NULL, $limit = 100, $offset = 0)
    {
        $command = $this->getCommand('GetFolderItems', array('id' => $id, 'fields' => $fields, 'limit' => $limit, 'offset' => $offset));
        return $this->execute($command);
    }

}
