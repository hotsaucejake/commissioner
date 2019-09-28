<?php

namespace App\Util\Sleeper;

use Arr;
use GuzzleHttp\Client;

class SleeperApi
{
    protected $key;
    protected $secret;
    protected $api_url;
    protected $base_url;
    protected $client;


    /**
     * Client constructor.
     *
     * @param array $auth
     * @param array $urls
     */
    public function __construct(array $auth = null, array $urls = null)
    {
        if(! $auth) 
        {
            $auth = config('sleeper.auth');
        }

        if(! $urls) 
        {
            $urls = config('sleeper.urls');
        }

        $this->key = Arr::get($auth, 'key');
        $this->secret = Arr::get($auth, 'secret');
        $this->api_url = Arr::get($urls, 'api');

        $this->client = new Client([
            'base_uri' => $this->api_url,
        ]);
    }
    

    private function publicRequest($method = 'GET', $endpoint = 'AppStatus', $json = null, $params = [])
    {
        $response = $this->client->request($method, $endpoint, [
            'json' => $json,
            'query' => $params,
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }


    /*
     ***************************************************************************
     * User
     ***************************************************************************
     *
     * getUserByName($username = 'hotsaucejake')
     * getUserById($userId = 465649790558924800)
     * 
     */

    public function getUserByName($username = 'hotsaucejake')
    {
        return $this->publicRequest('GET', 'v1/user/'.$username);
    }

    public function getUserById($userId = 465649790558924800)
    {
        return $this->publicRequest('GET', 'v1/user/'.$userId);
    }


    /*
     ***************************************************************************
     * Avatars
     ***************************************************************************
     *
     * getAvatarFull($avatarId = 'db7b742f6549b03367eb48ed1e328e5e')
     * getAvatarThumbnail($avatarId = 'db7b742f6549b03367eb48ed1e328e5e')
     * 
     */

    public function getAvatarFull($avatarId = 'db7b742f6549b03367eb48ed1e328e5e')
    {
        return 'https://sleepercdn.com/avatars/'.$avatarId;
    }


    public function getAvatarThumbnail($avatarId = 'db7b742f6549b03367eb48ed1e328e5e')
    {
        return 'https://sleepercdn.com/avatars/thumbs/'.$avatarId;
    }

    
} 