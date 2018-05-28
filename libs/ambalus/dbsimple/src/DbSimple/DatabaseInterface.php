<?php

namespace DbSimple;

interface DatabaseInterface {

    /**
     * object blob($blob_id)
     * Create new blob
     */
    public function blob($blob_id = null);

    /**
     * void transaction($mode)
     * Create new transaction.
     */
    public function transaction($mode = null);

    /**
     * mixed commit()
     * Commit the transaction.
     */
    public function commit();

    /**
     * mixed rollback()
     * Rollback the transaction.
     */
    public function rollback();

    /**
     * mixed select(string $query [, $arg1] [,$arg2] ...)
     * Execute query and return the result.
     */
    public function select($query);

    /**
     * mixed selectPage(int &$total, string $query [, $arg1] [,$arg2] ...)
     * Execute query and return the result.
     * Total number of found rows (independent to LIMIT) is returned in $total
     * (in most cases second query is performed to calculate $total).
     */
    public function selectPage(&$total, $query);

    /**
     * hash selectRow(string $query [, $arg1] [,$arg2] ...)
     * Return the first row of query result.
     * On errors return false and set last error.
     * If no one row found, return array()! It is useful while debugging,
     * because PHP DOES NOT generates notice on $row['abc'] if $row === null
     * or $row === false (but, if $row is empty array, notice is generated).
     */
    public function selectRow();

    /**
     * array selectCol(string $query [, $arg1] [,$arg2] ...)
     * Return the first column of query result as array.
     */
    public function selectCol();

    /**
     * scalar selectCell(string $query [, $arg1] [,$arg2] ...)
     * Return the first cell of the first column of query result.
     * If no one row selected, return null.
     */
    public function selectCell();

    /**
     * mixed query(string $query [, $arg1] [,$arg2] ...)
     * Alias for select(). May be used for INSERT or UPDATE queries.
     */
    public function query();

    /**
     * string escape(mixed $s, bool $isIdent=false)
     * Enclose the string into database quotes correctly escaping
     * special characters. If $isIdent is true, value quoted as identifier
     * (e.g.: `value` in MySQL, "value" in Firebird, [value] in MSSQL).
     */
    public function escape($s, $isIdent = false);

    /**
     * DbSimple\SubQuery subquery(string $query [, $arg1] [,$arg2] ...)
     * Выполняет разворачивание плейсхолдеров без коннекта к базе
     * Нужно для сложных запросов, состоящих из кусков, которые полезно сохранить
     *
     */
    public function subquery();

    /**
     * callback setLogger(callback $logger)
     * Set query logger called before each query is executed.
     * Returns previous logger.
     */
    public function setLogger($logger);

    /**
     * callback setCacher(callback $cacher)
     * Set cache mechanism called during each query if specified.
     * Returns previous handler.
     */
    public function setCacher($cacher = null);

    /**
     * string setIdentPrefix($prx)
     * Set identifier prefix used for $_ placeholder.
     */
    public function setIdentPrefix($prx);

    /**
     * string setCachePrefix($prx)
     * Set cache prefix used in key caclulation.
     */
    public function setCachePrefix($prx);

    /**
     * Задает имя класса строки
     *
     * <br>для следующего запроса каждая строка будет
     * заменена классом, конструктору которого передается
     * массив поле=>значение для этой строки
     *
     * @param string $name имя класса
     * @return DbSimple\DatabaseInterface указатель на себя
     */
    public function setClassName($name);

    /**
     * array getStatistics()
     * Returns various statistical information.
     */
    public function getStatistics();
}
