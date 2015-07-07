<?php
namespace Nicks451\TwitchSDK\Entities;

class Subscription
{
    public $id;
    public $user;
    public $created_at;

    public function mapArray(array $subscriptionArray)
    {
        $this->id = $subscriptionArray["_id"];
        $this->user = new User();
        $this->user->mapArray($subscriptionArray["user"]);
        $this->created_at = new \DateTime($subscriptionArray["created_at"]);
    }
}
