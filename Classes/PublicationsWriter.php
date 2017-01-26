<?php

/**
 * Created by PhpStorm.
 * User: bori
 * Date: 16.01.2017
 * Time: 16:09
 */
class PublicationsWriter
{
    public $publications;
    private $publicationType;

    public function __construct($publicationType,PDO $pdo)
    {
        $this->publicationType = $publicationType;
        if($this->publicationType == 'articles'){
                $res = $pdo->query("SELECT id FROM ".$publicationType);
                foreach ($res as $id){
                    $this->publications[]=Article::create($id[0],$pdo);
                }
        }else if($this->publicationType == 'news') {
            $res = $pdo->query("SELECT id FROM " . $publicationType);
            foreach ($res as $id) {
                $this->publications[]=News::create($id[0],$pdo);
            }
        }
    }

    function __toString()
    {
        $res='';
        foreach ($this->publications as $publication) {
            $res .= $publication->getShortPreview();
        }
        return $res;

    }
/*$res = $pdo->query("SELECT * FROM ".static::TABLE_NAME." WHERE id = $id");*/


}
