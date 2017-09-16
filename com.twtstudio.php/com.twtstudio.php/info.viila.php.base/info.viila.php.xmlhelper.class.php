<?php
	class XmlHelper
	{
		static function safe($str)
		{
			$str=str_replace("&","%26",$str);
			return $str;
		}
		static function gen($tag,$msg,$level)
		{
			$str="";
			for($i=0;$i<$level;$i++)
				$str.="\t";
			$str.="<".$tag.">".$msg."</".$tag.">\r\n";
			return $str;
		}
		static function genCDATA($tag,$msg,$level)
		{
			$str="";
			for($i=0;$i<$level;$i++)
				$str.="\t";
			$str.="<".$tag."><![CDATA[".$msg."]]></".$tag.">\r\n";
			return $str;
		}
		var $count=0;
		var $xmlDom="";
		var $domArray=array();
		function createElement($tag)
		{
			$this->domArray[$this->count]=$tag;
			for($i=0;$i<$this->count;$i++)
				$this->xmlDom.="\t";
			$this->xmlDom.="<".$this->domArray[$this->count].">\r\n";
			$this->count++;
			//echo $this->xmlDom;
		}
		function ce($tag){$this->createElement($tag);}
		function endElement()
		{
			if($this->count==0)
				return;
			$this->count--;
			for($i=0;$i<$this->count;$i++)
				$this->xmlDom.="\t";
			$this->xmlDom.="</".$this->domArray[$this->count].">\r\n";
			//echo $xmlDom;
		}
		function ee(){$this->endElement();}
		function setElement($tag,$msg)
		{
			//for($i=0;$i<$this->count;$i++) $this->xmlDom.="\t";
			$this->xmlDom.=XmlHelper::gen($tag,$msg,$this->count);
		}
		function se($tag,$msg){$this->setElement($tag,$msg);}
		function setCDATAElement($tag,$msg)
		{
			//for($i=0;$i<$this->count;$i++) $this->xmlDom.="\t";
			$this->xmlDom.=XmlHelper::genCDATA($tag,$msg,$this->count);
		}
		function sce($tag,$msg){$this->setCDATAElement($tag,$msg);}
		function add($str)
		{
			$this->xmlDom.=$str."\r\n";
		}
		function a($str){$this->add($str);}
		function addCDATA($str)
		{
			$this->xmlDom.="<![CDATA[".$str."]]>\r\n";
		}
		function ac($str){$this->addCDATA($str);}
		function flush()
		{
			return $this->xmlDom;
		}
		function show()
		{
			return str_replace(">","&#62;",str_replace("<","&#60;",$this->xmlDom));
		}
		function clear()
		{
			$this->xmlDom="";
			$this->count=0;
			$this->domArray=array();
		}
	}
?>