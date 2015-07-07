<?php
namespace Nicks451\TwitchSDK\Entities;

class Follow
{
    public $created_at;
    public $notifications;
    public $user;

    public function mapArray(array $followArray)
    {
        $this->user = new User();
        $this->user->mapArray($followArray["user"]);
        $this->notifications = $followArray["notifications"];
        $this->created_at = $followArray["created_at"];
    }

}