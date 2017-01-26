<?php

/**
 * Created by PhpStorm.
 * User: bori
 * Date: 05.01.2017
 * Time: 11:42
 */
class News extends Publication
{
    private $source;
    const TABLE_NAME = 'news';
    const ADD_ATTR = 'source';

    public function __construct($id, $title, $shortText, $longText, $source)
    {
        parent::__construct($id, $title, $shortText, $longText);
        $this->source=$source;
    }

    public function getShortPreview(){
        $str='';
        $str.= $this->title."<br>";
        $str.= $this->shortText."<br>";
        $str.= "<a href='/BigText.php?id=".$this->id."&type=".$this::TABLE_NAME."'>Читать полностью</a><br>";
        $str.= "<hr>";
        return $str;
    }


}