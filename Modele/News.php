<?php


class News
{
    private $Titre;
    private $Contenu;
    private $Date;
    private $Image;
    private $Id;
    /**
     * News constructor.
     * @param $Titre
     * @param $Image
     * @param $Date
     * @param $Contenu
     */
    public function __construct($Titre, $Image, $Date, $Contenu ,$id)
    {
        $this->Titre = $Titre;
        $this->Image = $Image;
        $this->Date = $Date;
        $this->Contenu = $Contenu;
        $this->Id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->Titre;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->Image;
    }

    public function getId()
    {
        return $this->Id;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->Date;
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        return $this->Contenu;
    }



}