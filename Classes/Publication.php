<?php

/**
 * Created by PhpStorm.
 * User: bori
 * Date: 05.01.2017
 * Time: 10:39
 */
abstract class Publication
{
    protected $id;
    protected $title;
    protected $shortText;
    protected $longText;

    public function __construct($id, $title, $shortText, $longText)
    {
        $this->id = $id;
        $this->title = $title;
        $this->shortText = $shortText;
        $this->longText = $longText;
    }

    public static function create ($id, PDO $pdo){
        $res = $pdo->query("SELECT * FROM ".static::TABLE_NAME." WHERE id = $id");
        $publication = $res->fetch();
        return new static($publication['id'], $publication['title'], $publication['short_text'],
            $publication['long_text'],$publication[static::ADD_ATTR]);
    }

}