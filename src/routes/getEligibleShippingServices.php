<?php

$app->post('/api/AmazonMerchant/getEligibleShippingServices', function ($request, $response, $args) {
    
    $settings =  $this->settings;
    
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey','apiSecret','appName','appVersion','region','merchantId','amazonOrderId','itemList','shipFromAddress','packageDimensions','weight','shippingServiceOptions']);
    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    
    $serviceUrl = $settings['endpoints'][$post_data['args']['region']];
    
    $config = array(
    'ServiceURL' => $serviceUrl,
    'ProxyHost' => null,
    'ProxyPort' => -1,
    'ProxyUsername' => null,
    'ProxyPassword' => null,
    'MaxErrorRetry' => 3,
    );
    $service = new MWSMerchantFulfillmentService_Client(
        $post_data['args']['apiKey'],
        $post_data['args']['apiSecret'],
        $post_data['args']['appName'],
        $post_data['args']['appVersion'],
        $config
    );
    
    $req = new MWSMerchantFulfillmentService_Model_GetEligibleShippingServicesRequest();
    $req->setSellerId($post_data['args']['merchantId']);
    
    $body['AmazonOrderId'] = $post_data['args']['amazonOrderId'];
    $body['ItemList'] = $post_data['args']['itemList'];
    $body['ShipFromAddress'] = $post_data['args']['shipFromAddress'];
    $body['PackageDimensions'] = $post_data['args']['packageDimensions'];
    $body['Weight'] = $post_data['args']['weight'];
    $body['ShippingServiceOptions'] = $post_data['args']['shippingServiceOptions'];
    if(!empty($post_data['args']['sellerOrderId'])) {
        $body['SellerOrderId'] = $post_data['args']['sellerOrderId'];
    }
    if(!empty($post_data['args']['mustArriveByDate'])) {
        $body['MustArriveByDate'] = $post_data['args']['mustArriveByDate'];
    }
    if(!empty($post_data['args']['shipDate'])) {
        $body['ShipDate'] = $post_data['args']['shipDate'];
    }
    if(!empty($post_data['args']['labelCustomization'])) {
        $body['LabelCustomization'] = $post_data['args']['labelCustomization'];
    }
    
    $req->setShipmentRequestDetails($body);
    
    
    try {
        $xml = simplexml_load_string($service->GetEligibleShippingServices($req)->toXML());
        $json = json_encode($xml);
        $res = json_decode($json,TRUE);
        
        $result['callback'] = 'success';
        $result['contextWrites']['to'] = is_array($res) ? $res : json_decode($res);
        if(empty($result['contextWrites']['to'])) {
            $result['contextWrites']['to']['status_msg'] = "Api return no results";
        }

    } catch (\MWSMerchantFulfillmentService_Exception $e) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $e->getMessage();
    } catch (\Exception $e) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $e->getMessage();
    }
    
    
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    
});
