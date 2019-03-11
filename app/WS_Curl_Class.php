<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WS_Curl_Class{
    var $endpointUrl;
    var $userId;
    var $userName;
    var $userKey;
    var $token;
    var $curl_handler;
    
    var $defaults = array(
            CURLOPT_HEADER => 0,
            // CURLOPT_FRESH_CONNECT => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_SSL_VERIFYPEER => false,	// ssl fix
            CURLOPT_SSL_VERIFYHOST => false	// ssl fix
        );
    
    //constructor saves the values
    function __construct($url, $name, $key) {
        $this->endpointUrl=$url;
        $this->userId=0;
        $this->userName=$name;
        $this->userKey=$key;
        $this->token=0;
    }

    function getChallenge() {
        $curl_handler = curl_init();
        $params = array("operation" => "getchallenge", "username" => $this->userName);
        $options = array(CURLOPT_URL => $this->endpointUrl."?".http_build_query($params));
        curl_setopt_array($curl_handler, ($this->defaults + $options));
        
        $result = curl_exec($curl_handler);
        if (!$result) {
            die(curl_error($curl_handler));
        }
        $jsonResponse = json_decode($result, true);
        
        if($jsonResponse["success"]==false) {
            //exit if something went wrong
            die("getChallenge failed: ".$jsonResponse["error"]["message"]."<br>");
        }

        $challengeToken = $jsonResponse["result"]["token"];

        return $challengeToken;
    }

    function login() {
        $curl_handler = curl_init();
        $token = $this->getChallenge();
        //create md5 string containing user accesskey from my preference page
        //and the challenge token obtained from get challenge result
        $generatedKey = md5($token.$this->userKey);
        
        $params = array("operation" => "login", "username" => $this->userName, "accessKey" => $generatedKey);
        $options = array(CURLOPT_URL => $this->endpointUrl, CURLOPT_POST => 1, CURLOPT_POSTFIELDS => http_build_query($params));
        curl_setopt_array($curl_handler, ($this->defaults + $options));
        $result = curl_exec($curl_handler);
        if (!$result) {
            die(curl_error($curl_handler));
        }
        
        $jsonResponse = json_decode($result, true);

        $this->userId = $jsonResponse["result"]["userId"];
        if($jsonResponse["success"]==false) {
            die("Login failed: ".$jsonResponse["error"]["message"]."<br>".$token."<br>");
        }
        
        $sessionId = $jsonResponse["result"]["sessionName"];
        //save session id
        $this->token=$sessionId;
        return $this;
    }
    
    function query($query) {
        $curl_handler = curl_init();
        $params = array("operation" => "query", "sessionName" => $this->token, "query" => $query);
        $options = array(CURLOPT_URL => $this->endpointUrl."?".http_build_query($params));
        curl_setopt_array($curl_handler, ($this->defaults + $options));
        
        $result = curl_exec($curl_handler);
        if (!$result) {
            die(curl_error($curl_handler));
        }
        $jsonResponse = json_decode($result, true);
        if($jsonResponse["success"]==false) {
            die("Query failed: ".$jsonResponse["error"]["message"]);
        }
        //Array of retrieved objects
        $retrievedObjects = $jsonResponse["result"];
        
        return $retrievedObjects;
    }
    
    function listtypes() {
        $curl_handler = curl_init();
        $params = array("operation" => "listtypes", "sessionName" => $this->token);
        $options = array(CURLOPT_URL => $this->endpointUrl."?".http_build_query($params));
        curl_setopt_array($curl_handler, ($this->defaults + $options));
        
        $result = curl_exec($curl_handler);
        if (!$result) {
            die(curl_error($curl_handler));
        }
        $jsonResponse = json_decode($result, true);
        
        if($jsonResponse["success"]==false) {
            //exit if something went wrong
            die("Listtypes failed: ".$jsonResponse["error"]["message"]."<br>");
        }

        $description = $jsonResponse["result"];

        return $description;
    }	
    
    function describe($type) {
        $curl_handler = curl_init();
        $params = array("operation" => "describe", "sessionName" => $this->token, "elementType" => $type);
        $options = array(CURLOPT_URL => $this->endpointUrl."?".http_build_query($params));
        curl_setopt_array($curl_handler, ($this->defaults + $options));
        
        $result = curl_exec($curl_handler);
        if (!$result) {
            die(curl_error($curl_handler));
        }
        $jsonResponse = json_decode($result, true);
        
        if($jsonResponse["success"]==false) {
            //exit if something went wrong
            die("Describe failed: ".$jsonResponse["error"]["message"]."<br>");
        }

        $description = $jsonResponse["result"];

        return $description;
    }	
    
    function retrieve($objectId) {
        $curl_handler = curl_init();
        $params = array("operation" => "retrieve", "sessionName" => $this->token, "id" => $objectId);
        $options = array(CURLOPT_URL => $this->endpointUrl."?".http_build_query($params));
        curl_setopt_array($curl_handler, ($this->defaults + $options));
        
        $result = curl_exec($curl_handler);
        if (!$result) {
            die(curl_error($curl_handler));
        }
        $jsonResponse = json_decode($result, true);
        
        if($jsonResponse["success"]==false) {
            //exit if something went wrong
            die("Retrieve failed: ".$jsonResponse["error"]["message"]."<br>");
        }

        $description = $jsonResponse["result"];

        return $description;
    }
    
    function create($type, $element, $filepath = '') {
        $curl_handler = curl_init();
        $params = array("operation" => "create", "format" => "json", "sessionName" => $this->token, "elementType" => $type, "element" => json_encode($element));
        $options = array(CURLOPT_URL => $this->endpointUrl, CURLOPT_POST => 1, CURLOPT_POSTFIELDS => http_build_query($params));
        if ($filepath != '') {
                $filename = pathinfo($filepath, PATHINFO_BASENAME);
                $size = filesize($filepath);
                $add_options = array(CURLOPT_HTTPHEADER => "Content-Type: multipart/form-data", CURLOPT_INFILESIZE => $size);
                $add_params = array("filedata" => "@$filepath", "filename" => $filename);
                
                $options += $add_options;
                $this->defaults[CURLOPT_HEADER] = 1;
                $options[CURLOPT_POSTFIELDS] = $params + $add_params;
        }
        curl_setopt_array($curl_handler, ($this->defaults + $options));
        $this->defaults[CURLOPT_HEADER] = 0;
        $result = curl_exec($curl_handler);
        if (!$result) {
            die(curl_error($curl_handler));
        }
        $jsonResponse = json_decode($result, true);
        if($jsonResponse["success"]==false) {
            print_r($jsonResponse);
            die("Create failed: ".$jsonResponse["error"]["message"]."<br>");
        }
        
        return $jsonResponse["result"];
    }
    
    function update($type, $element) {
        $curl_handler = curl_init();
        $params = array("operation" => "update", "format" => "json", "sessionName" => $this->token, "elementType" => $type, "element" => json_encode($element));
        $options = array(CURLOPT_URL => $this->endpointUrl, CURLOPT_POST => 1, CURLOPT_POSTFIELDS => http_build_query($params));
        curl_setopt_array($curl_handler, ($this->defaults + $options));
        $result = curl_exec($curl_handler);
        if (!$result) {
            die(curl_error($curl_handler));
        }
        $jsonResponse = json_decode($result, true);
        if($jsonResponse["success"]==false) {
            die("Update failed: ".$jsonResponse["error"]["message"]."<br>");
        }
        
        return $jsonResponse["result"];
    }
    
    function updateDocRel($docid, $relids, $preserve = true) {
        $curl_handler = curl_init();
        $params = array("operation" => "update_document_relations", "docid" => $docid, "sessionName" => $this->token, "relids" => $relids, "preserve" => var_export($preserve, true));
        $options = array(CURLOPT_URL => $this->endpointUrl, CURLOPT_POST => 1, CURLOPT_POSTFIELDS => http_build_query($params));
        curl_setopt_array($curl_handler, ($this->defaults + $options));
        $result = curl_exec($curl_handler);
        if (!$result) {
            die(curl_error($curl_handler));
        }
        $jsonResponse = json_decode($result, true);
        if($jsonResponse["success"]==false) {
            die("updateDocRel failed: ".$jsonResponse["error"]["message"]."<br>");
        }
        
        return $jsonResponse["result"];
    }
    
    
    /*
    Example!
    Execute this method as demonstration.
    It creates an Account, Product, SalesOrder and adds a LineItem
    Assigned user = current user
    
    As response, this function provides an array with all created object in the crm
    */
    function create_Account_Product_SalesOrder_LineItem_combined(){
        
        // create Account
        $accountParams = array(
            "accountname" => "WS test Account ".time(),
            "assigned_user_id" => $this->userId
        );
        $accountObject = $this->create("Accounts", $accountParams);
        
        // create Product
        $productParams = array(
            "productname" => "WS test produkt ".time(),
            "productcode" => "",
            "manufacturer" => "",
        );
        $productObject = $this->create("Products", $productParams);
        
        // create SalesOrder
        $salesOrderParams = array(
            "subject" => "WS test sales order ".time(),
            "sostatus" => "Created",
            "account_id" => $accountObject['id'],
            "assigned_user_id" => $this->userId,
            "bill_street" => "Teststreet 45",
            "ship_street" => "Teststreet 45",
            "invoicestatus" => "AutoCreated",
        );
        $salesOrderObject = $this->create("SalesOrder", $salesOrderParams);
        
        // create LineItem
        $lineItemParams = array(
            "parent_id" => $salesOrderObject['id'],
            "productid" => $productObject['id'],
            "sequence_no" => "1",
            "quantity" => "1",
            "listprice" => "4.99",
            "discount_percent" => "0",
            "discount_amount" => "0",
            "comment" => "Test line item, created by script",
            "description" => "Test line item, created by script"
        );
        $lineItemObject = $this->create("LineItem", $lineItemParams);
        
        // put objects together
        $response = array(
            "Account" => $accountObject,
            "Product" => $productObject,
            "SalesOrder" => $salesOrderObject,
            "LineItem" => $lineItemObject,
        );
        
        // response (use print_r or var_dump to check the result)
        return $response;
    }

}