<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
class FightersTable extends Table
{
    function findHero()
    {
        $fighters = TableRegistry::get('fighters');
        $y = $fighters->find("all")->where(['name' => 'Aragorn']);
        $z = $y->all();
        $x = $z->toArray();
        return $x;
    }
    
    function bestFighters()
    {
        $fighters = TableRegistry::get('fighters');
        //$query = $fighters->find();
        
        //$max =  $query->select(['fighters__top' => $query->func()->max('fighters.level')]);
        //return $fighters->find("all")->where(['fighters.skill_sight ' => 2]);
        //return $fighters->find("all")->where(['fighters.level' => $max]);
        return $fighters->find("all")->select("fighters.name")->order(['fighters.level' => 'DESC'])->first();
    }
    
    public function changeFighterLevel($id)
	{
		$fightersTable = TableRegistry::get('fighters');
		$fighters = $fightersTable->get($id);
		$fighters->level +=1;
		$fightersTable->save($fighters);
        
	}
    
    public function changePlayerPosition($id, $positionX,$positionY)
	{
		$fightersTable = TableRegistry::get('fighters');
		$fighters = $fightersTable->get($id);
        
		$fighters->coordinate_x = $positionX;
		$fighters->coordinate_y = $positionY;
		$fightersTable->save($fighters);
        
	}
    /*
    public function changeFighterSight($id)
	{
		$fightersTable = TableRegistry::get('fighters');
		$fighters = $fightersTable->get($id);
		$fighters->level +=1;
		$fightersTable->save($fighters);
	}
    public function changeFighterHealt($id)
	{
		$fightersTable = TableRegistry::get('fighters');
		$fighters = $fightersTable->get($id);
		$fighters->level +=1;
		$fightersTable->save($fighters);
	}
    public function changeFighterStrenght($id)
	{
		$fightersTable = TableRegistry::get('fighters');
		$fighters = $fightersTable->get($id);
		$fighters->level +=1;
		$fightersTable->save($fighters);
	}*/
    public function getFighterById($id)
	{
		$fightersTable = TableRegistry::get('fighters');
		$fighter = $fightersTable->get($id);
		return $fighter;
	}
}
