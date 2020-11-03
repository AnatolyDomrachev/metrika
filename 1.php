<?php
$token = 'AgAAAAAAlcJjAAavy5faKD-QCE9Lph7-zjk97P4';
 
$params = array(
	'ids'     => '4105282', 
	'metrics' => 'ym:s:visits,ym:s:pageviews,ym:s:users,ym:s:bounceRate,ym:s:pageDepth,ym:s:avgVisitDurationSeconds',
	'date1'   => 'today', // 7daysAgo - неделя, 30daysAgo - месяц, 365daysAgo - год
	'date2'   => 'today',
);
 
$ch = curl_init('https://api-metrika.yandex.net/stat/v1/data/bytime?' . urldecode(http_build_query($params)));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: OAuth ' . $token));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
$res = curl_exec($ch);
curl_close($ch);
$res = json_decode($res, true);	
print_r($res);

// // Визиты	
 echo $res['totals'][0][0];
//  
//  // Просмотры	
  echo $res['totals'][0][1];
//   
//   // Посетители	
echo $res['totals'][0][2];
//
//   // Отказы, %
echo $res['totals'][0][3];
//    
//    // Глубина просмотра	
echo $res['totals'][0][4];
//     
//     // Время на сайте, сек.
echo $res['totals'][0][5];

?>
