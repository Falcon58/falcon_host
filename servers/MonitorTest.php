<?php
   require __DIR__ . '/ServerMonitor/SourceQuery.php';
   Header( 'Content-Type: text/plain' );
   $Query = new SourceQuery();
   
   define('SQ_SERVER_ADDR', '192.168.1.101');
   define('SQ_SERVER_PORT', 27115);
   define('SQ_TIMEOUT', 1);
   define('SQ_ENGINE', SourceQuery :: SOURCE);
   
   try
   {
      $Query->Connect(SQ_SERVER_ADDR, SQ_SERVER_PORT, SQ_TIMEOUT, SQ_ENGINE);
	  if($Query->GetConnect())
	  {
	     print_r($Query->GetInfo());
	     print_r($Query->GetPlayers());
	     print_r($Query->GetRules());
	  }
   }
   catch(Exception $e)
   {
      echo $e->getMessage();
   }
   $Query->Disconnect();
?>