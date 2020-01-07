<?php

namespace App\Util;

/**
 * 
 */
class UtilModel
{
	private $rbp = '';
	public $var = 'a default value';

	function __construct($redBeanPHP)
	{
		$this->$rbp = $redBeanPHP; 
		$this->init();
	}
	private function init(){
		/*
		R::setup( 'mysql:host=localhost;dbname=my_red_bean_php_database', 'app_user', 'app_pw' );
		R::useFeatureSet( 'novice/latest' );
		//
		$post = R::dispense( 'post' );
    $post->title = 'My holiday';
    $id = R::store( $post );
    */

		$this->$rbp::setup( 'mysql:host=localhost;dbname=my_red_bean_php_database', 'app_user', 'app_pw' );
		$this->$rbp::useFeatureSet( 'novice/latest' );
		//R::freeze( TRUE );
		//$this->rbp::freeze( TRUE ); // makes the DB not Fixed. Nothing will change in DB Structure

		/*
		$post = $this->$rbp::dispense( 'post' );
    $post->title = 'My holiday - Nice';
    $id = $this->$rbp::store( $post );
    */
	}

	public function saveTest(){
		$post = $this->$rbp::dispense( 'post' );
    $post->title = 'My holiday - Nice - saveTest';
    $id = $this->$rbp::store( $post );
	}
}

?>