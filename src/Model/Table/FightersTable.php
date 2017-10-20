<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

class FightersTable extends Table
{
    /*
    public function getBestFighter()
    {
        $bestFighter = $this->find('all', [
                'order' => ['Fighters.level' =>'DESC']
            ])->first();
        return $bestFighter;
    }
    
    function findHero()
    {
        $fighters = TableRegistry::get('fighters');
        $y = $fighters->find("all")->where(['id' => '1']);
        $z = $y->all();
        $x = $z->toArray();
        return $x;
    }
    */
    public function saveFighter($name, $player_id)
    {
        $fightersTable = TableRegistry::get('fighters');
        $fighter = $fightersTable->newEntity();
        
        //Réinitialiser le combattant
        $fighter->name = $name;
        $fighter->player_id = $player_id;
        $fighter->skill_sight = 2;
        $fighter->skill_strength = 1;
        $fighter->skill_health = 5;
        $fighter->current_health = $fighter['skill_health'];
        $fighter->xp = 0;
        $fighter->level = 1;
        
        list ($lig, $col) = $this->getMaxSize();
        
		
        $fighter->coordinate_x = rand(1,$col);
        $fighter->coordinate_y = rand(1,$lig);
        
        return $fightersTable->save($fighter);
    }
    
    public function changePlayerPosition($id, $positionX,$positionY)
	{
		$fightersTable = TableRegistry::get('fighters');
		$fighters = $fightersTable->get($id);
        
		$fighters->coordinate_x = $positionX;
		$fighters->coordinate_y = $positionY;
		$fightersTable->save($fighters);
        
	}
    
    public function changeFighterLevel($id)
	{
		$fightersTable = TableRegistry::get('fighters');
		$fighters = $fightersTable->get($id);
		$fighters->level +=1;
		$fightersTable->save($fighters);
	}
    
    public function getFighterById($id)
	{
		$fightersTable = TableRegistry::get('fighters');
		$fighters = $fightersTable->find("all")->where(['player_id' => $id]);
		$fighter = $fighters->all();
		$x = $fighter->toArray();
		return $x;
	}
    
    public function getPositionFighters($id)
    {
        $fighters = TableRegistry::get('fighters');
        $query_x = $fighters->find("all")->select(['coordinate_x'])->where(['id !=' => $id]);
        $query_y = $fighters->find("all")->select(['coordinate_y'])->where(['id !=' => $id]);
        $result_y = $query_y->all()->toArray();
        $result_x = $query_x->all()->toArray();
        return array($result_x,$result_y);
    }
    
    public function getMaxSize()
    {
        $lig = 10;
        $col = 15;
        return array($lig,$col);
    }
}