<?php
// header("Location: /login.php");

/*  Hi,
    
    Thanks for downloading net2ftp!
    
    This page shows how to integrate net2ftp in a generic PHP page.
    It is quite easy:
    1. Define the constants NET2FTP_APPLICATION_ROOTDIR and NET2FTP_APPLICATION_ROOTDIR_URL
    2. Include the file main.inc.php
    3. Execute 5 net2ftp() calls to send the HTTP headers, print the Javascript 
       code, print the HTML body, etc...
    4. Check if an error occured to print out an error message.
    
    Look in /integration for more elaborate examples.
    
    Enjoy,
    
    David 
*/

// ------------------------------------------------------------------------
// 1. Define the constants NET2FTP_APPLICATION_ROOTDIR and NET2FTP_APPLICATION_ROOTDIR_URL
// ------------------------------------------------------------------------
$http_scheme = "http://";
if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") { $http_scheme = "https://"; }
$http_host = $_SERVER["HTTP_HOST"];
if     (isset($_SERVER["SCRIPT_NAME"]) == true)  { $http_directory = dirname($_SERVER["SCRIPT_NAME"]); }
elseif (isset($_SERVER["PHP_SELF"]) == true)     { $http_directory = dirname($_SERVER["PHP_SELF"]); }
if ($http_directory == "/") { $http_directory = ""; }
define("NET2FTP_APPLICATION_ROOTDIR", dirname(__FILE__));
define("NET2FTP_APPLICATION_ROOTDIR_URL", $http_scheme . $http_host . $http_directory);

// ------------------------------------------------------------------------
// 2. Include the file /path/to/net2ftp/includes/main.inc.php
// ------------------------------------------------------------------------
require_once("./includes/main.inc.php");

// ------------------------------------------------------------------------
// 3. Execute net2ftp($action). Note that net2ftp("sendHttpHeaders") MUST 
//    be called once before the other net2ftp() calls!
// ------------------------------------------------------------------------
net2ftp("sendHttpHeaders");

if ($net2ftp_result["success"] == false) {
	require_once("./skins/shinra/error_wrapped.template.php");
	exit();
}
?>
<!DOCTYPE html PUBLIC "XHTML 1.0 Transitional" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="<?php echo __("en"); ?>" dir="<?php echo __("ltr"); ?>">
<head>
<meta http-equiv="Content-type" content="text/html;charset=<?php echo __("iso-8859-1"); ?>" />
<meta name="keywords" content="net2ftp, web, ftp, based, web-based, xftp, client, PHP, SSL, SSH, SSH2, password, server, free, gnu, gpl, gnu/gpl, net, net to ftp, netftp, connect, user, gui, interface, web2ftp, edit, editor, online, code, php, upload, download, copy, move, delete, zip, tar, unzip, untar, recursive, rename, chmod, syntax, highlighting, host, hosting, ISP, webserver, plan, bandwidth" />
<meta name="description" content="net2ftp is a web based FTP and SSH client. It is mainly aimed at managing websites using a browser. Edit code, upload/download files, copy/move/delete directories recursively, rename files and directories -- without installing any software." />
<link rel="shortcut icon" href="favicon.ico" />
<link rel="apple-touch-icon" href="favicon.png"/>
<title>net2ftp - a web based FTP client</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php net2ftp("printJavascript"); ?>
<?php net2ftp("printCss"); ?>
</head>
<body onload="<?php net2ftp("printBodyOnload"); ?>">

<?php net2ftp("printBody"); ?>


<!--/var/www/net2ftp/files_to_upload/skins/shinra/login.template.php-->
<?php
//die(var_dump("Location: ".$net2ftp_globals["application_skinsdir"] . "/" . $net2ftp_globals["skin"] . "/login.template.php"));
//header("Location:".$net2ftp_globals["application_skinsdir"] . "/" . $net2ftp_globals["skin"] . "/login.template.php");  ?>
<?php
// ------------------------------------------------------------------------
// 4. Check the result and print out an error message. This can be done using 
//    a template, or by accessing the $net2ftp_result variable directly.
// ------------------------------------------------------------------------
if ($net2ftp_result["success"] == false) {
	require_once($net2ftp_globals["application_rootdir"] . "/skins/" . $net2ftp_globals["skin"] . "/error.template.php");
}
?>

</body>
</html>