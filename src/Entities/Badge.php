<?php
namespace Nicks451\TwitchSDK\Entities;

class Badge
{
    public $name;
    public $alpha;
    public $image;
    public $svg;

    public function mapArray(array $badgeArray)
    {
        $this->name = $badgeArray["name"];
        $this->alpha = $badgeArray["alpha"];
        $this->image = $badgeArray["image"];
        $this->svg = $badgeArray["svg"];
    }
}
