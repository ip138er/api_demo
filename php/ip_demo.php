<?php
    $ip = '117.25.13.123';
    $datatype = 'text';
    $url = 'http://api.ip138.com/query/?ip='.$ip.'&datatype='.$datatype;
    
    $header = array('token:00d5cb1fac5dc5cbfe2ff218292a2a45');
    echo getData($url,$header);   
    
    function getData($url,$header){  
        $ch = curl_init();  
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);  
        $handles = curl_exec($ch);  
        curl_close($ch);  
        return $handles;  
    }