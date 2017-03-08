<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Alyokhin
 * Date: 08.03.2017
 * Time: 22:19
 */
header('Content-type: text/html; charset=utf-8');

include_once "phpquery/phpQuery/phpQuery.php";
function printArr($arr){
	echo "<pre>".print_r($arr, true)."</pre>";
}
$url = "https://ru.aliexpress.com/premium/category/202001934.html";
$file = file_get_contents($url);

$doc = phpQuery::newDocument($file);
?>
 <html>
 <head>
 	<title>Test parse Ali Express</title>
 </head>
 <body>
 	<?php 
foreach ($doc->find('.son-list li') as $items) {
    $items = pq($items);
    $price = $items->find('.price .value')->text();
	printArr($price);
}
 	?>
 </body>
 </html>

