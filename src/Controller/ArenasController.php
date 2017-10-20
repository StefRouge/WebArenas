<?php
namespace App\Controller;
use App\Controller\AppController;
use App\Model\Table\FightersTable;
use App\Model\Table\EventsTable;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
/**
* Personal Controller
* User personal interface
*
*/
class ArenasController  extends AppController
{
    public function index()
    {
    }
    
    public function fighter()
    {
		$id ='545f827c-576c-4dc5-ab6d-27c33186dc3e';
        $this->loadModel('Fighters');
		$dir = new Folder(WWW_ROOT . 'img');
		$img = $dir->find($id.'.jpg', true);		
		$path = $dir->path;
		
				
		try
		{
			$result = $this->Fighters->getFighterById($id);
		}
        catch(RecordNotFoundException $e)
		{
			$result = [];
		}
        
		if(!$result)
		{
			return $this->redirect(['action' => 'add']);
		}
		else
		{
			//En cas de mort ajouter un nouveau combattant
			if($result[0]->current_health == 0)
				return $this->redirect(['action' => 'add',$result[0]->id]);

			$this->set('fighter',$result);
			$this->set('img',$img[0]);  
		}
     
    }
    
    public function sight()
    {
		$id = 1;
        $this->loadModel('Fighters');
        $result = $this->Fighters->get($id);
        
        //Récupérer les coordonnées des autres fighters
        list ($pos_x, $pos_y) = $this->Fighters->getPositionFighters();//$id);
        $this->set('pos_x',$pos_x);
        $this->set('pos_y',$pos_y);
        //Récupérer la taille de la grille
        list ($lig, $col) = $this->Fighters->getMaxSize();
        
        $this->set('fighter',$result);
        $this->set('lig',$lig);
        $this->set('col',$col);
    }
    
    public function login()
    {
    }
    
    public function diary()
    {
        $this->loadModel('Events');
        $this->set('diary',$this->Events->getEvent());
    }
    
    public function edit($id = null)
    {
        $this->loadModel('Fighters');
        $fighter = $this->Fighters->get($id);
        $this->set('fighter', $fighter);
        
        // Vérification de la méthode (POST ou PUT)
        if ($this->request->is(['post', 'put'])) {
            
            //Récupération des données
            $result = $this->request->getData();
            
            //On ne peut augmenter qu'une compétance
            if($result['skill_sight'] + $result['skill_strength'] + $result['skill_health'] == 1)
            {
                //Ajout de la compétance au combattant
                $fighter['skill_sight'] += $result['skill_sight'];
                $fighter['skill_strength'] += $result['skill_strength'];
                $fighter['skill_health'] += 3*$result['skill_health'];
                
                //Redonner de la vie si la vie augmente
                if($result['skill_health'] == 1)
                {
                    $fighter['current_health'] = $fighter['skill_health'];
                }
                
                //Sauvegarder les changements en base de données
                if ($this->Fighters->save($fighter)) {
                    
                    $this->Flash->success(__('Votre combattant a été mis à jour.'));
                    
                    //Redirection vers la page d'info du combattant
                    return $this->redirect(['action' => 'fighter']);
                }
                $this->Flash->error(__('Impossible de mettre à jour votre combattant.'));
            }
            $this->Flash->error(__('Veuillez selectionner un seul champ'));
            
        }
    }
    
    public function add($id = null)
    {
		$id ='545f827c-576c-4dc5-ab6d-27c33186dc3e';
        $this->loadModel('Fighters');
        
        //$fighter = $this->Fighters->get($id);
        //$this->set('fighter', $fighter);
        
        // Vérification de la méthode (POST ou PUT)
        if ($this->request->is(['post', 'put'])) 
        {
            //Récupération des données
            $result = $this->request->getData();
			
   
            //Sauvegarder les changements en base de données
            if ($this->Fighters->saveFighter($result['name'],$id))
            { 
                $this->Flash->success(__('Votre combattant a été mis à jour.'));
                
                //Redirection vers la page d'info du combattant
                return $this->redirect(['action' => 'fighter']);
            }
            $this->Flash->error(__('Impossible de mettre à jour votre combattant.'));
        }
    }
    
    public function setFighterLevel($id)
    {
        $this->loadModel('Fighters');
        
        //Ajout du niveau
        $this->Fighters->changeFighterLevel($id);
        
        //Redirection vers la page d'ajout de compétances
        $this->redirect(['action' => 'edit',$id]);
        
    }
	
    public function changeLogo($num)
    {
		//Récupérer l'Id de l'utilisateur
		$id ='545f827c-576c-4dc5-ab6d-27c33186dc3e';
		
		//Copier le logo choisi et changer le nom
		$dir = new Folder(WWW_ROOT . 'img');
		$path = $dir->path;
		copy($path.'\\Logo'.$num.'.jpg',$path.'\\'. $id.'.jpg');
        
        return $this->redirect(['action' => 'fighter']);
    }
	public function isPositionAllowed($coord_x, $coord_y)
    {
        $id = 1;
        $this->loadModel('Fighters');
        $result = $this->Fighters->get($id);
        list ($pos_x, $pos_y) = $this->Fighters->getPositionFighters();//$id);
		$t=0;
        $l=0;

        $end=true;
        foreach($pos_y as $py)
        {
            foreach($pos_x as $px)
            { 
                if($l == $t)
                {
                    if($coord_x != $result->coordinate_x || $coord_y != $result->coordinate_y)
                    {
                         if($coord_x == $px->coordinate_x && $coord_y == $py->coordinate_y)
                        {
                             return false;
                        }
                    }
                   
                }
                $l += 1;
            }
            $l=0;
            $t += 1;
        }
        return true;
    }
    public function setPlayerPosition($id, $coord_x, $coord_y)
    {
        $this->loadModel('Fighters');
        
        //Vérifier que le combattant est dans la grille
        if($coord_x>=0 && $coord_x<15 && $coord_y>=0 && $coord_y<10 && $this->isPositionAllowed($coord_x, $coord_y))
        {
            //Changer la positoin du joueur
            $this->Fighters->changePlayerPosition($id,$coord_x,$coord_y);
            return $this->redirect(['action' => 'sight']);
        }
        $this->Flash->error(__('Impossible de déplacer votre combattant.'));
        return $this->redirect(['action' => 'sight']);
    }
    public function addEvent ($x,$y)
    {
        $this->loadModel('Events');
        $this->Events->saveEvent($x, $y, "Je suis un event");
        return $this->redirect(['action' => 'sight']);
    }
	public function deleteFighter ($id)
	{
		$this->loadModel('Fighters');
		$fighter = $this->Fighters->get($id);
		$result = $this->Fighters->delete($fighter);
		return $this->redirect(['action' => 'fighter']);
	}
}
