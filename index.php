<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Alyokhin
 * Date: 08.03.2017
 * Time: 22:19
 */
header('Content-type: text/html; charset=utf-8');
include_once "boostrap.php";
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

    $url = $items->find('.info .product')->attr('href');
    $name = $items->find('.info .product')->text();

    $price = $items->find('.price .value')->text();
    $book = R::dispense( 'product' );
    $book->name = $name;
    $book->url = $url;
    $book->published = date("Y-m-d H:i:s");
    R::store( $book );

//    $product->name = $name;



   // getPriceHistory::printArr($name);
}

 	?>
 </body>
 </html>

