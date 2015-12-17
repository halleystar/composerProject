<?php
namespace  Maqiang\Controller;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Configuration;
class MyController  {
    public function abc(Request $request){
            $config = new Configuration();
        $connectionParams = array(
            'dbname' => 'test',
            'user' => 'root',
            'password' => 'ydzy2wsx',
            'host' => '115.28.1.11',
            'driver' => 'pdo_mysql',
        );
        $conn = DriverManager::getConnection($connectionParams, $config);
        $sql = "SELECT * FROM tbl_user limit 0, 10";
        $stmt = $conn->query($sql);
        while ($row = $stmt->fetch()) {
            echo $row['username'];
        }
    }
    
    
    public function testDb(Request $request){
        echo $request->getQueryString();
    }
}

