<?php
dump('fdsafdsa');
// 一、
$qid = [1,2,3];
$sort = [10,20,30];

//转化为以下格式
$arr = [1=>10, 2=>20, 3=>30];

//答案
$arr = [];
foreach($qid as $k=>$v){
	$arr[$v] = $sort[$k];
}
//------------------------------------------------
//转化为以下格式
$arr = [
		['qid' => 1, 'sort' =>10 ],
		['qid' => 2, 'sort' =>20 ],
		['qid' => 3, 'sort' =>30 ],
	];
//答案
$arr = [];
foreach ($qid as $k=>$v){
	// $k 0  1 2
	// $v 1 2 3
	$arr[] = ['qid' => $v, 'sort' => $sort[$k]];
}
//------------------------------------------------

// 二、
//将$arr中数据 按照uid进行分组  转化为$res
$arr = [
		['id' => 1, 'uid' =>5 ],
		['id' => 2, 'uid' =>5 ],
		['id' => 3, 'uid' =>7 ],
		['id' => 4, 'uid' =>7 ],
		['id' => 5, 'uid' =>9 ],
		['id' => 6, 'uid' =>9 ],
	];

$res = [
	'5' => [
		['id' => 1, 'uid' =>5 ],
		['id' => 2, 'uid' =>5 ],
	],
	'7' => [
		['id' => 3, 'uid' =>7 ],
		['id' => 4, 'uid' =>7 ],
	],
	'9' => [
		['id' => 5, 'uid' =>9 ],
		['id' => 6, 'uid' =>9 ],
	],
];
//答案
$res = [];
foreach($arr as $k=>$v){
	$res[$v['uid']][] = $v;
}
//----------------------------------------------------
// 三、
//将$order $user中数据 转化为$res ; order中的uid 对应user中的id
$order = [
		['id' => 1, 'uid' =>5 ],
		['id' => 2, 'uid' =>5 ],
		['id' => 3, 'uid' =>7 ],
		['id' => 4, 'uid' =>7 ],
		['id' => 5, 'uid' =>9 ],
		['id' => 6, 'uid' =>9 ],
	];

$user = [
	['id' => 5, 'name' =>'a' ],
	['id' => 7, 'name' =>'b' ],
	['id' => 9, 'name' =>'c' ],
];

$res = [
		['id' => 1, 'uid' =>5 , 'name' =>'a'],
		['id' => 2, 'uid' =>5 , 'name' =>'a'],
		['id' => 3, 'uid' =>7 , 'name' =>'b'],
		['id' => 4, 'uid' =>7 , 'name' =>'b'],
		['id' => 5, 'uid' =>9 , 'name' =>'c'],
		['id' => 6, 'uid' =>9 , 'name' =>'c'],
	];

//答案
//方法一   
$new_user = [];
foreach($user as $value){
	$new_user[$value['id']]  = $value
}
//转化后new_user结构
// $new_user = [
// 	5 => ['id' => 5, 'name' =>'a' ],
// 	7 => ['id' => 7, 'name' =>'b' ],
// 	9 => ['id' => 9, 'name' =>'c' ],
// ];
$res = [];
foreach($order as $k=>$v){
	// $v['uid']
	$v['name'] = $new_user[$v['uid']]['name'];
	$res[] = $v;
}

//方法二

$res = [];
foreach($order as $k=>$v){
	// $v['name'] = 
	//$v['uid']  //5
	foreach($user as $value){
		if($value['id'] == $v['uid']){
			$v['name'] = $value['name'];
			
		}
	}
	$res[] = $v;
}
// ---------------------------------------------------------
// 四、
//将$order $goods 转化为$res ; goods中的oid 对应order中的id
$order = [
		['id' => 1, 'uid' =>5 ],
		['id' => 2, 'uid' =>5 ],
		['id' => 3, 'uid' =>7 ],
		['id' => 4, 'uid' =>7 ],
		['id' => 5, 'uid' =>9 ],
		['id' => 6, 'uid' =>9 ],
	];

$goods = [
		['id' => 1, 'oid' =>1 , 'name' =>'a'],
		['id' => 2, 'oid' =>1 , 'name' =>'b' ],
		['id' => 3, 'oid' =>2 , 'name' =>'c'],
		['id' => 4, 'oid' =>2 , 'name' =>'d'],
		['id' => 5, 'oid' =>3 , 'name' =>'e'],
		['id' => 6, 'oid' =>3 , 'name' =>'f'],
	];

$res = [
	['id' => 1, 'uid' =>5 , 'goods' => [
		['id' => 1, 'oid' =>1 , 'name' =>'a'],
		['id' => 2, 'oid' =>1 , 'name' =>'b' ],
	]],
	['id' => 2, 'uid' =>5 , 'goods' => [
		['id' => 3, 'oid' =>2 , 'name' =>'c'],
		['id' => 4, 'oid' =>2 , 'name' =>'d' ],
	]],
	['id' => 3, 'uid' =>7 , 'goods' => [
		['id' => 5, 'oid' =>3 , 'name' =>'e'],
		['id' => 6, 'oid' =>3 , 'name' =>'f' ],
	]],
	['id' => 4, 'uid' =>7 , 'goods' => []],
	['id' => 5, 'uid' =>9 , 'goods' => []],
	['id' => 6, 'uid' =>9 , 'goods' => []],
];
?>