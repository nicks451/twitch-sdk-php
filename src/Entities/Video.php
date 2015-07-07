<?php
namespace Nicks451\TwitchSDK\Entities;

class Video
{
    public $id;
    public $title;
    public $description;
    public $broadcast_id;
    public $status;
    public $tag_list;
    public $recorded_at;
    public $game;
    public $length;
    public $preview;
    public $url;
    public $views;
    public $broadcast_type;
    public $channel;

    public function mapArray(array $videoArray)
    {
        $this->id = $videoArray["_id"];
        $this->title = $videoArray["title"];
        $this->description = $videoArray["description"];
        $this->broadcast_id = $videoArray["broadcast_id"];
        $this->status = $videoArray["status"];
        $this->tag_list = $videoArray["tag_list"];
        $this->recorded_at = $videoArray["recorded_at"];
        $this->game = $videoArray["game"];
        $this->length = $videoArray["length"];
        $this->preview = $videoArray["preview"];
        $this->url = $videoArray["url"];
        $this->views = $videoArray["views"];
        $this->broadcast_type = $videoArray["broadcast_type"];
        $this->channel = $videoArray["channel"];
    }
}