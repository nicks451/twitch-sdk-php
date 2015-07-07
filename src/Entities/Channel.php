<?php
namespace Nicks451\TwitchSDK\Entities;

class Channel
{
    public $id;
    public $mature;
    public $status;
    public $broadcaster_language;
    public $display_name;
    public $game;
    public $delay;
    public $language;
    public $name;
    public $logo;
    public $banner;
    public $video_banner;
    public $profile_banner_background_color;
    public $partner;
    public $url;
    public $views;
    public $followers;
    public $created_at;
    public $updated_at;

    public function mapArray(array $channelArray)
    {
        $this->id = $channelArray["_id"];
        $this->mature = $channelArray["mature"];
        $this->status = $channelArray["status"];
        $this->broadcaster_language = $channelArray["broadcaster_language"];
        $this->display_name = $channelArray["display_name"];
        $this->game = $channelArray["game"];
        $this->delay = $channelArray["delay"];
        $this->language = $channelArray["language"];
        $this->name = $channelArray["name"];
        $this->logo = $channelArray["logo"];
        $this->banner = $channelArray["banner"];
        $this->video_banner = $channelArray["video_banner"];
        $this->profile_banner_background_color = $channelArray["profile_banner_background_color"];
        $this->partner = $channelArray["partner"];
        $this->url = $channelArray["url"];
        $this->views = $channelArray["views"];
        $this->followers = $channelArray["followers"];
        $this->created_at = $channelArray["created_at"];
        $this->updated_at = $channelArray["updated_at"];
    }
}
