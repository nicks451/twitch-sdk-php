<?php
namespace Nicks451\TwitchSDK\Entities;

class User
{
    /**
     * @var Integer
     */
    public $id;

    /**
     * @var String
     */
    public $name;

    /**
     * @var String
     */
    public $type;

    /**
     * @var String
     */
    public $display_name;

    /**
     * @var String The URL to the Users Logo
     */
    public $logo;

    /**
     * @var String
     */
    public $email;

    /**
     * @var boolean
     */
    public $partnered;

    /**
     * @var String
     */
    public $bio;

    /**
     * @var \DateTime
     */
    public $created_at;

    /**
     * @var \DateTime
     */
    public $updated_at;

    public function mapArray(array $userArray)
    {
        $this->id = $userArray["_id"];
        $this->name = $userArray["name"];
        $this->type = $userArray["type"];
        $this->display_name = $userArray["display_name"];
        $this->logo = $userArray["logo"];
        if(array_key_exists("email", $userArray)) {
            $this->email = $userArray["email"];
        }
        if(array_key_exists("partnered", $userArray)) {
            $this->partnered = $userArray["partnered"];
        }
        $this->bio = $userArray["bio"];
        $this->created_at = new \DateTime($userArray["created_at"]);
        $this->updated_at = new \DateTime($userArray["updated_at"]);
    }
}
