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

    public function search($word)
    {
        $sql = 'select * from items where word=?';
        $result = $this->selectWord($sql, $word);

        if (!empty($result)) return $result;

        $length = strlen($word);
        for ($i = 1; $i < $length - 3; $i++) {
            $word = substr($word, 0, $length - $i);
            $sql = "select * from items where word LIKE ? || '" . str_repeat("%", $i) . "'";
            $result = $this->selectWord($sql, $word);
            if (!empty($result)) return $result;
        }

        return array();
    }

    public function selectWord($sql, $word)
    {
        try {
            if ($this->dbh == null) {
                return array();
            }
            $this->dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
            $sth = $this->dbh->prepare($sql);
            $sth->setFetchMode(\PDO::FETCH_NUM);
            $sth->bindParam(1, $word, \PDO::PARAM_STR);
            $sth->execute();
            $result = array();
            while ($retval = $sth->fetch()) {
                $result[$retval[1]] = $retval[2];
            }
            return $result;
        } catch (\PDOException $e) {
            return array();
        }
    }
}
