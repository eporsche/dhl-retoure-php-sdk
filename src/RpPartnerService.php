<?php

namespace DHL\DHLRetoure;

use stdClass;
use SOAPVar;
use SOAPHeader;

class RpPartnerService extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     * @access private
     */
    private static $classmap = array(
      'BookLabelRequestType' => '\DHL\DHLRetoure\BookLabelRequestType',
      'BookLabelResponseType' => '\DHL\DHLRetoure\BookLabelResponseType',
      'WsRequestType' => '\DHL\DHLRetoure\WsRequestType',
      'WsResponseType' => '\DHL\DHLRetoure\WsResponseType');

    /**
     * @param array $options A array of config values
     * @param string $wsdl The wsdl file to use
     * @access public
     */
    public function __construct(array $options = array(), $username, $password, $wsdl = 'https://amsel.dpwn.net/abholportal/gw/lp/schema/1.0/var3ws.wsdl')
    {
      $defaultOptions = array("classmap"=>self::$classmap,"trace" => true,"exceptions" => true, 'cache_wsdl' => WSDL_CACHE_BOTH);
      $callOptions = array_merge($defaultOptions, $options);

      $ns = 'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd';
      $token = new stdClass();
      $token->Username = new SOAPVar($username, XSD_STRING, null, null, null, $ns);
      $token->Password = new SOAPVar($password, XSD_STRING, null, null, null, $ns);
      $wsec = new stdClass();
      $wsec->UsernameToken = new SoapVar($token, SOAP_ENC_OBJECT, null, null, null, $ns);
      $headers = new SOAPHeader($ns, 'Security', $wsec, true);
      $this->__setSoapHeaders($headers);

      parent::__construct($wsdl, $callOptions);

    }

    /**
     * @param BookLabelRequestType $parameters
     * @access public
     * @return BookLabelResponseType
     */
    public function BookLabel(BookLabelRequestType $parameters)
    {
      return $this->__soapCall('BookLabel', array($parameters));
    }

}
