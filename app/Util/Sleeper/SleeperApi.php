<?php

namespace App\Util\Sleeper;

use Arr;
use GuzzleHttp\Client;

class SleeperApi
{
    protected $key;

    protected $secret;

    protected $api_url;

    protected $client;

    /**
     * Client constructor.
     *
     * @param array $auth
     * @param array $urls
     */
    public function __construct(array $auth = null, array $urls = null)
    {
        if (! $auth) {
            $auth = config('sleeper.auth');
        }

        if (! $urls) {
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

    // Full size URL
    public function getAvatarFull($avatarId = 'db7b742f6549b03367eb48ed1e328e5e')
    {
        return 'https://sleepercdn.com/avatars/'.$avatarId;
    }

    // Thumbnail URL
    public function getAvatarThumbnail($avatarId = 'db7b742f6549b03367eb48ed1e328e5e')
    {
        return 'https://sleepercdn.com/avatars/thumbs/'.$avatarId;
    }

    /*
     ***************************************************************************
     * Leagues
     ***************************************************************************
     *
     * getUserLeagues($userId = 465649790558924800, $sport = 'nfl', $season = 2019)
     * getLeague($leagueId = 465649923983929344)
     * getLeagueRosters($leagueId = 465649923983929344)
     * getLeagueUsers($leagueId = 465649923983929344)
     * getLeagueMatchups($leagueId = 465649923983929344, $week = 1)
     * getLeaguePlayoffWinnerBracket($leagueId = 465649923983929344)
     * getLeaguePlayoffLoserBracket($leagueId = 465649923983929344)
     * getLeagueTransactions($leagueId = 465649923983929344, $round = 1)
     * getLeagueTradedPicks($leagueId = 465649923983929344)
     *
     */

    // Get all leagues for user
    public function getUserLeagues($userId = 465649790558924800, $sport = 'nfl', $season = 2019)
    {
        return $this->publicRequest('GET', 'v1/user/'.$userId.'/leagues/'.$sport.'/'.$season);
    }

    // Get a specific league
    public function getLeague($leagueId = 465649923983929344)
    {
        return $this->publicRequest('GET', 'v1/league/'.$leagueId);
    }

    // Getting rosters in a league
    public function getLeagueRosters($leagueId = 465649923983929344)
    {
        return $this->publicRequest('GET', 'v1/league/'.$leagueId.'/rosters');
    }

    // Getting users in a league
    public function getLeagueUsers($leagueId = 465649923983929344)
    {
        return $this->publicRequest('GET', 'v1/league/'.$leagueId.'/users');
    }

    // Getting matchups in a league
    public function getLeagueMatchups($leagueId = 465649923983929344, $week = 1)
    {
        return $this->publicRequest('GET', 'v1/league/'.$leagueId.'/matchups/'.$week);
    }

    // Getting the playoff bracket
    public function getLeaguePlayoffWinnerBracket($leagueId = 465649923983929344)
    {
        return $this->publicRequest('GET', 'v1/league/'.$leagueId.'/winners_bracket');
    }

    // Getting the playoff bracket
    public function getLeaguePlayoffLoserBracket($leagueId = 465649923983929344)
    {
        return $this->publicRequest('GET', 'v1/league/'.$leagueId.'/losers_bracket');
    }

    // Get transactions
    public function getLeagueTransactions($leagueId = 465649923983929344, $round = 1)
    {
        return $this->publicRequest('GET', 'v1/league/'.$leagueId.'/transactions/'.$round);
    }

    // Get traded picks
    public function getLeagueTradedPicks($leagueId = 465649923983929344)
    {
        return $this->publicRequest('GET', 'v1/league/'.$leagueId.'/traded_picks');
    }


    /*
     ***************************************************************************
     * Drafts
     ***************************************************************************
     *
     * getUserDrafts($userId = 465649790558924800, $sport = 'nfl', $season = 2019)
     * getLeagueDrafts($leagueId = 465649923983929344)
     * getDraft($draftId = 466678834456948736)
     * getDraftPicks($draftId = 466678834456948736)
     * getDraftTradedPicks($draftId = 466678834456948736)
     *
     */

    // Get all drafts for user
    public function getUserDrafts($userId = 465649790558924800, $sport = 'nfl', $season = 2019)
    {
        return $this->publicRequest('GET', 'v1/user/'.$userId.'/drafts/'.$sport.'/'.$season);
    }

    // Get all drafts for a league
    public function getLeagueDrafts($leagueId = 465649923983929344)
    {
        return $this->publicRequest('GET', 'v1/league/'.$leagueId.'/drafts');
    }

    // Get a specific draft
    public function getDraft($draftId = 466678834456948736)
    {
        return $this->publicRequest('GET', 'v1/draft/'.$draftId);
    }

    // Get all picks in a draft
    public function getDraftPicks($draftId = 466678834456948736)
    {
        return $this->publicRequest('GET', 'v1/draft/'.$draftId.'/picks');
    }

    // Get traded picks in a draft
    public function getDraftTradedPicks($draftId = 466678834456948736)
    {
        return $this->publicRequest('GET', 'v1/draft/'.$draftId.'/traded_picks');
    }
}
