<?php
abstract class DbObject{
    protected $coloums;
    protected $table;
    protected $properties;  
    
    
    /**
     * saves values in db
     * if no params set -> save/insert object properties<br>
     * if params set -> save/insert $cols in $tabel
     * 
     * @param array $cols || $cols[0] = primary key !!!
     * @param array $values
     * @param string $table 
     */
    public function save($cols = NULL, $values = NULL, $table = NULL){
        $db = DbConnector::getInstance()->connect();
        if($cols == NULL){           
             $saveSql = "REPLACE INTO `".$this->table."` (";
                $coloumsLength = count($this->coloums);
                for($i = 0; $i < $coloumsLength; $i++){
                    if($i == 0){
                        $saveSql .= "`".$this->coloums[$i]."`";
                    }else{
                        $saveSql .= ",`".$this->coloums[$i]."`";
                    }
                }      
                $saveSql .= ") VALUES (";
                foreach($this->properties as $key=>$value){            
                    if($key == "id"){
                        $saveSql .= "'".$value."'";
                    }else{                
                        $saveSql .= ",'".$value."'";
                    } 
                }
                $saveSql .= ");";    
          }else{              
               $saveSql = "REPLACE INTO `".$table."` (";
                $coloumsLength = count($coloums);
                for($i = 0; $i < $coloumsLength; $i++){
                    if($i == 0){
                        $saveSql .= "`".$coloums[$i]."`";
                    }else{
                        $saveSql .= ",`".$coloums[$i]."`";
                    }
                }      
                $saveSql .= ") VALUES (";
                $valuesLength = count($values);
                for($j = 0; $j < $valuesLength; $j++){
                    if($j == 0){
                        $saveSql .= "`".$values[$j]."`";
                    }else{
                        $saveSql .= ",`".$values[$j]."`";
                    }
                }
                $saveSql .= ");";              
          }
          #$saveSql."<br />";
          #$saveSql;
          $db->query($saveSql);
        
       
    }
    
    /**
     * select from db
     * 
     * @param string $sql
     * @return object  
     */
    
    protected function select($sql){
        $db = DbConnector::getInstance()->connect();
        $result = $db->query($sql);
        return $result;
    }


    /**
     * load the object
     * @return mysqlObject Objectdata
     */   
    protected function load($id){
        $db = DbConnector::getInstance()->connect();
        $loadSql = 'SELECT * FROM `'.$this->table.'` WHERE `'.$this->coloums[0].'`="'.$id.'"';
        $objectData = $db->query($loadSql);
        return $objectData;
    }
    
    /**
     * delete values in db
     * 
     * @param string $id 
     */    
    protected function delete($id){
        $db = DbConnector::getInstance()->connect();
        $deleteSql = "DELETE FROM `".$this->table."` WHERE `".$this->coloums[0]."` = ".$id;
        $db->query($deleteSql);
    }

}

?>