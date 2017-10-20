<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;


class EventsTable extends Table
{
    public function saveEvent($x, $y, $description)
    {
        $eventTable = TableRegistry::get('Events');
        $time = Time::now();
        $event = $eventTable->newEntity();
        
        $event->date = $time;
        $event->name = $description;
        $event->coordinate_x = $x;
        $event->coordinate_y = $y;
        
        $eventTable->save($event);
    }
    public function getEvent()
    {
        $eventTable = TableRegistry::get('Events');
        $now = Time::now();
        $query = $eventTable->find('all',[
            'conditions' => array('DATE(date)' => date('Y-m-d'))
        ]);
        return $query->all();
    }
}