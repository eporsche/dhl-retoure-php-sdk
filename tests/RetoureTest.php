<?php

use \PHPUnit\Framework\TestCase; 
use \DHL\DHLRetoure\RpPartnerService;
use \DHL\DHLRetoure\BookLabelRequestType;
use \DHL\DHLRetoure\BookLabelResponseType;

class RetoureTest extends TestCase {

    public function testRetoureLabel()
    {
        if (!getenv('API_USER') || !getenv('API_PASSWORD')) {
            throw new Exception('Set Credentials in .env!');
        }

        $client = new RpPartnerService([], getenv('API_USER'), getenv('API_PASSWORD'));

        $request = new BookLabelRequestType();

        $request->portalId = getenv('PORTAL_ID');
        $request->deliveryName = getenv('DELIVERY_NAME');
        
        $request->senderPostalCode = getenv('SENDER_POSTAL_CODE');
        $request->senderStreet = getenv('SENDER_STREET');
        $request->senderStreetNumber = getenv('SENDER_STREET_NUMBER');
        $request->senderCity = getenv('SENDER_CITY');
        $request->senderName1 = getenv('SENDER_NAME1');
        $request->senderName2 = getenv('SENDER_NAME2');
        $request->customerReference = getenv('SENDER_CUSTOMER_REFERENCE');

        $response = $client->BookLabel($request);
        
        $this->assertNotNull($response);

        //write label to disk
        // $data = base64_decode($response->label);
        // file_put_contents(dirname(__DIR__).'/retoure.pdf', $data);
    }

}
