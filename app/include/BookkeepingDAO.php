<?php
require_once 'common.php';
class BookkeepingDAO
{
    
    public function retrieveByPersonByDate($username,$date){
        
        $conn_manager = new ConnectionManager();
        $conn = $conn_manager->getConnection();
        
        $sql = 'SELECT * FROM bookkeeping WHERE username=:username AND date=:date';
        $stmt = $conn->prepare($sql);
        @$stmt->bindParam(':username', $username, PDO::PARAM_STR);
        @$stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $records = [];
        while ($row = $stmt->fetch()) {
            $record = [];
            $record['date'] = $row['date'];
            $record['item'] = $row['item'];
            $record['type'] = $row['type'];
            $record['category'] = $row['category'];
            $record['amount'] = $row['amount'];
            $records[] = $record;
        }

        $stmt->closeCursor();
        $conn = null;

        return $records;
    }

    /*
    @param $username: str, unique identifier of the user
    @param $item_info: associative array contains: item, type, category, amount
    @return $status: bool
    */
    public function addRecord($username,$date, $item_info){
        $conn_manager = new ConnectionManager();
        $conn = $conn_manager->getConnection();
        
        $sql = 'INSERT INTO bookkeeping (username,date, item, type, category, amount) VALUES (:username,:date, :item, :type, :category, :amount)';
        $stmt = $conn->prepare($sql);
        @$stmt->bindParam(':username', $username, PDO::PARAM_STR);
        @$stmt->bindParam(':date', $date, PDO::PARAM_STR);
        @$stmt->bindParam(':item', $item_info['item'], PDO::PARAM_STR);
        @$stmt->bindParam(':type', $item_info['type'], PDO::PARAM_STR);
        @$stmt->bindParam(':category', $item_info['category'], PDO::PARAM_STR);
        @$stmt->bindParam(':amount', $item_info['amount'], PDO::PARAM_STR);
        
        if (!$status = $stmt->execute()) {
            return $stmt->errorInfo()[2];
        }

        $stmt->closeCursor();
        $conn = null;

        return $status;
    }

}

?>