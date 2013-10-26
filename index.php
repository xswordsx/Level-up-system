<?php
//error_reporting(E_STRICT | E_ALL | E_DEPRECATED);
ini_set("display_errors", 1);

session_start();
include ("inc/config.php");
include ("inc/common.php");
$page=get_param("page");
$action=get_param("action");
if(get_param("login"))Load_Login();
echo $_SESSION['user_info']['Access_level'];
if(!$page and !$_SESSION['user_info']) $page='index';
if(!$page and $_SESSION['user_info']['Access_level']=='3') $page='student';
if(!$page and $_SESSION['user_info']['Access_level']=='2') $page='teacher';
if(!$page and $_SESSION['user_info']['Access_level']=='1') $page='admin';

$lg=$_SESSION['language'];
if($page=='logout')Load_Logout();
if($page=='register') Load_Register();
if($page=='active_code') Load_Active_code();
if($page=='admin_class') Load_Admin_class();
if($page=='teacher') Load_Teacher();

$smarty->assign('page', $page);
$smarty->assign('action', $action);
$smarty->assign('error', $error); 
$smarty->assign('result', $result); 
$smarty->assign('user_info', $_SESSION['user_info']); 
$smarty->display('templates/index.tpl');	

function Load_Register(){
	global $db, $smarty, $lang;
	global $result, $error;
	global $page, $action;	
	$smarty->assign("classes",$db->Getassoc("Select Id,Name from classes"));
	$smarty->assign("access_levels",$db->Getassoc("Select Id,Name from accesslevels"));
	$smarty->assign("character_types",$db->Getassoc("Select Id,Name from characters"));
	$save=get_param("save");
	if ($save) {
		$username=get_param("username"); $smarty->Assign('username', $username);
		$password=md5(get_param("password"));
		$access_level=get_param("access_level"); $smarty->Assign('access_level', $access_level); 
		$character_type=get_param("character_type"); $smarty->Assign('character_type', $character_type); 
		if(!$access_level)$access_level=3;
		$class_in_school=get_param("class_in_school"); $smarty->Assign('class_in_school', $class_in_school); 
		if($access_level!='3' and $_SESSION['user_info']['access_level']!='1') {
			$error=$lang['low_access_level'];
		}
		$name=get_param("name"); $smarty->Assign('name', $name);
		if($db->Getrow("select * from users where lcase(username)=lcase('$username')")) $error="Потребителското име е заето";
		
		if (!$username or !$password or !$name or !$confirm_password or !$access_level or ($access_level=='3' and !$class_in_school)) $error=$lang["please_fill_all_filds"];
		if(!$error){
			$db->Execute("insert into users (Id) values (NULL)");
			$id=$db->insert_id("users","Id");
			$db->Execute("update users set
					Username='$username',
					Password='$password',
					Name='$name',
					Access_level=$access_level,
					Class_in_school='$class_in_school',
					Character_type='$character_type'
					where Id=$id");
			$result="Успешно се регистрирахте";
			}
		}
}
function Load_Teacher() {
	global $db, $smarty, $lang;
	global $result, $error;
	global $page, $action;	
	
	if($action=='code_list') Load_Code_list();
	if($action=='get_users') Load_Get_Users();
	if($action=='attach_to_class') Load_Attach_to_class();
	
}
function Load_Login($email=false, $password=false, $login=false) {
	global $db, $smarty, $lang;
	global $result, $error;
	global $page, $action;
	global $id;
	if (!$login) $login=get_param ("login");
	if ($login) {		
		if (!$username) $username=get_param("username");	
		if (!$password) $password=md5(get_param("password"));
		if (!$username) $error=$lang["incorect_login_data"];
		if (!$password) $error=$lang["incorect_login_data"];
		if ($error) return false;
		$rs=$db->getrow("select * from users where lcase(Username)=lcase('$username')");
		if (!$rs) $error=$lang["incorect_login_data"];
		if ($rs["Password"] != $password) $error=$lang["incorect_login_data"];
		if ($error) return false;
		$rs2=$db->getrow("select * from users where lcase(Username)=lcase('$username') and Password='$password' and id=".$rs["Id"]);
		if (!$rs2) $error=1;
		if ($rs2["Password"] != $password)$error=$lang["incorect_login_data"];
		if ($rs2["Id"] != $rs["Id"]) $error=$lang["incorect_login_data"];
		if ($rs2["Username"] != $rs["Username"]) $error=$lang["incorect_login_data"];
		if ($rs2["Password"] != $rs["Password"])$error=$lang["incorect_login_data"];  
		if ($error) return false;
		
		if (!$error) {
			$_SESSION['user_info']=$rs2;
			return true;
			
		}
	}}
function Load_Logout() {
	global $db, $smarty, $lang;
	global $result, $error;
	global $page, $action;	
	
	$_SESSION['user_info']='';
	$page='';
	
}
function Load_Code_list(){
	global $db, $smarty, $lang;
	global $result, $error;
	global $page, $action;	
	
	if($_SESSION['user_info']['Access_level']=='3') {
		$page='';
		exit();
	}
	$generate=get_param("generate");
	
	
	if($generate) {
		$count=get_param("count");
		$smarty->assign("count",$count);
		$xp=get_param("xp");
		$smarty->assign("xp",$xp);
		$ap=get_param("ap");
		$smarty->assign("ap",$ap);
		$file = "uploads/generated_codes/codes_".$_SESSION['user_info']['Id'].".pdf";
		if(file_exists($file)) unlink($file);
		for($i=0;$i<$count;$i++) {
			$rand_string[$i]=rand_string(8);
			$db->Execute("insert into codes (Id) values (NULL)");
			$id=$db->insert_id("codes","Id");
			$db->execute("Update codes set
								UniqueName='".$rand_string[$i].$id."',
								Xp='$xp',
								Ap='$ap'
								where Id=$id");
			$rand_string[$i].=$id." ";
			savetofile($file,$rand_string[$i]);
		}
		
		$smarty->assign("list",$rand_string);

	}
	

	
	
}

function Load_Active_code() {
	global $db, $smarty, $lang;
	global $result, $error;
	global $page, $action;	

	$activate=get_param("activate");
	if ($activate) {
		$code=get_param("code");
		$info=$db->getrow("Select * from codes where UniqueName='$code'");
		$_SESSION['user_info']['Xp']+=$info['Xp'];
		$_SESSION['user_info']['Ap']+=$info['Ap'];
		$next_level_xp=(100*$_SESSION['user_info']['level'])+(50*($_SESSION['user_info']['level']-1));
		if($_SESSION['user_info']['Xp']>=$next_level_xp) {
			$db->execute("Update users set level=".++$_SESSION['user_info']['level'].", sp=".++$_SESSION['user_info']["Sp"]." where id=".$_SESSION['user_info']['Id']);
			$_SESSION['user_info']['Xp']-=$next_level_xp;
		}
		$db->execute("Update users set Xp=".$_SESSION['user_info']['Xp'].",Ap=".$_SESSION['user_info']['Ap']." where id=".$_SESSION['user_info']['Id']);
		$db->execute("Delete from codes where Id=".$info['Id']);				
	}
	
}
function  Load_Get_Users() {
	global $db, $smarty, $lang;
	global $result, $error;
	global $page, $action;	
	$flag=get_param("flag");
	if(!$flag) {
		$list=$db->getall("Select * from users_has_classes,classes where users_has_classes.Classes_Id=classes.Id and Users_Id=".$_SESSION['user_info']['Id']);
		$smarty->assign("list",$list);	
		
	}
	else {
	$list=$db->getall("Select * from users where Class_in_school=$flag");
	for($i=0;$list[$i];$i++) { 
		$list[$i]['skills']=$db->getall("Select * from users_has_skills where Users_Id=".$list[$i]['Id']);
	}
	$smarty->assign("list",$list);
	}
	$smarty->assign("flag",$flag);

	
}
function Load_Admin_class() {
	global $db, $smarty, $lang;
	global $result, $error;
	global $page, $action;	
	
	if($action=='add') {
		$save=get_param("save");
		if($save) {
			$name=get_param("name");
			$db->execute("Insert into classes (Name) values ('$name')");
		}
	}
	if($action=='delete') {
		$id=get_param("id");
		$db->execute("Delete from classes where Id=$id");
		$action='';	
		
	}
	if(!$action) {
		$list=$db->getall("Select * from classes");
		$smarty->assign("list",$list);	
		
	}
	
}
function Load_Attach_to_class() {
	global $db, $smarty, $lang;
	global $result, $error;
	global $page, $action;	
	$flag=get_param("flag");
	if($flag=='add') {
		$save=get_param("save");
		$list=$db->getassoc("Select Id,Name from classes");
		$smarty->assign("classes",$list);
		if($save) {
			$class=get_param("classes");
			$db->execute("Insert into users_has_classes (Users_Id,Classes_Id) values (".$_SESSION['user_info']['Id'].",$class)");
			$flag='';
		}
	}
	if($flag=='delete') {
		$id=get_param("id");
		$db->execute("Delete from users_has_class where Id=$id");
		$flag='';	
		
	}
	if(!$flag) {
		$list=$db->getall("Select * from classes,users_has_classes where users_has_classes.Classes_Id=classes.Id");
		$smarty->assign("list",$list);	
		
	}
	$smarty->assign("flag",$flag);
	
}
function rand_string( $length ) {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	

	$size = strlen( $chars );
	for( $i = 0; $i < $length; $i++ ) {
		$str .= $chars[ rand( 0, $size - 1 ) ];
	}

	return $str;
}
?>