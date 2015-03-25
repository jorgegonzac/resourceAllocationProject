<?php

function auth_pop3_ssl($username, $password, $popserver) 
{
    $isSSL = 0;
    if (substr($popserver, 0, 6) == "ssl://")
    {
        $isSSL = 1;
   	}
    if (trim($username) == '')
    {
        return false;
    }
    else
    {
        $fp = fsockopen("$popserver", 110, $errno, $errstr);
       	if (!$fp)
       	{
            // failed to open POP3
            return false;
        }
        else
        {
            //set_socket_blocking($fp, -1); // Turn off blocking
            /*
            Clear the POP server's Banner Text.
            eg.. '+OK Welcome to etc etc'
            */
	        $trash = fgets($fp, 128); // Trash to hold the banner
            fwrite($fp, "USER $username\r\n"); // POP3 USER CMD
            $user = fgets($fp, 128);
            $pos = strpos($user, "+OK");
            if($pos === false)
            {
				$auth = false;
			}
			else
			{
				fwrite($fp, "PASS $password\r\n"); // POP3 PASS CMD
                $pass = fgets($fp, 128);
				$pos2 = strpos($pass, "+OK");
				if($pos2 === false)
				{
					$auth = false;
				}
				else
				{
					$auth = true;
				}					
			}	
            fwrite($fp, "QUIT\r\n");
            fclose($fp);
            return $auth;
        }
    }
}