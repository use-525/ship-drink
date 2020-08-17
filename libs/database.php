<?php
    // kết nối đến cơ sở dữ liệu
    function connection()
    {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=ship-drink;charset=utf8", "root2", "");
        } catch (PDOException $e) {
            echo "Error connecting to database" . $e->getMessage();
        }
        return $conn;
    }
    // Xuất toàn bộ dữ liệu bảng
    function listAll($table)
    {
        $conn = connection();
        try {
            $sql = "SELECT*FROM $table";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error connecting to database" . $e->getMessage();
        } finally {
            unset($conn);
        }
        return $result;
    }
    // Xuất một thành phần bảng
    function listOne($table, $id, $value)
    {
        $conn = connection();
        try {
            $sql = "SELECT*FROM $table WHERE $id=:$id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":$id", $value);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error connecting to database" . $e->getMessage();
        } finally {
            unset($conn);
        }
        return $result;
    }
    // Add dữ liệu bảng
    function insert($table, $data = array())
    {
        $conn = connection();
        try {
            $sql = "INSERT INTO $table SET ";
            foreach ($data as $key => $value) {
                $sql .= "$key=:$key, ";
            }
            $sql = rtrim($sql, " , ");
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute($data);
            echo $sql;
        } catch (PDOException $e) {
            echo "Error connecting to database" . $e->getMessage();
        } finally {
            unset($conn);
        }
        return $result;
    }
    // Update dữ liệu bảng
    function update($table, $data = array(), $id, $value_id)
    {
        $conn = connection();
        try {
            $sql = "UPDATE $table SET ";
            foreach ($data as $key => $value) {
                $sql .= "$key=:$key, ";
            }
            $sql = rtrim($sql, " , ");
            $sql .= " WHERE $id=:$id";
            $data[$id] = $value_id;

            $stmt = $conn->prepare($sql);
            $result = $stmt->execute($data);
        } catch (PDOException $e) {
            echo "Error connecting to database" . $e->getMessage();
        } finally {
            unset($conn);
        }
        return $result;
    }
    // Xoá dữ liệu trong bảng
    function delete($table, $id, $value)
    {
        $conn = connection();
        try {
            $sql = "DELETE FROM $table WHERE $id=:$id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":$id", $value);
            $result = $stmt->execute();
        } catch (PDOException $e) {
            echo "Error connecting to database" . $e->getMessage();
        } finally {
            unset($conn);
        }
        return $result;
    }

    //câu truy vấn nhiều trong bảng
    function query_pro($sql)
    {
        $conn = connection();
        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi dữ liệu " . $e->getMessage();
        } finally {
            unset($conn);
        }
        return $result;
    }
    function query_nopro($sql)
    {
        $conn = connection();
        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi dữ liệu " . $e->getMessage();
        } finally {
            unset($conn);
        }
        return $result;
    }
    //cau lenh sql co dieu kien
    function query_where($table, $arr)
    {
        $conn = connection();
        try {
            $sql = "SELECT * FROM $table WHERE $arr[0] $arr[1] :$arr[0] LIMIT 0,3";
            $stmt = $conn->prepare($sql);
            $data = [
                $arr[0] => $arr[1]
            ];
            $stmt->execute($data);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi dữ liệu " . $e->getMessage();
        } finally {
            unset($conn);
        }
    }

    //

    function pro_cate($table,$id,$value){
        $conn = connection();
        try{
            $sql = "SELECT *FROM $table WHERE $id=:$id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":$id", $value);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi dữ liệu " . $e->getMessage();
        } finally {
            unset($conn);
        }
        return $result;
    }

    ?>