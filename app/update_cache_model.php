<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use keys;
use constant;
use DB;

class update_cache_model extends Model
{
    public function updateCache()
    {
        if (!empty($_POST[keys::$key_word]))
        {
            $url = $_POST[keys::$url];
            $query = "INSERT INTO `webpages`(`url`, `title`, `description`,`keyword`,`stype`,`udate`) VALUES ('".addslashes($_POST[keys::$url])."','".addslashes($_POST[keys::$title])."','".addslashes(($_POST[keys::$description]))."','".addslashes($_POST[keys::$key_word])."','".addslashes($_POST[keys::$type])."',now()) ON DUPLICATE KEY UPDATE udate=now()";
            DB::insert($query);
            echo DB::getPdo()->lastInsertId();
        }
        else
        {
            $url = $_POST[keys::$url];
            $query = "INSERT INTO `dlinks`(`url`,`wp_fk`,`dtype`) VALUES ('".$_POST[keys::$url]."','".$_POST[keys::$webpage_id]."','".$_POST[keys::$dtype]."')";
            DB::insert($query);
        }
    }

}
