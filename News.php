<?php


class News
{
    private $Titre;
    private $Contenu;
    private $Date;
    private $Image;

    /**
     * News constructor.
     * @param $Titre
     * @param $Image
     * @param $Date
     * @param $Contenu
     */
    public function __construct($Titre, $Image, $Date, $Contenu)
    {
        $this->Titre = $Titre;
        $this->Image = $Image;
        $this->Date = $Date;
        $this->Contenu = $Contenu;
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