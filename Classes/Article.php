<?php

/**
 * Created by PhpStorm.
 * User: bori
 * Date: 05.01.2017
 * Time: 11:42
 */
class Article extends Publication
{
    private $author;
    const TABLE_NAME = 'articles';
    const ADD_ATTR = 'author';

    public function __construct($id, $title, $shortText, $longText, $author)
    {
        parent::__construct($id, $title, $shortText, $longText);
        $this->author=$author;
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