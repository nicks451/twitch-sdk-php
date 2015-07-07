<?php
namespace nicks451\TwitchSDK\Entities;

class Emoticon
{
    public $emoticon_set;
    public $height;
    public $width;
    public $url;

    public function mapArray(array $emoticonArray)
    {
        $this->emoticon_set = $emoticonArray["emoticon_set"];
        $this->height = $emoticonArray["height"];
        $this->width = $emoticonArray["width"];
        $this->url = $emoticonArray["url"];
    }
}
