<?php
class DbConnector{
    static private $instance = null;
    private $host,$user,$pass,$dbname;

    private function local(){
        $this->host = 'localhost';
        $this->user = 'root';
        $this->pass = '';
        $this->dbname = 'dashboard';
    }

    private function chrisjamholHostedMe()
    {
        $this->host = 'localhost';
        $this->user = 'chrisjam_chris';
        $this->pass = '{avq8ge)4Uh_';
        $this->dbname = 'dashboard';
    }

    public function connect(){
        $this->local();
        #$this->chrisjamholHostedMe();
        try{
            $db = mysql_connect($this->host,$this->user,$this->pass);
            mysql_select_db($this->dbname);
        }catch (Exeption $e){
                echo 'Fehler: '.htmlspecialchars($e->getMessage());
        }
        return $db;
    }


    static public function getInstance(){
        if( DbConnector::$instance === null){
            DbConnector::$instance = new DbConnector();
        }
        return DbConnector::$instance;
    }

}
?>
