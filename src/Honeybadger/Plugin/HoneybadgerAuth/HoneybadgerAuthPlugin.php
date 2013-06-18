<?php

namespace Honeybadger\Plugin\HoneybadgerAuth;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Guzzle\Http\Message\Request;
use Guzzle\Common\Event;

/**
 * Plugin to add the necessary api key headers to a request.
 */
class HoneybadgerAuthPlugin implements EventSubscriberInterface
{
    /**
     * @var array Auth headers to be added to the request.
     */
    private $api_key;

    /**
     * Construct a new HoneybadgerAuthPLugin.
     *
     * An array of auth headers to be added to the request.
     */
    public function __construct(array $api_key)
    {
        $this->api_key = $api_key;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            'request.before_send' => array('onRequestBeforeSend', 255),
        );
    }

    /**
     * Add auth header before a request is sent
     *
     * @param Event $event
     */
    public function onRequestBeforeSend(Event $event)
    {
        $request = $event['request'];
        if (!empty($this->api_key)) {
            $request->addHeader('X-API-Key', $api_key);
        }
    }

}
