<?php
namespace App\Model;

class Photo
{
    /* table columns */
    public $id;
    public $name;
    public $date;
    public $description;
    public $aperture;
    public $iso;
    public $shutter_speed;
    public $white_balance;
    public $users_id;
    public $camera_id;
    public $lens_id;
    public $path;
    public $hash;
    public $extension;
}