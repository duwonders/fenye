<?php
class fenye
{
	private $page;
	function __construct($page){
		$this->page = $page;
	}
    public function select()
    {
        $dsn = 'mysql:host=localhost;dbname=web';
        $passwd = '';
        $username = 'root';
        $dbh = new PDO($dsn,$username,$passwd);
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//报错
        $dbh->exec('set names utf8');
        $page = ($this->page-1)*10;
    	$sql = "SELECT * FROM `fenye` ORDER BY id LIMIT $page,10";
        $res = $dbh->prepare($sql);
        $res->execute();
    	$allmessage = $res->fetchAll(PDO::FETCH_ASSOC);
        $this->ech($allmessage);
    }
    private function ech($allmessage)
    {
        foreach ($allmessage as $key) {
            print_r($key);
        }
    }
}
?>