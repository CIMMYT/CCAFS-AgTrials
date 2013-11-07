<?php

/**
 * TbVariablesmeasured
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    trialsites
 * @subpackage model
 * @author     Herlin R. Espinosa G. - CIAT-DAPA
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class TbVariablesmeasured extends BaseTbVariablesmeasured {

    public function __toString() {
        return $this->getTbCrop() . ' - ' . $this->getTbTraitclass() . ' - ' . $this->getVrmsname();
    }

    //INICIO FUNCION PARA GRABAR O ACTUALIZAR
    public function save(Doctrine_Connection $conn = null) {
        //CONVERSION DE TEXTOS (MAYUSCULA - minuscula - Primera palabra en mayuscula)
        $this->setVrmsname(ucfirst(mb_strtolower($this->getVrmsname(), 'UTF-8')));
        $this->setVrmsshortname(ucfirst(mb_strtolower($this->getVrmsshortname(), 'UTF-8')));
        $this->setVrmsdefinition(ucfirst(mb_strtolower($this->getVrmsdefinition(), 'UTF-8')));
        $this->setVrmsunit(ucfirst(mb_strtolower($this->getVrmsunit(), 'UTF-8')));

        //REGISTRO DE USUARIO DE CREACION O ACTUALIZACION
        $id_user = sfContext::getInstance()->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');
        if ($this->isNew()) {
            $this->setIdUser($id_user);
            $this->setIdUserUpdate(null);
        } else {
            if ($this->getIdUser() == null)
                $this->setIdUser(null);
            if ($id_user == '')
                $this->setIdUserUpdate(null);
            else
                $this->setIdUserUpdate($id_user);
        }

        return parent::save($conn);
    }

    //CONFIGURACION PARA GUARDAR CREATE AT Y UPDATE AT
    public function setUp() {
        parent::setUp();
        $this->hasOne('TbTraitclass', array(
            'local' => 'id_traitclass',
            'foreign' => 'id_traitclass'));

        $this->hasOne('TbCrop', array(
            'local' => 'id_crop',
            'foreign' => 'id_crop'));

        $this->hasMany('TbTrialvariablesmeasured', array(
            'local' => 'id_variablesmeasured',
            'foreign' => 'id_variablesmeasured'));

        $timestampable0 = new Doctrine_Template_Timestampable(array());
        $this->actAs($timestampable0);
    }

}