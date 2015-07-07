<?php
namespace Nicks451\TwitchSDK\Entities;

class Team
{
    public $id;
    public $info;
    public $background;
    public $banner;
    public $name;
    public $display_name;
    public $logo;
    public $created_at;
    public $updated_at;

    public function mapArray(array $teamArray)
    {
        $this->id = $teamArray["_id"];
        $this->info = $teamArray["info"];
        $this->background = $teamArray["background"];
        $this->banner = $teamArray["banner"];
        $this->name = $teamArray["name"];
        $this->display_name = $teamArray["display_name"];
        $this->logo = $teamArray["logo"];
        $this->created_at = $teamArray["created_at"];
        $this->updated_at = $teamArray["updated_at"];
    }
}