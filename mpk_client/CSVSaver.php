<?php

include_once 'iSaver.php';

class CSVSaver implements iSaver {

    private $participants;
    
    function __construct() {
    }
    
    public function SetParticipants($participants) {
        $this->participants = $participants;
    }
    
    public function Save() {
        $SKfile = fopen("sports_kinds.csv", "w");
        foreach ($this->arr["sports_kinds"] as $key => $value){
            fwrite($SKfile, $value["id"].";\"".$value["name"]."\"\n");
        }
        fclose($SKfile);
        
        $Tfile = fopen("teams.csv", "w");
        foreach ($this->arr["teams"] as $key => $value){
            fwrite($Tfile, $value["id"].";\"".$value["name"]."\",".$value["sports_kind_id"]."\n");
        }
        fclose($Tfile);
        
        $Pfile = fopen("participants.csv", "w");
        foreach ($this->arr["participants"] as $key => $value){
            fwrite($Pfile, $value["id"].";\"".$value["name"]."\"\n");
        }
        fclose($Pfile);
        
        $PTfile = fopen("participants to teams.csv", "w");
        foreach ($this->arr["participants"] as $key => $value)
        foreach ($value["teams"] as $team_value) {
            fwrite($PTfile, $value["id"].";".$team_value."\n");
        }
        fclose($PTfile);
    }
}