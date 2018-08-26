<?php

namespace DHL\DHLRetoure;

class BookLabelResponseType extends WsResponseType
{

    /**
     * @var string $label
     * @access public
     */
    public $label = null;

    /**
     * @var anonymous45 $issueDate
     * @access public
     */
    public $issueDate = null;

    /**
     * @var string $routingCode
     * @access public
     */
    public $routingCode = null;

    /**
     * @var string $idc
     * @access public
     */
    public $idc = null;

    /**
     * @var string $idcType
     * @access public
     */
    public $idcType = null;

    /**
     * @var string $intIdc
     * @access public
     */
    public $intIdc = null;

    /**
     * @var string $intIdcType
     * @access public
     */
    public $intIdcType = null;

    /**
     * @param string $label
     * @param anonymous45 $issueDate
     * @param string $routingCode
     * @param string $idc
     * @param string $idcType
     * @param string $intIdc
     * @param string $intIdcType
     * @access public
     */
    public function __construct($label, $issueDate, $routingCode, $idc, $idcType, $intIdc, $intIdcType)
    {
      $this->label = $label;
      $this->issueDate = $issueDate;
      $this->routingCode = $routingCode;
      $this->idc = $idc;
      $this->idcType = $idcType;
      $this->intIdc = $intIdc;
      $this->intIdcType = $intIdcType;
    }

}
