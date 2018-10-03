<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//冒泡排序 从小到大
//第一版
$a = array( 5, 8, 6, 3, 9, 2, 1, 7 );

function maopao_sort( $a ){
	$count = count( $a );
	for ( $i = 0; $i < $count; $i ++ ) {
		for ( $j = 0; $j < $count - $i - 1; $j ++ ) {
			if ( $a[ $j ] > $a[ $j + 1 ] ) {
				$tmp = $a[ $j ];
				$a[ $j ] = $a[ $j + 1 ];
				$a[ $j + 1 ] = $tmp;
			}
		}
	}
	var_dump( $a );
}

//优化第二版
$a = array( 5, 8, 6, 3, 9, 2, 1, 7 );//第六个循环之后，有序了，不需要排了

function maopao_sort2( $a ){
	$count = count( $a );
	for ( $i = 0; $i < $count; $i ++ ) {
		//有序标记，每一轮的初始是true
		$is_sorted = true;
		for ( $j = 0; $j < $count - $i - 1; $j ++ ) {
			if ( $a[ $j ] > $a[ $j + 1 ] ) {
				$tmp = $a[ $j ];
				$a[ $j ] = $a[ $j + 1 ];
				$a[ $j + 1 ] = $tmp;
				//有元素交换，所以不是有序，标记变为false
				$is_sorted = false;
			}
		}
		if ( $is_sorted ) {//会多跑一个小循环
			break;
		}
	}
	var_dump( $a );
}

//优化第三版
$a = array( 3, 4, 2, 1, 5, 6, 7, 8 ); //4之后不需要排序

function maopao_sort3( $a ){
	$count = count( $a );
	//记录最后一次的交互位置
	$lastExchangeIndex = 0;
	//无序数列的边界，每次比较只需要比到这里为止
	$sortBorder = $count - 1;
	for ( $i = 0; $i < $count; $i ++ ) {
		//有序标记，每一轮的初始是true
		$is_sorted = true;
		for ( $j = 0; $j < $sortBorder; $j ++ ) {
			if ( $a[ $j ] > $a[ $j + 1 ] ) {
				$tmp = $a[ $j ];
				$a[ $j ] = $a[ $j + 1 ];
				$a[ $j + 1 ] = $tmp;
				//有元素交换，所以不是有序，标记变为false
				$is_sorted = false;
				//把无序数列的边界更新为最后一次交换元素的位置
				$lastExchangeIndex = $j;
			}
		}
		$sortBorder = $lastExchangeIndex;
		if ( $is_sorted ) {//会多跑一个小循环
			break;
		}
	}
	var_dump( $a );
}

//鸡尾酒排序 从小到大排序  先从左到右排序，再从右到左排序  [在特定的条件下，减少排序的回合数]
$a = array( 2, 3, 4, 5, 6, 7, 8, 1 );

function jiweijiu_sort( $a ){
	$tmp = 0;
	$count = count( $a );
	for ( $i = 0; $i < $count / 2 - 1; $i ++ ) {
		$is_sorted = true;
		//基数轮，从左向右比较和交换
		for ( $j = $i; $j < $count - 1; $j ++ ) {
			if ( $a[ $j ] > $a[ $j + 1 ] ) {
				$tmp = $a[ $j ];
				$a[ $j ] = $a[ $j + 1 ];
				$a[ $j + 1 ] = $tmp;
				//有元素交换，所以不是有序，标记变为false
				$is_sorted = false;
			}
		}
		var_dump( "-------" );
		var_dump( $a );
		if ( $is_sorted ) {//会多跑一个小循环
			break;
		}
		$is_sorted = true;
		//偶数轮，从右向左比较和交换
		for ( $j = $count - $i - 1; $j > $i; $j -- ) {
			if ( $a[ $j ] < $a[ $j - 1 ] ) {
				$tmp = $a[ $j ];
				$a[ $j ] = $a[ $j - 1 ];
				$a[ $j - 1 ] = $tmp;
				//有元素交换，所以不是有序，标记变为false
				$is_sorted = false;
			}
		}
		if ( $is_sorted ) {//会多跑一个小循环
			break;
		}
		var_dump( "===========" );
		var_dump( $a );
	}
}

function jiweijiu_sort2( $a ){
	$tmp = 0;
	$count = count( $a );
	$lastLeftRxchangeIndex = 0;
	$lastRightRxchangeIndex = 0;
	$rightSortBorder = $count - 1;
	$leftSortBorder = 0;

	for ( $i = 0; $i < $count / 2 - 1; $i ++ ) {
		var_dump( "----new---" . $i );
		$is_sorted = true;
		//基数轮，从左向右比较和交换
		for ( $j = $leftSortBorder; $j < $rightSortBorder; $j ++ ) {
			if ( $a[ $j ] > $a[ $j + 1 ] ) {
				$tmp = $a[ $j ];
				$a[ $j ] = $a[ $j + 1 ];
				$a[ $j + 1 ] = $tmp;
				//有元素交换，所以不是有序，标记变为false
				$is_sorted = false;
				$lastRightRxchangeIndex = $j;
			}
		}
		var_dump( "-------" );
		var_dump( $a );
		$rightSortBorder = $lastRightRxchangeIndex;
		if ( $is_sorted ) {//会多跑一个小循环
			break;
		}
		$is_sorted = true;
		//偶数轮，从右向左比较和交换
		for ( $j = $rightSortBorder; $j > $leftSortBorder; $j -- ) {
			if ( $a[ $j ] < $a[ $j - 1 ] ) {
				$tmp = $a[ $j ];
				$a[ $j ] = $a[ $j - 1 ];
				$a[ $j - 1 ] = $tmp;
				//有元素交换，所以不是有序，标记变为false
				$is_sorted = false;
				$lastLeftRxchangeIndex = $j;
			}
		}
		$leftSortBorder = $lastLeftRxchangeIndex;
		if ( $is_sorted ) {//会多跑一个小循环
			break;
		}
		var_dump( "===========" );
		var_dump( $a );
	}
}
