<?php 
 error_reporting(0); //�������д�����Ϣ
@header("content-Type: text/html; charset=utf-8"); //����ǿ��
ob_start();

function valid_email($str) 
{
	return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}

//���PHP���ò���
function show($varName)
{
	switch($result = get_cfg_var($varName))
	{
		case 0:
			return '<font color="red">��</font>';
		break;
		
		case 1:
			return '<font color="green">��</font>';
		break;
		
		default:
			return $result;
		break;
	}
}


if ($_GET['act'] == "phpinfo") 
{
	phpinfo();
	exit();
} 
elseif($_GET['act'] == "Function")
{
	$arr = get_defined_functions();
	Function php()
	{
	}
	echo "<pre>";
	Echo "������ʾϵͳ��֧�ֵ����к���,���Զ��庯��\n";
	print_r($arr);
	echo "</pre>";
	exit();
}elseif($_GET['act'] == "disable_functions")
{
	$disFuns=get_cfg_var("disable_functions");
	if(empty($disFuns))
	{
		$arr = '<font color=red>��</font>';
	}
	else
	{ 
		$arr = $disFuns;
	}
	Function php()
	{
	}
	echo "<pre>";
	Echo "������ʾϵͳ�����õĺ���\n";
	print_r($arr);
	echo "</pre>";
	exit();
}

//MySQL���
if ($_POST['act'] == 'MySQL���')
{
	$host = isset($_POST['host']) ? trim($_POST['host']) : '';
	$port = isset($_POST['port']) ? (int) $_POST['port'] : '';
	$login = isset($_POST['login']) ? trim($_POST['login']) : '';
	$password = isset($_POST['password']) ? trim($_POST['password']) : '';
	$host = preg_match('~[^a-z0-9\-\.]+~i', $host) ? '' : $host;
	$port = intval($port) ? intval($port) : '';
	$login = preg_match('~[^a-z0-9\_\-]+~i', $login) ? '' : htmlspecialchars($login);
	$password = is_string($password) ? htmlspecialchars($password) : '';
}
elseif ($_POST['act'] == '�������')
{
	$funRe = "����".$_POST['funName']."֧��״���������".isfun1($_POST['funName']);
} 
elseif ($_POST['act'] == '�ʼ����')
{
	$mailRe = "�ʼ����ͼ����������";
	if($_SERVER['SERVER_PORT']==80){$mailContent = "http://".$_SERVER['SERVER_NAME'].($_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME']);}
	else{$mailContent = "http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT'].($_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME']);}
	$mailRe .= (false !== @mail($_POST["mailAdd"], $mailContent, "This is a test mail!\n\nhttp://lnmp.org")) ? "���":"ʧ��";
}	
	
// ��⺯��֧��
function isfun($funName = '')
{
    if (!$funName || trim($funName) == '' || preg_match('~[^a-z0-9\_]+~i', $funName, $tmp)) return '����';
	return (false !== function_exists($funName)) ? '<font color="green">��</font>' : '<font color="red">��</font>';
}
function isfun1($funName = '')
{
    if (!$funName || trim($funName) == '' || preg_match('~[^a-z0-9\_]+~i', $funName, $tmp)) return '����';
	return (false !== function_exists($funName)) ? '��' : '��';
}

 
 ?>