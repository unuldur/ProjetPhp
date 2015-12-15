<?php

/**
 * Created by PhpStorm.
 * User: PAYS
 * Date: 15/12/2015
 * Time: 08:07
 */
class Admin extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('admin');

        $this->hasColumn('id', 'integer', 11, array('primary' => true,
            'autoincrement' => true));
        $this->hasColumn('pseudo', 'varchar', 100);
        $this->hasColumn('mdp', 'varchar', 100);
    }
}