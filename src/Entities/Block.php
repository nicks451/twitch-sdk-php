<?php
namespace Nicks451\TwitchSDK\Entities;

class Block
{
    public $id;
    public $updated_at;
    public $user;

    public function mapArray(array $blockArray)
    {
        $this->id = $blockArray["_id"];
        $this->updated_at = $blockArray["updated_at"];
        $this->user = new User();
        $this->user->mapArray($blockArray["user"]);
    }
}
