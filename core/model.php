<?php
class Model {
    
    public $table;
    public $id;

    private $dsn = 'mysql:dbname=stageons;host=127.0.0.1;port=3306;charset=utf8';
    private $user = 'root';
    private $password = '';
    private $pdo;

    function __construct() {
        try {
            $this->pdo = new PDO($this->dsn, $this->user, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]);
        } catch(Exception $e) {
            trigger_error("Cannot connect to DB! ".$e->getMessage());
            die;
        }
    }

    public function read($fields=null) {
        if($fields == null) {
            $fields = "*";
        }
        $sql = "SELECT $fields FROM ".$this->table." WHERE id=".$this->id;
        $req = $this->pdo->query($sql);
        $data = $req->fetch();
        foreach($data as $k=>$v) {
            $this->$k = $v;
        }
    }

    public function save($data) {
        if(isset($data["where not exists"])) {
            /*$sql = "INSERT INTO $this->table (";
            unset($data["where not exists"]);
            foreach($data as $k=>$v) {
                $sql .= "$this->table.$k,";
            }
            $sql = substr($sql, 0, -1);
            $sql .=") SELECT * FROM ( SELECT ";
            foreach($data as $k=>$v) {
                $sql .= "'$v' AS $k,";
            }
            $sql = substr($sql, 0, -1);
            $sql .=" FROM DUAL) AS temp WHERE NOT EXISTS ( SELECT ";
            foreach($data as $k=>$v) {
                $sql .= "$this->table.$k,";
            }
            $sql = substr($sql, 0, -1);
            $sql .=" FROM $this->table WHERE ";
            foreach($data as $k=>$v) {
                $sql .= "$this->table.$k = temp.$k AND";
            }
            $sql = substr($sql, 0, -4);
            $sql .=")";*/
        } else if(isset($data["id"]) && !empty($data["id"])) {
            $sql = "UPDATE ".$this->table." SET ";
            foreach($data as $k=>$v) {
                if($k != "id") {
                    $sql .= "$k='$v',";
                }
            }
            $sql = substr($sql, 0, -1);
            $sql .= "WHERE id=".$data["id"];
        } else {
            $sql = "INSERT INTO ".$this->table."(";
            unset($data["id"]);
            foreach($data as $k=>$v) {
                $sql .= "$k,";
            }
            $sql = substr($sql, 0, -1);
            $sql .=") VALUES (";
            foreach($data as $v) {
                $sql .= "'$v',";
            }
            $sql = substr($sql, 0, -1);
            $sql .= ")";
        }
        $this->pdo->exec($sql);
        if(!isset($data["id"])) {
            $this->id = $this->pdo->lastInsertId();
        } else {
            $this->id = $data["id"];
        }
    }

    public function createWhereNotExists($data) {
        isset($data["fields"]) ? $fields = $data["fields"] : 0;
        isset($data["fields_dual"]) ? $fields_dual = $data["fields_dual"] : 0;
        isset($data["conditions"]) ? $conditions = $data["conditions"] : 0;

        $sql = "INSERT INTO $this->table ($fields) SELECT * FROM (SELECT $fields_dual FROM DUAL) AS temp WHERE NOT EXISTS (SELECT $fields FROM $this->table WHERE $conditions)";
        //echo "<div>";
        //echo $sql;
        //echo "</div>";
        $this->pdo->exec($sql);
    }

    public function change($sql) {
        $this->pdo->exec($sql);
    }

    public function find($data = array()) {
        $conditions = "1=1";
        $fields = "*";
        $limit = "";
        $order = "id ASC";
        if(isset($data["conditions"])) { $conditions = $data["conditions"]; }
        if(isset($data["fields"])) { $fields = $data["fields"]; }
        if(isset($data["limit"])) { $limit = "LIMIT ".$data["limit"]; }
        if(isset($data["order"])) { $order = $data["order"]; }
        $sql = "SELECT $fields FROM ".$this->table." WHERE $conditions ORDER BY $order $limit";
        $req = $this->pdo->query($sql);
        $d = $req->fetchALL();
        return $d;
    }

    public function findOneRow($data = array()) {
        $conditions = "1=1";
        $fields = "*";
        $limit = "";
        $order = "id ASC";
        if(isset($data["conditions"])) { $conditions = $data["conditions"]; }
        if(isset($data["fields"])) { $fields = $data["fields"]; }
        if(isset($data["limit"])) { $limit = "LIMIT ".$data["limit"]; }
        if(isset($data["order"])) { $order = $data["order"]; }
        $sql = "SELECT $fields FROM ".$this->table." WHERE $conditions ORDER BY $order $limit";
        $req = $this->pdo->query($sql);
        $d = $req->fetch();

        return $d;
    }

    public function del($id = null) {
        if($id == null) { $id = $this->id; }
        $sql = "DELETE FROM ".$this->table."WHERE id=$id";
        $this->pdo->exec($sql);
    }

    static function load($name) {
        require("$name.php");
        return new $name();
    }
}
?>