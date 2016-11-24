<?php

namespace Test\Functional;

class AmazonMerchantTest extends BaseTestCase {
    
    public function testGetEligibleShippingServices() {
        
        $var = '{  
                    "args":{  
                        "apiKey":"",
                        "apiSecret":"",
                        "appName":"",
                        "appVersion":"",
                        "region":"",
                        "merchantId":"",
                        "amazonOrderId":"",
                        "itemList":"",
                        "shipFromAddress":"",
                        "packageDimensions":"",
                        "weight":"",
                        "shippingServiceOptions":"",
                        "sellerOrderId":"",
                        "mustArriveByDate":"",
                        "shipDate":"",
                        "labelCustomization":""
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/AmazonMerchant/getEligibleShippingServices', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testCreateShipment() {
        
        $var = '{  
                    "args":{  
                        "apiKey":"",
                        "apiSecret":"",
                        "appName":"",
                        "appVersion":"",
                        "region":"",
                        "merchantId":"",
                        "amazonOrderId":"",
                        "itemList":"",
                        "shipFromAddress":"",
                        "packageDimensions":"",
                        "weight":"",
                        "shippingServiceOptions":"",
                        "sellerOrderId":"",
                        "mustArriveByDate":"",
                        "shipDate":"",
                        "labelCustomization":"",
                        "shippingServiceId":"",
                        "shippingServiceOfferId":"",
                        "hazmatType":""
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/AmazonMerchant/createShipment', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetShipment() {
        
        $var = '{  
                    "args":{  
                        "apiKey":"",
                        "apiSecret":"",
                        "appName":"",
                        "appVersion":"",
                        "region":"",
                        "merchantId":"",
                        "shipmentId":""
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/AmazonMerchant/getShipment', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testCancelShipment() {
        
        $var = '{  
                    "args":{  
                        "apiKey":"",
                        "apiSecret":"",
                        "appName":"",
                        "appVersion":"",
                        "region":"",
                        "merchantId":"",
                        "shipmentId":""
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/AmazonMerchant/cancelShipment', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
}
