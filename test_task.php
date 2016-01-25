<?php

require_once("function_task.php");

class TestTasks extends PHPUnit_Framework_TestCase{
	
	public function testAddTask(){
		newtask("Test","23-01-2016","This is a test");
		
		$fic = fopen("db_task.txt", "r");
		$line = fgets($fic);
		fclose($fic);
		$arr = json_decode($line,true);
		
		$this->assertArrayHasKey('Test', $arr[0]);
		
	}
	public function testDeleteTask(){
		
		deletetask('Test');
		
		$fic = fopen("db_task.txt", "r");
		$line = fgets($fic);
		fclose($fic);
		$arr = json_decode($line,true);
		
		$this->assertNotArrayHasKey('Test', $arr[0]);
	}
}
?>
