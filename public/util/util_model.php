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

		$this->$rbp::setup( 'mysql:host=localhost;dbname=my_red_bean_php_database', 'app_user', 'app_pw' );
		$this->$rbp::useFeatureSet( 'novice/latest' );
		//R::freeze( TRUE );
		//$this->rbp::freeze( TRUE ); // makes the DB not Fixed. Nothing will change in DB Structure
	}

	public function saveTest(){
		$post = $this->$rbp::dispense( 'post' );
    $post->title = 'My holiday - Nice - saveTest';
    $id = $this->$rbp::store( $post );
	}

	public function createUser(){

		$meeting = $this->$rbp::dispense( 'meetings' );

		$user = $this->$rbp::dispense( 'users' );
		$user->user_name = 'TestUser';
		$user->roleType = '5'; // 1=SU, 2=Admin, 3=SubAdmin1, 4=SubAdmin2, 5=User
		$user->login_name = 'LoginName';
		$user->password = 'Password';
		// Relations
		$user->ownMeetingList[] = $meeting; // adds 'users_id' ForeignKey to 'meetings' table
		// Save in DB
		$id = $this->$rbp::store( $user );
		return $id;
	}

	public function createMeeting(){
		$meeting = $this->$rbp::dispense( 'meetings' );
		$meeting->meeting_name = 'First Meet 2020';
		$meeting->type = 'Old Friends Meet';
		$meeting->onDate = '2020-01-10';
		$meeting->onLocation = 'The New Hotel';
		$id = $this->$rbp::store( $meeting );
		return $id;
	}

}

?>