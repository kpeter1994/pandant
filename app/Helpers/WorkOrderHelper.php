<?php
namespace App\Helpers;

class WorkOrderHelper{
    private $name;
    private $start;
    private $end;
    private $status;

    /**
     * @param $name
     * @param $start
     * @param $end
     * @param $status
     */
    public function __construct($name, $start, $end, $status)
    {
        $this->name = $name;
        $this->start = $start;
        $this->end = $end;
        $this->status = $status;
    }

    public function getStatus(){
        $statusTable = [
            1 => 'Délelötti ügyeletes',
            2 => 'Délutáni ügyeletes',
            3 => 'Egésznapos ügyeletes',
            4 => 'Mozgólépcső ügyeletes',
            5 => 'Szabadság',
            6 => 'Külön munka',
            7 => 'Nem elérhető'
        ];

        foreach ($statusTable as $key => $value){
            if ($key == $this->status){
                return $value;
            }
        }
    }


}
