<?php
namespace Models;

require_once('normalizeJson.php');

Class checkRequest {
    
    public function validate($input_data, $reqFields = []) {
        
        $result = [];
        $json_error = [];
        $error = [];
        
        $endpoints = [
            'NA' => 'https://mws.amazonservices.com',
            'EU' => 'https://mws-eu.amazonservices.com',
            'IN' => 'https://mws.amazonservices.in',
            'CN' => 'https://mws.amazonservices.com.cn',
            'JP' => 'https://mws.amazonservices.jp'
        ];
       
        $data = $input_data->getBody();

        if($data=='') {
            $post_data = $input_data->getParsedBody();
        } else {
            $toJson = new normilizeJson();
            $data = $toJson->normalizeJson($data); 
            $data = str_replace('\"', '"', $data);
            $post_data = json_decode($data, true);
        }

        if(json_last_error() != 0) {
            $json_error[] = json_last_error_msg() . '. Incorrect input JSON. Please, check fields with JSON input.';
        }

        if(!empty($json_error)) {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'JSON_VALIDATION';
            $result['contextWrites']['to']['status_msg'] = implode(',', $json_error);
        } else {
            if(!empty($reqFields)) {
                foreach($reqFields as $item) {
                    if(empty($post_data['args'][$item])) {
                        $error[] = $item;
                    }
                    if($item == 'region' && !empty($post_data['args'][$item])) {
                        if(!in_array($post_data['args'][$item], ['NA','EU','IN','CN','JP'])) {
                            $error[] = 'please, provide a valid region';
                        }
                    }
                }
            }

            if(!empty($error)) {
                $result['callback'] = 'error';
                $result['contextWrites']['to']['status_code'] = "REQUIRED_FIELDS";
                $result['contextWrites']['to']['status_msg'] = "Please, check and fill in required fields.";
                $result['contextWrites']['to']['fields'] = $error;
            }
        }
        
        if(empty($result)) {
            $post_data['args']['region'] = $endpoints[$post_data['args']['region']];
            $result = $post_data;
        }
        
        return $result;
        
    }
    
}
