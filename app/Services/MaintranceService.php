<?php

namespace App\Services;

class MaintranceService{
    public function getStatusName($statusId){
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
            if ($key == $statusId){
                return $value;
            }
        }
    }

    public function convertTimeToNumber(){
        $actualDate = strtotime(date('Y-m-d'));
        $actualDateTime = strtotime((date('Y-m-d H:i:s')));
        $actualTime = $actualDateTime - $actualDate;
        $actualTimeInHours = $actualTime / 60 / 60;

        return $actualTimeInHours;
    }

    public function getActualStatus(){
        $startWork = 8; //08:00
        $endWork = 16; //16:00
        $endWorkFriday = 14.5; //14:30
        $isFriday = (date('N') == 5) ? true : false;
        $actualStatus = 0;
        $actualTime = convertTimeToNumber();

        if ($actualTime > $startWork && $actualTime < $endWork && !$isFriday){
            $actualStatus = 1; //Délelötti ügyeletes
        }
        elseif ($actualTime > $startWork && $actualTime < $endWorkFriday && $isFriday){
            $actualStatus = 1; //Délelötti ügyeletes
        }
        elseif ($actualTime > $endWork || $actualTime < $startWork){
            $actualStatus = 2; //Délutáni ügyeletes
        }

        return  $actualStatus;
    }


    public function getCurrentMaintrencers($services){
        $currentMaintrencers = [];
        $actualDate = date('Y-m-d');
        $actualStatus = getActualStatus();

        foreach ($services as $service){
            $serviceEnd = date('Y-m-d',strtotime($service->end));
            if ($serviceEnd == $actualDate && $service->status == $actualStatus){
                $currentMaintrencers[] = $service;
            }elseif ($serviceEnd == $actualDate && $service->status == 3){
                $currentMaintrencers[] = $service;
            }

        }

        return $currentMaintrencers;
    }

}
