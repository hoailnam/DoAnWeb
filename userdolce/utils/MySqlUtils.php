<?php
class MySqlUtils
{
    private $servername;
    private $username;
    private $password;
    private $myDB;
    private static $conn;
    public function __construct()
    {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->myDB = "lt_web";
     

        $this->connectDB();
    }
    public function __destruct()
    {
        $this->servername = "";
        $this->username = "";
        $this->password = "";
        $this->myDB = "";
        self::$conn == NULL;
    }

    public function connectDB()
    {
        try {
            self::$conn = new PDO("mysql:host=$this->servername;dbname=$this->myDB", $this->username, $this->password);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function disConnectDB()
    {

        self::$conn == NULL;
    }
    public function insertData($query, $param = array())
    {
        $stmt = self::$conn->prepare($query);
        $stmt->execute($param);
    }
    public function getAllData($query)
    {
        $stmt = self::$conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getDataPr($query, $param = array())
    {
        $stmt = self::$conn->prepare($query);
        $stmt->execute($param);
        $list = array();
        while ($pr = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($list, $pr);
        }
        return $list;
    }
    public function getList($query)
    {
        $stmt = self::$conn->prepare($query);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<li class="main-nav-list child"><a href="category.php?list_id=' . $row['list_id'] . '">' . $row['list_name'] . '<span class="number"></span></a></li>';
        }
    }
    public function getPage($query, $param = array())
    {
        $stmt = self::$conn->prepare($query);
        $stmt->execute($param);
        $tong = $stmt->fetchColumn();
        $sotrang = ceil($tong / 8);
        return $sotrang;
    }

    public function getPrDetails($query, $param = array())
    {
        $stmt = self::$conn->prepare($query);
        $stmt->execute($param);
        $pr = $stmt->fetch(PDO::FETCH_ASSOC);
        return $pr;
    }
}
