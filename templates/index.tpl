<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<<<<<<< HEAD
<html xmlns="http://www.w3.org/1999/xhtml"><head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Magic School</title>
		<script src="../scripts/jquery-2.0.3.js"></script>
		<script src="../scripts/rsvp.min.js"></script>
		<script src="../scripts/httpRequester.js"></script>
		<link rel="stylesheet" type="text/css" href="../styles/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../styles/index.css" />
		<link rel="stylesheet" type="text/css" href="../styles/overridebootstrap.css">
        <script>
			var CONFIG_HOST='{$CONFIG_HOST}';
			var uid='{$user_info.Id}';
			
		</script>
        
        
	</head>
	<body>
		<div id="container" class="container" >
        <div id="success-msg" class="success">
            {$result}
        </div>
        <div id="error-msg" class="error">
            {$error}
        </div>
		{literal}
        <script>
		$('#error-msg').hide();
		$('#success-msg').hide();
		</script>
        {/literal}
		{if $result}
            {literal}
            <script>
				$("#success-msg").show();;
                        setTimeout(function(){
                            $("#success-msg").hide();
                        },5000);
            </script>
            {/literal}
        {/if}
		{if $error}
            {literal}
            <script>
				$("#error-msg").show();;
                        setTimeout(function(){
                            $("#error-msg").hide();
                        },5000);
            </script>
            {/literal}
        {/if}
			<div id="menu">
				{if !$user_info}
				{include file='pages/login.tpl'}
				{include file='pages/register.tpl'}
				{/if}
            {if $user_info.Access_level eq '1'}
                <nav class="navbar navbar-inverse" role="navigation" style="width: 100%;">
                    <div class="navbar-header" style="width: 100%;">
                        <ul ul class="nav navbar-nav" style="width: 98%;">
                            <li {if $action eq 'register'} class='active' {/if}><a href="{$CONFIG_HOST}/?page=admin&action=register">Добави нов учител</a></li>
                            <li {if $action eq 'admin_class'} class='active' {/if}><a href="{$CONFIG_HOST}/?page=admin&action=admin_class">Добави нов клас</a></li>
                            <li {if $action eq 'teachers_list'} class='active' {/if}><a href="{$CONFIG_HOST}/?page=admin&action=teachers_list">Списък с учители</a></li>
                            <li class="pull-right"><a href="{$CONFIG_HOST}/index.php?page=logout">Изход</a></li>
                            </ul>
                    </div>
                </nav>
             {/if}
             {if $user_info.Access_level eq '2'} 
                <nav class="navbar navbar-inverse" role="navigation" style="width: 100%;">
                    <div class="navbar-header" style="width: 100%;">
                        <ul ul class="nav navbar-nav" style="width: 98%;">
                            <li {if $action eq 'code_list'} class='active' {/if}><a href="{$CONFIG_HOST}/?page=teacher&action=code_list">Генериране на кодове</a></li>
                            <li {if $action eq 'get_users'} class='active' {/if}><a href="{$CONFIG_HOST}/?page=teacher&action=get_users">Ученици</a></li>
                            <li {if $action eq 'attach_to_class'} class='active' {/if}><a href="{$CONFIG_HOST}/?page=teacher&action=attach_to_class">Добави ме към клас</a> </li>
                            <li class="pull-right"><a href="{$CONFIG_HOST}/index.php?page=logout">Изход</a></li>
                            </ul>
                    </div>
                </nav>       
                {/if}     
            {if $page eq 'student'} {include file='templates/pages/student.tpl'}{/if}
			{if $page eq 'choose_hero'} {include file='templates/pages/choose_type.tpl'}{/if}
			{if $page eq 'teacher' and $user_info.Access_level ne '3' } {include file='templates/pages/teacher.tpl'}{/if}
			{if $page eq 'admin' and $user_info.Access_level eq '1'}{include file='templates/pages/admin.tpl'}{/if}
			</div>
		</div>
	</body>
=======
<html xmlns="http://www.w3.org/1999/xhtml">
<<<<<<< HEAD
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="../styles/bootstrap.min.css">
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
=======
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>magicschool</title>
<script src="../scripts/jquery-2.0.3.js"></script>
<script src="../scripts/rsvp.min.js"></script>
<script src="../scripts/httpRequester.js"></script>
<link rel="stylesheet" type="text/css" href="../styles/index.css" />
</head>
<body>
<div id="container">
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
</div>
</body>
>>>>>>> c4c65bf29b87f8cd3fa3acf7c5a0aef3b6dc32a9
>>>>>>> 4be174baba1912d36576f3bc152e9b76f8b24045
</html>
