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
        $this->hasColumn('date','date');
    }

    public function setUp() {
        $this->hasMany('Commentaires as commentaires',array('local' => 'id','foreign' => 'id_new'));
    }

    public function getResumer()
    {
        $positionDernierEspace = 0;
        $text = $this->contenu;
        if( strlen($text) >= 100 )
        {
            $text= substr($text,0,100);
            $positionDernierEspace = strrpos($text,' ');
            $text = substr($text,0,$positionDernierEspace).'...';
        }
        return $text;
    }
}