<?php
namespace Nicks451\TwitchSDK;

use GuzzleHttp;

use GuzzleHttp\Exception\ClientException;

class TwitchSDK
{
    protected $baseUrl = "https://api.twitch.tv/kraken";
    protected $authToken;
    protected $client;
    private $user;

    public function __construct($authToken)
    {
        $this->authToken = $authToken;

        $this->client = new GuzzleHttp\Client();
    }

    public function getUser()
    {
        $response = $this->request("/user");

        $userArray =  json_decode($response->getContents(), true);

        $user = new Entities\User();
        $user->mapArray($userArray);

        $this->user = $user;

        return $user;
    }

    public function getBlocks()
    {
        if ($this->user == null) {
            $this->getUser();
        }

        $response = $this->request("/users/" . $this->user->name . '/blocks');

        $blocksArray = json_decode($response->getContents(), true);
        $blocksArray = $blocksArray["blocks"];

        $blocks = [];
        foreach ($blocksArray as $blockArray) {
            $block = new Entities\Block();
            $block->mapArray($blockArray);
            $blocks[] = $block;
        }

        return $blocks;
    }

    public function getChannel($name = null)
    {
        $url = "/channel";
        if ($name != null) {
            $url .= "s/" . $name;
        }

        $response = $this->request($url);

        $responseArray = json_decode($response->getContents(), true);

        $channel = new Entities\Channel();
        $channel->mapArray($responseArray);

        return $channel;
    }

    public function getChannelFollows($name = null)
    {
        $url = "/channels/";
        if ($this->user == null) {
            $this->getUser();
        }

        if ($name == null) {
            $url .= $this->user->name;
        } else {
            $url .= $name;
        }

        $url .=  "/follows";

        $response = $this->request($url);

        $followsResponse = json_decode($response->getContents(), true);

        $followsArray = $followsResponse["follows"];

        $follows = [];
        foreach ($followsArray as $followArray) {
            $follow = new Entities\Follow();
            $follow->mapArray($followArray);
            $follows[] = $follow;
        }

        return $follows;
    }

    public function getChannelVideos($name = null)
    {
        $url = "/channels/";
        if ($this->user == null) {
            $this->getUser();
        }

        if ($name == null) {
            $url .= $this->user->name;
        } else {
            $url .= $name;
        }

        $url .=  "/videos";

        $response = $this->request($url);

        $videosResponse = json_decode($response->getContents(), true);

        $videosArray = $videosResponse["videos"];

        // return $videosArray;

        $videos = [];
        foreach ($videosArray as $videoArray) {
            $video = new Entities\Video();
            $video->mapArray($videoArray);
            $videos[] = $video;
        }

        return $videos;
    }

    public function getTopGames($limit = 10, $offset = 0)
    {
        $url = "/games/top?limit=" . $limit . "&offset=" . $offset;

        $response = $this->request($url);

        $gamesResponse = json_decode($response->getContents(), true);

        $gamesArray = $gamesResponse["top"];

        $games = [];
        foreach ($gamesArray as $gameArray) {
            $game = new Entities\Game();
            $game->mapArray($gameArray);
            $games[] = $game;
        }

        return $games;
    }

    public function getUserSubscriptions($name = null)
    {
        $url = "/channels/";
        if ($this->user == null) {
            $this->getUser();
        }

        if ($name == null) {
            $url .= $this->user->name;
        } else {
            $url .= $name;
        }

        $url .=  "/subscriptions";

        try {
            $response = $this->request($url);
        } catch (ClientException $e) {
            $statusCode = $e->getResponse()->getStatusCode();
            switch($statusCode) {
                case 403:
                    return "Access Forbidden";
                case 422:
                    return "Subscriptions Not Activated For User";
            }
        }
        

        $subscriptionsResponse = json_decode($response->getContents(), true);

        $subscriptionsArray = $subscriptionsResponse["subscriptions"];

        $subscriptions = [];
        foreach ($subscriptionsArray as $subscriptionArray) {
            $subscription = new Entities\Subscription();
            $subscription->mapArray($subscriptionArray);
            $subscriptions[] = $subscription;
        }

        return $subscriptions;
    }

    public function isSubscribed($channel, $name = null)
    {
        $url = "/channels/";
        if ($this->user == null) {
            $this->getUser();
        }

        $url .= $channel . "/";

        if ($name == null) {
            $url .= $this->user->name;
        } else {
            $url .= $name;
        }

        try {
            $response = $this->request($url);

            return true;

        } catch (ClientException $e) {
            return false;

            $statusCode = $e->getResponse()->getStatusCode();
            switch($statusCode) {
                case 403:
                    return "Access Forbidden";
                case 422:
                    return "Subscriptions Not Activated For User";
            }
        }

    }

    private function request($requestUrl)
    {
        $fullUrl = $this->baseUrl . $requestUrl;
        $response = $this->client->get($fullUrl, ['headers' => [
            'Accept' => 'application/vnd.twitchtv.v3+json',
            'Authorization' => 'OAuth ' . $this->authToken
        ]]);


        return $response->getBody();
    }
}
