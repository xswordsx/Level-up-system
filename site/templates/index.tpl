<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>magicschool</title>
</head>

<body>
{$result}
<div id="menu">
{if !$user_info}
{include file='pages/login.tpl'}
<a href="{$CONFIG_HOST}/index.php?page=register">register</a>
{else}
{if $user_info.access_level eq '1'}
<a href="{$CONFIG_HOST}/index.php?page=register">register</a>
{/if}
<a href="{$CONFIG_HOST}/index.php?page=logout">logout</a>
{/if}
</div>
{if $page eq 'register'} {include file='pages/register.tpl'}{/if}
{if $page eq 'student'} {include file='templates/pages/student.tpl'}{/if}
{if $page eq 'teacher' and $user_info.Access_level eq '2'} {include file='templates/pages/teacher.tpl'}{/if}
{if $page eq 'admin_class' and $user_info.Access_level eq '1'}{include file='templates/pages/admin_class.tpl'}{/if}

</body>
</html>
