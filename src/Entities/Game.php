<?php
namespace Nicks451\TwitchSDK\Entities;

class Game
{
    public $id;
    public $name;
    public $box;
    public $logo;
    public $giantbomb_id;
    public $viewers;
    public $channels;

    public function mapArray(array $gameArray)
    {
        $this->id = $gameArray["game"]["_id"];
        $this->name = $gameArray["game"]["name"];
        $this->box = $gameArray["game"]["box"]["medium"];
        $this->logo = $gameArray["game"]["logo"]["medium"];
        $this->giantbomb_id = $gameArray["game"]["giantbomb_id"];
        $this->viewers = $gameArray["viewers"];
        $this->channels = $gameArray["channels"];
    }
}