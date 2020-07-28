<!DOCTYPE html>
<html>

<?php
$user_agent = $_SERVER['HTTP_USER_AGENT'];

function getOS() { 
    global $user_agent;
    $os_platform  = "Unknown OS Platform";
    $os_array     = array(
                          '/windows nt 10/i'      =>  'Windows 10',
                          '/windows nt 6.3/i'     =>  'Windows 8.1',
                          '/windows nt 6.2/i'     =>  'Windows 8',
                          '/windows nt 6.1/i'     =>  'Windows 7',
                          '/windows nt 6.0/i'     =>  'Windows Vista',
                          '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                          '/windows nt 5.1/i'     =>  'Windows XP',
                          '/windows xp/i'         =>  'Windows XP',
                          '/windows nt 5.0/i'     =>  'Windows 2000',
                          '/windows me/i'         =>  'Windows ME',
                          '/win98/i'              =>  'Windows 98',
                          '/win95/i'              =>  'Windows 95',
                          '/win16/i'              =>  'Windows 3.11',
                          '/macintosh|mac os x/i' =>  'Mac OS X',
                          '/mac_powerpc/i'        =>  'Mac OS 9',
                          '/linux/i'              =>  'Linux',
                          '/ubuntu/i'             =>  'Ubuntu',
                          '/iphone/i'             =>  'iPhone',
                          '/ipod/i'               =>  'iPod',
                          '/ipad/i'               =>  'iPad',
                          '/android/i'            =>  'Android',
                          '/blackberry/i'         =>  'BlackBerry',
                          '/webos/i'              =>  'Mobile'
                    );
    foreach ($os_array as $regex => $value)
        if (preg_match($regex, $user_agent))
            $os_platform = $value;
    return $os_platform;
}

function getBrowser() {
    global $user_agent;
    $browser        = "Unknown Browser";
    $browser_array = array(
                            '/msie/i'      => 'Internet Explorer',
                            '/firefox/i'   => 'Firefox',
                            '/safari/i'    => 'Safari',
                            '/chrome/i'    => 'Chrome',
                            '/edge/i'      => 'Edge',
                            '/opera/i'     => 'Opera',
                            '/netscape/i'  => 'Netscape',
                            '/maxthon/i'   => 'Maxthon',
                            '/konqueror/i' => 'Konqueror',
                            '/mobile/i'    => 'Handheld Browser'
                     );

    foreach ($browser_array as $regex => $value)
        if (preg_match($regex, $user_agent))
            $browser = $value;
    return $browser;
}

$user_os        = getOS();
$user_browser   = getBrowser();
$device_details = "<strong>Browser: </strong>".$user_browser."<br /><strong>Operating System: </strong>".$user_os."";
print_r($device_details);
echo("<br /><br /><br />".$_SERVER['HTTP_USER_AGENT']."");
?>

<head>
<title>Exp_Bigbizz</title>

<style>
.telef-contentor01 {
	  max-width: 310px;
	  margin: left;
	  background-color: #fff;
	  height: 170px;
	  color: black;
	  border-radius: 10px;
	}
.telef-contentor02 {
	  font-family: Arial, Helvetica, sans-serif;
	  font-size: 40px;
	  max-width: 890px;
	  margin: left;
	  background-color: #eee;
	  height: 600px;
	  color: black;
	  border-radius: 10px;
	}
</style>

</head>

<body>

<div class="telef-contentor01">
		<img src="../imagens/bigbizz_logo.jpg" alt="Bigbizz" height="168" width="306">
</div>

<div class="telef-contentor02">
	<div style="padding-left:10px">
		<b>BIGBIZZ</b>, Exporta&ccedil;&atilde;o de Cer&acirc;micas Unipessoal, Lda</br>
		</br>
		Zona Ind. do Porto</br>
		Rua Manuel Pinto de Azevedo, 171</br>
		4100-321 PORTO</br>
		</br>
		<b>Tel.:</b> +351 226171615</br>
		<b>Tlmv:</b> 963426782</br>
		<b>e-mail:</b> loja@bigbizz.com.pt</br>
		<b>NIF:</b> 507141458</br>
		<b>IBAN:</b> PT50 0010 0000 3455 8340 0018 6</br>
		<h4>Ir para </br>
		 <a href="http://www.outletdehotelaria.com">http://www.outletdehotelaria.com</a></h4>
	</div>
</div>

</body>
</html>
