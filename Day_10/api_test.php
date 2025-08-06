<?php

header("Content-Type: application/json");
header("Access-Control-Allow-origin: *");
if( $_SERVER["REMOTE_ADDR"]=="127.0.0.1")
{
   $data= ["data"=>[["message"=>"wrong try to get Data"]],"connection"=>false,"message"=>"wrong ip"];
   echo json_encode($data);
}



else{
    $d=[
        "data"=>[
                [
                    "name"=>"tito",
                    "age"=>30,
                    "city"=>"egypt"
                ],
                [
                     "name"=>"ali",
                     "age"=>20,
                     "city"=>"egypt"
                ]


                ],
    

    "connection"=>true,
    "message"=> "Data Retrieved Successfully"

];
echo json_encode($d); 
}