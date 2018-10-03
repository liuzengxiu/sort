<?php

/**
 * 上浮调整 插入节点 【重要重要这个功能是插入节点】
 * @param array     待调整的堆
 */
function upAdjust( $arr ){
	var_dump($arr);
	//$left = 2 * $pos + 1;
	//$right = 2 * $pos + 2;
	$childIndex = count( $arr ) - 1;  //10-1=9
	$parentIndex = ($childIndex - 1) / 2; //(9-1)/2=4
	// temp保存插入的叶子节点值，用于最后的赋值
	$temp = $arr[ $childIndex ];  //0
	while ( $childIndex > 0 && $temp < $arr[ $parentIndex ] ) {
		//无需真正交换，单向赋值即可
		$arr[ $childIndex ] = $arr[ $parentIndex ];
		$childIndex = $parentIndex;
		$parentIndex = ($parentIndex - 1) / 2;
	}
	$arr[ $childIndex ] = $temp;
	var_dump($arr);
	/*
	 * 第一轮 while(9>0 && 0<5)
	 * 	$arr[9] = $arr[4]
	 * 	9 = 4  //数组索引交换，子索引的值变为父索引的值
	 * 	4=1	//数组索引交换，父索引的值变为上一级父索引的值
	 *
	 * 第二轮 while(4>0 && 0<3)
	 * 	$arr[4] = $arr[1]
	 * 	4 = 1  //数组索引交换，子索引变量的值变为父索引变量的值
	 * 	1=0	//数组索引交换，父索引变量的值变为上一级父索引变量的值
	 *
	 *  第三轮 while(1>0 && 0<1)
	 * 	$arr[1] = $arr[0]
	 * 	1 = 0  //数组索引交换，子索引变量的值变为父索引变量的值
	 * 	0=0	//数组索引交换，父索引变量的值变为上一级父索引变量的值
	 * 结束
	 */

}

/**
 * 下沉调整
 * @param array     待调整的堆
 * @param parentIndex    要下沉的父节点
 * @param parentIndex    堆的有效大小
 */
function downAdjust(){

}

/**
 * 构建堆
 * @param array     待调整的堆
 */
function buildHeap(){

}

$arr = array( 1, 3, 2, 6, 5, 7, 8, 9, 10, 0 );
upAdjust( $arr ); //为啥可以 ？？？？？？？？？？？？？？？？？？？？？？？
