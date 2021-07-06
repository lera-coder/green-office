<?php


namespace App\ControllerHelpers;

use App\Models\Status;

class ClientControllerHelper
{

    public function getStatuses(){

        $statuses = Status::all();
        $result_statuses = array();

        foreach ($statuses as $status){
            $result_statuses[$status->id] = $status->name;
        }


        return $result_statuses;
    }
}
