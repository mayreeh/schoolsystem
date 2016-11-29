<?php
mysql_connect('localhost','root','marystl');
mysql_select_db('shuleyetu');
if(isSet($_POST['content']))
{
$content=$_POST['content'];
mysql_query("insert into stream values ('$content')");
$sql_in= mysql_query("SELECT * FROM stream ");
$r=mysql_fetch_array($sql_in);
}
?>
<b><?php echo $r['streamname']; ?></b>