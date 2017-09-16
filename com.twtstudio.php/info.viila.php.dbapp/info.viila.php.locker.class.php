<?php
	class Locker
	{
		var $db;
		var $config;
		var $table;
		function __construct(&$db)
		{
			$this->db=$db;
			global $IVPConfig;
			$this->config=isset($IVPConfig['basedbconfig'])?$IVPConfig['basedbconfig']:NULL;
			$this->table=$IVPConfig['basedatabase']['lock'];
		}
		
		function init()
		{
			global $IVPConfig;
		
			$query="CREATE TABLE `".$IVPConfig['basedatabase']['lock']."` ("
				."  `index` bigint(20) NOT NULL auto_increment,"
				."  `key` char(128) NOT NULL,"
				."  `domain` char(128) NOT NULL,"
				."  `locktype` char(10) default NULL,"
				."  `info` char(255) default NULL,"
				."  `locktime` datetime default NULL,"
				."  `unlocktime` datetime default NULL,"
				."  PRIMARY KEY  (`index`,`key`,`domain`),"
				."  UNIQUE KEY `dk` (`key`,`domain`)"
				.") ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";
			return $this->db->sql($query);
		}
		
		function queryPlus($key,$domain,$beforeseconds=0,$afterseconds=0,$count=false)
		{
			$this->db->conn();
			$key=$key===false?false:$this->db->safe($key);
			$domain=$domain===false?false:$this->config['lockdomain'].".".$this->db->safe($domain);
			$query="";
			if($key!==false)
			{
				$query="`key`";
				if(strpos($key,"%")!==false)
					$query.=" LIKE ";
				else
					$query.="=";
				$query.="'".$key."'";
			}
			if($domain!==false)
			{
				if($query!="")
					$query.=" AND ";
				$query.="`domain`";
				if(strpos($domain,"%")!==false)
					$query.=" LIKE ";
				else
					$query.="=";
				$query.="'".$domain."'";
			}
			if($query!="")
				$query.=" AND ";
			$query.=" NOW()>="
				.(is_numeric($beforeseconds)?
					"DATE_ADD(`locktime`,INTERVAL -".$beforeseconds." SECOND) "
					:"`locktime`")
				."AND NOW()<="
				.(is_numeric($afterseconds)?
					"DATE_ADD(`unlocktime`,INTERVAL ".$afterseconds." SECOND)"
					:"`unlocktime`");
			$query=
				//"SET @x=0;"
				"SELECT"
				//." @x:=(IFNULL(@x,0)+1) as id,"
				." ".($count?'COUNT(1) AS num':'*')
				." FROM `".$this->table."` WHERE ".$query;
			
			//echo $query;
			return $this->db->sql($query);
		}
		function query($key,$domain)
		{
			
			$this->db->conn();
			$key=$this->db->safe($key);
			$domain=$this->db->safe($domain);
			$query='SELECT * FROM '.$this->table.' WHERE `key`="'.$key.'" AND `domain`="'.$this->config['lockdomain'].".".$domain.'"'
				.' AND `locktime`<=NOW() AND `unlocktime`>=NOW() LIMIT 1';
			//echo $query;
			$result=$this->db->sql($query);
			
			return $result;
			
			//$row=$this->db->getRow($result);
			//return $row?$row:false;
		}
		function maintain()
		{
			$this->db->conn();
			$query="DELETE FROM `".$this->table."` WHERE `unlocktime`<=NOW()";
			$result=$this->db->sql($query);
			return $this->db->getAffectedRow();
		}
		function isLock($key,$subdomain,$info=false)
		{
			$this->db->conn();
			if(!$info)
				$info='';
			else
			{
				$info=base_protect($info);
				$info=" AND `info`='{$info}'";
			}

			$domain=$this->config['lockdomain'].".".$subdomain;
			$query="SELECT 1 FROM `".$this->table."` WHERE `domain`='".$domain."' AND `key`='".$key."'"
				." AND `unlocktime`>now()".$info
				." LIMIT 1";
			$result=$this->db->sql($query);
			//echo "[".$query."] ".($result?"o":"x");
			if(!$result||$this->db->rows($result)==1)
				return true;
			return false;
		}
		function unlock($key,$subdomain)
		{
			$this->db->conn();
			
			$domain=$this->config['lockdomain'].".".$subdomain;
			$query="DELETE FROM `".$this->table."` WHERE `domain`='".$domain."' AND `key`='".$key."' LIMIT 1";
			$result=$this->db->sql($query);
			if($this->db->getAffectedRow()==1)
				return true;
			return false;
			//echo "[".$query."] ".($result?"o":"x");
		}
		function lock($key,$subdomain,$addtime,$timetype,$info=false)
		{
			$this->db->conn();
			if($timetype=="")
				$timetype="SECOND";
			$timetype=strtoupper($timetype);
			switch($timetype)
			{
				case "SECOND":
				case "MINUTE":
				case "HOUR":
				case "DAY":
				case "WEEK":
				case "MONTH":
				case "YEAR":
					break;
				default:
					$timetype="SECOND";
					break;
			}
			$domain=$this->config['lockdomain'].".".$subdomain;
			$query="SELECT 1 FROM `".$this->table."` WHERE `domain`='".$domain."' AND `key`='".$key."' LIMIT 1";
			$result=$this->db->sql($query);
			if(!$result)
			{
				//echo "fail ".mysql_error();
				return;
			}
			if(!$info)
				$info='';
			else
			{
				$info=base_protect($info);
				$info=",`info`='{$info}'";
			}
			if($this->db->rows($result)==1)
			{
				$query="UPDATE `".$this->table."` SET `locktime`=NOW(),"
					."`unlocktime`=DATE_ADD(NOW(),INTERVAL ".$addtime." ".$timetype.")".$info
					." WHERE `domain`='".$domain."' AND `key`='".$key."' LIMIT 1";
			}
			else
			{
				$query="INSERT INTO `".$this->table."` SET `key`='".$key."',`domain`='".$domain."',"
					."`locktime`=NOW(),"
					."`unlocktime`=DATE_ADD(NOW(),INTERVAL ".$addtime." ".$timetype.")".$info;
			}
			$result=$this->db->sql($query);
			if(!$result)
			{
				//echo "[".$query;
				//echo " | fail | ".mysql_error()."]";
			}
		}
	}
?>