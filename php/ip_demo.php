<?php
    $ip = '117.25.13.123';
    $datatype = 'text';
    $url = 'http://api.ip138.com/query/?ip='.$ip.'&datatype='.$datatype;
    
    $header = array('token:00d5cb1fac5dc5cbfe2ff218292a2dfd33');
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
    
 //js引入页面 callback jsonp回调地址
    $ip = '117.25.13.123';
    $uid = 35553;
    $oid = 2;
    $token = '00d5cb1fac5dc5cbfe2ff218292a2dfd33';
    $sign = md5("addr=" + $ip+ "&token=" + $token);
    $url = 'http://api.ip138.com/query/';
    //以下是js引入代码，非PHP代码
    /***
    /*<script type="text/javascript" src="<?php echo $url.'?ip=118.28.8.8&callback=find&oid'.$oid.'&uid='.$uid.'&sign='.$sign;?>"></script>
    **/
    
