<?php
session_start();
date_default_timezone_set("Asia/Taipei");

$Admin = new DB('admin');

class DB
{
    protected $dsn = "mysql:host=localhost;charest=utf8;dbname=web02";
    protected $table;
    protected $pdo;

    function __construct($table)
    {
        $this->pdo = new PDO($this->dsn, 'root', '');
        $this->table = $table;
    }

    protected function arrayToSqlArray($array)
    {
        foreach ($array as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }
        return $tmp;
    }

    public function all(...$arg)
    {
        $sql = " SELECT * FROM `$this->table` ";
        if (isset($arg)) {
            if (is_array($arg[0])) {
                $sql .= " WHERE " . join(" && ", $this->arrayToSqlArray($arg[0]));
            } else {
                $sql .= $arg[0];
            }
        }

        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($arg)
    {
        $sql = " SELECT * FROM `$this->table` WHERE ";
        if (is_array($arg)) {
            $sql .= join(" && ", $this->arrayToSqlArray($arg));
        } else {
            $sql .= " `id` = " . $arg;

            return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function save($arg)
    {
        if (isset($arg['id'])) {
            $id = $arg['id'];
            unset($arg['id']);
            $sql = " UPDATE `$this->table` SET " . join(",", $this->arrayToSqlArray($arg)) . " WHERE `id` = $id ";
        } else {
            foreach ($arg as $key => $value) {
                $keys[] = "`$key`";
                $values[] = "'$value'";
            }
            $sql = "INSERT INTO `$this->table`( " . join(',', $keys) . " ) VALUES ( " . join(',', $values) . " )";
        }
        return $this->pdo->exec($sql);
    }

    public function del($arg)
    {
        $sql = " DELETE FROM `$this->table` WHERE ";
        if (is_array($arg)) {
            $sql .= join(" && ", $this->arrayToSqlArray($arg));
        } else {
            $sql .= " `id` = " . $arg;

            return $this->pdo->exec($sql);
        }
    }

    protected function math($math, $field, $condition)
    {
        $sql = " SELECT $math($field) FROM `$this->table` ";
        if ($condition != 1) {
            if (is_array($condition)) {
                $sql .= " WHERE " . join(" && ", $this->arrayToSqlArray($condition));
            } else {
                $sql .= $condition;
            }
        }
        return $this->pdo->query($sql)->fetchColumn();
    }

    public function count($condition)
    {
        return $this->math('COUNT', '*', $condition);
    }
    public function max($field, $condition)
    {
        return $this->math('MAX', $field, $condition);
    }
    public function min($field, $condition)
    {
        return $this->math('MIN', $field, $condition);
    }
    public function sum($field, $condition)
    {
        return $this->math('SUM', $field, $condition);
    }
    public function svg($field, $condition)
    {
        return $this->math('SVG', $field, $condition);
    }
}

function prr($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function to($url)
{
    header("location:" . $url);
}
?>