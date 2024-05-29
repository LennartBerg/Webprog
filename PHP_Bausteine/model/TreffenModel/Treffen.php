<?php
if (!isset($abs_modelpath)) {
    require_once "./../modelpath.php";
}
require $abs_modelpath . "/NutzerModel/Nutzer.php";

class Treffen{
    private $name;
    private $ort;
    private $datum;
    private $zeit;
    private $beschreibung;
    private $teilnehmer = array();
    private $ersteller;

    function __construct($name, $ort, $datum, $ersteller, $zeit, $beschreibung){
        $this->name = $name;
        $this->ort = $ort;
        $this->datum = $datum;
        $this->ersteller = $ersteller;
        $this->zeit = $zeit;
        $this->beschreibung = $beschreibung;
    }

    /**
     * @return mixed
     */
    public function getTreffenID()
    {
        return $this->TreffenID;
    }

    /**
     * @param mixed $TreffenID
     */
    public function setTreffenID($TreffenID)
    {
        $this->TreffenID = $TreffenID;
    }

    /**
     * @return mixed
     */
    public function getZeit()
    {
        return $this->zeit;
    }

    /**
     * @param mixed $zeit
     */
    public function setZeit($zeit)
    {
        $this->zeit = $zeit;
    }

    /**
     * @return mixed
     */
    public function getBeschreibung()
    {
        return $this->beschreibung;
    }

    /**
     * @param mixed $beschreibung
     */
    public function setBeschreibung($beschreibung)
    {
        $this->beschreibung = $beschreibung;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getOrt()
    {
        return $this->ort;
    }

    /**
     * @param mixed $ort
     */
    public function setOrt($ort)
    {
        $this->ort = $ort;
    }

    /**
     * @return mixed
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * @param mixed $datum
     */
    public function setDatum($datum)
    {
        $this->datum = $datum;
    }

    public function getTeilnehmer(): array
    {
        return $this->teilnehmer;
    }

    public function setTeilnehmer(array $teilnehmer)
    {
        $this->teilnehmer = $teilnehmer;
    }

    /**
     * @return mixed
     */
    public function getErsteller()
    {
        return $this->ersteller;
    }

    /**
     * @param mixed $ersteller
     */
    public function setErsteller($ersteller)
    {
        $this->ersteller = $ersteller;
    }


}
