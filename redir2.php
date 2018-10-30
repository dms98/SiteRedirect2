<?php

$par_par = $_REQUEST["par"];
$par_go = $_GET["go"];

include 'vai.php';

$par_go = strtolower($par_go);

$top_url= "http://<URL of your google firebase database>";

if ($par_go!="") { 
	
	$valor = httpGet($top_url, $par_go);
	if (is_numeric($valor)==false) {
		$valor=0;
	}
	$valor++;
	httpPut($top_url, $par_go, $valor);
	}


if (substr($par_go, 0, 8) == "listaabc") {
	$par_go="listaabc";
	header ('Cache-Control: no-cache, must-revalidate, Post-Check=0, Pre-Check=0');
	//header ('Expires: Sat, 25 Dez 1997 05:00:00 GMT');
	header ('Expires: -1');
	header ('Pragma: no-cache');
	//header ('X-Cacheable: no-cache');
	//header ('X-Served-From-Cache: no-cache');

	
        echo '<HTML><BODY>';
        echo '<HR>';
	foreach($vai as $x => $x_value) {
		echo 'Key= &nbsp;<B>' . $x;
		echo '&nbsp; - &nbsp;' . '<A HREF="http://url.neoage.com.br/' . $x . '/n" target="_tab">' . $x .'</a></B>, Value= &nbsp;' . $x_value;
		echo '<br>';

	}
        echo '<HR>';
        echo '</BODY></HTML>';
        
         
        $valor = httpGet($top_url, $par_go);
        
        echo 'antes: ' . $valor . '<BR>';
        
        $valor++;
        
        echo '<BR>depois: ' . $valor . '<BR>';
        
        
        echo '<BR>re:' . httpPut($top_url, $par_go, $valor);
            
        $par_go="";
        die;
}

if ($par_go!="") { 
	
	$vai_para = "Location: " . $vai[$par_go];
	header($vai_para);
	die;
	}
	

if ($par_go=="a") {
	//header("Location: http://www.mp.go.gov.br");
	echo 'par_par: ' . $par_par . '<br>';
	echo 'get-par: ' . $_GET["par"] . '<br>';
	echo 'par_go: ' . $par_go . '<br>';
	echo 'get_go: ' . $_GET["go"] . '<br>';
	echo '<HR>vai para: ' . $vai[$par_go] . '<BR>';
	
	if ($par_par=="lista") { 
		foreach($vai as $x => $x_value) {
			echo "Key=" . $x . ", Value=" . $x_value;
			echo "<br>";
		}
	}
	die;
}


function envia ($url, $par_go, $dados)
{

	$postdata = http_build_query(
	    array(
	        $par_go => $dados
	    )
	);
	//$postdata=$dados;
	
	//echo '<BR>post-data:' . $postdata;
 
	$opts = array('http' =>
	    array(
	        'method'  => 'POST',
	        'header'  => 'Content-Type: application/json\r\n'
	         . "Content-Length: " . strlen($postdata) . "\r\n",
	        'content' => $postdata
	    )
	);
	
	//echo '<BR>opts: ' . var_dump($opts);
 
	$context  = stream_context_create($opts);

	//echo '<BR>ctx: ' . var_dump($context);
	
	$resultado =  file_get_contents($url, false, $contexto);
    
    return $resultado;
    
}

function httpPut($top_url, $parametro, $data)
{
    $url = $top_url . $parametro . ".json";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}

function httpGet($top_url, $parametro) {
	// pega dados da WEB
	
	$url = $top_url . $parametro . ".json";
        
        $valor = file_get_contents($url);
        
        return $valor;
	
}


?>
