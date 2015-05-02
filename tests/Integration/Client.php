<?php

namespace Tarantool\Tests\Integration;

use Tarantool\Client as TarantoolClient;

trait Client
{
    /**
     * @var TarantoolClient
     */
    private static $client;

    /**
     * @beforeClass
     */
    public static function setUpClient()
    {
        self::$client = self::createClient();
    }

    /**
     * @afterClass
     */
    public static function tearDownClient()
    {
        self::$client = null;
    }

    protected static function createClient($host = null, $port = null)
    {
        $host = null === $host ? getenv('TARANTOOL_HOST') : $host;
        $port = null === $port ? getenv('TARANTOOL_PORT') : $port;

        return new TarantoolClient($host, $port);
    }
}
