<?php

namespace kuralab\rfc;

class DictDB
{
    private $dbh;

    public function __construct()
    {
        $dsn = 'sqlite:'.dirname(__FILE__).'/../../../db/ejdict.sqlite3';
        $this->dbh = new \PDO($dsn);
    }

    public function __destruct()
    {
        $this->dbh = null;
    }

    public function search($word = "")
    {
        $sql = 'select * from items where word=?';
        try {
            if ($this->dbh == null) {
                return "";
            }
            $this->dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
            $sth = $this->dbh->prepare($sql);
            $sth->setFetchMode(\PDO::FETCH_NUM);
            $sth->bindParam(1, $word, \PDO::PARAM_STR);
            $sth->execute();
            while ($result = $sth->fetch()) {
                return $result;
            }
        } catch (\PDOException $e) {
            return "";
        }
    }
}
