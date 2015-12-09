<?php

/**
 * Created by PhpStorm.
 * User: -CDM
 * Date: 09/12/2015
 * Time: 20:10
 */
class Commentaires extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('commentaires');

        $this->hasColumn('id', 'integer', 11, array('primary' => true,
            'autoincrement' => true));
        $this->hasColumn('id_new', 'integer', 11);
        $this->hasColumn('pseudo', 'varchar', 100);
        $this->hasColumn('infos', 'varchar', 100);
        $this->hasColumn('contenu', 'varchar', 2096);
    }

    public function setUp() {
        $this->hasOne('News as news',array('local' => 'id_news','foreign' => 'id'));
    }

}