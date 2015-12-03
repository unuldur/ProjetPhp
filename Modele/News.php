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

}