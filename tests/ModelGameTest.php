<?php
require_once("Models/ModelGame.php");
require dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

use PHPUnit\Framework\TestCase;
class ModelGameTest extends TestCase
{
    public function test_is_exist()
    {
       $model=new ModelGame();
       $this->assertEquals(
        true,
        $model->is_exist("hakim"),
        "it should return true if hakim does exist in the DB !"
       );
       
    }

    public function test_getPlayer()
    {
       $model=new ModelGame();
       $this->assertEquals(
        2,
        $model->getPlayer("hakim"),
        "it should return 2 if the name was hakim"
       );
       
    }

    public function test_createPlayer()
    {
       $model=new ModelGame();
       $this->assertEquals(
        true,
        $model->createPlayer("test"),
        "it should return true if the insert is ok !"
       );
       
    }
   
    public function test_updateScore()
    {
       $model=new ModelGame();
       $this->assertEquals(
        true,
        $model->updateScore(2),
        "it should return the true if the Update  is ok !"
       );

    }

    

}
