<?php


class News extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('new');

        $this->hasColumn('id', 'integer', 11, array('primary' => true,
            'autoincrement' => true));
        $this->hasColumn('titre', 'varchar', 100);
        $this->hasColumn('image', 'varchar', 100);
        $this->hasColumn('contenu', 'varchar', 2096);
        $this->hasColumn('date','datetime');
    }

    public function setUp() {
        $this->hasMany('Commentaires as commentaires',array('local' => 'id','foreign' => 'id_new'));
    }

    public function getResumer()
    {
        require_once("Controller/BBCodeConverter.php");
        $positionDernierEspace = 0;
        $text = $this->contenu;
        if( strlen($text) >= 100 )
        {
            $text= substr($text,0,100);
            $positionDernierEspace = strrpos($text,' ');
            $text = substr($text,0,$positionDernierEspace).'...';
        }
        return BBCodeConverter::bbcodeToSimpleTexte($text);
    }

    public function getContenu()
    {
        require_once("Controller/BBCodeConverter.php");
        return BBCodeConverter::bbcodeToHtml($this->contenu);
    }

    public function nbrCommentaires()
    {
        return count($this->commentaires);
    }

}