<?php
namespace App\Controller;
use App\Controller\AppController;
/**
* Personal Controller
* User personal interface
*
*/
class ArenasController  extends AppController
{
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');
    
    public function index()
    {
        //MAIN DE INDEX
        
        $this->loadModel('Fighters');
        //$figterlist=$this->Fighters->find('all');
        //pr($figterlist->toArray());
        
        $result = $this->Fighters->bestFighters();
        $this->set('x',$result);
        
        //END OF MAIN
    }
    public function diary()
    {

    }
    public function login()
    {

    }
    public function fighter()
    {
        $this->loadModel('Fighters');
        $result = $this->Fighters->findHero();
        $this->set('hero',$result);
        
    }
    public function sight()
    {
        $this->loadModel('Fighters');
        $result = $this->Fighters->findHero();
        $this->set('hero',$result);
        
        $this->set('vision',$result[0]['skill_sight']);
        $this->set('pos_x',$result[0]['coordinate_x']);
        $this->set('pos_y',$result[0]['coordinate_y']);
        $this->set('id',$result[0]['id']);
        /*
        if($result[0]['coordinate_x']>=0 && $result[0]['coordinate_x']<30 && $result[0]['coordinate_y']>=0 && $result[0]['coordinate_y']<30)
        {
            if($this->Fighters->changePlayerPosition($result[0]['id'],$result[0]['coordinate_x']-1,$result[0]['coordinate_y']));
        }*/
        
        
    }
    public function setPlayerPosition()
    {
        $this->loadModel('Fighters');
        $result = $this->Fighters->findHero();
        if($result[0]['coordinate_x']>=0 && $result[0]['coordinate_x']<30 && $result[0]['coordinate_y']>=0 && $result[0]['coordinate_y']<30)
        {
            changePlayerPosition($result[0]['id'],$result[0]['coordinate_x']-1,$result[0]['coordinate_y']);
        }
    }
    public function edit($id = null)
    {
        $this->loadModel('Fighters');
        $fighter = $this->Fighters->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->Fighters->patchEntity($fighter, $this->request->getData());
            if ($this->Fighters->save($fighter)) {
                $this->Flash->success(__('Votre combattant a été mis à jour.'));
                return $this->redirect(['action' => 'fighter']);
            }
            $this->Flash->error(__('Impossible de mettre à jour votre combattant.'));
        }

        $this->set('fighter', $fighter);
    }
}
