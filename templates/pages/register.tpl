<<<<<<< HEAD
<div class="well register">
	<h1>{if $user_info.Access_level eq 1}Добавяне на учител{else}Регистрация{/if}</h1>
	<form action="{$CONFIG_HOST}" method="post">
		<div class="form-group">
		<input class="form-control" type="text" name="username" value="{$username}" placeholder="Потребителско име"/>
		</div>
		<div class="form-group">
		<input class="form-control" type="password" name="password" value="{$password}" placeholder="Парола"/>
		</div>
		<input class="form-control" type="name" name="name" value="{$name}" placeholder="Истинско име"/>

		{if !$user_info}
		<div class="form-group">
			<h4><span class="label label-default">Клас в училище</span></h4>
			<select name="class_in_school">
			 	<option value="0" selected="selected">{$lang.select}</option>
				{html_options options=$classes selected=$class_in_school}    
			</select>
		</div>
		{/if}
		<input class="form-control" type="hidden" name="page" value="{if $page eq 'index'}register{else}{$page}{/if}" />
        {if $user_info.Access_level eq 1} <input type="hidden" name="access_level" value="2" />{/if}
		<input class="form-control" type="hidden" name="action" value="{$action}" />
		<input class="btn btn-success btn-lg btn-block" type="submit" name="register" value="Регистрирай  {if !$user_info}се{/if}" />
	</form>
</div>
=======
<form action="{$CONFIG_HOST}" method="post">
username <input type="text" name="username" value="{$username}"/>
password <input type="password" name="password" value="{$password}" />
name <input type="name" name="name" value="{$name}" />

{if $user_info.Access_level eq 1}
access_level<select name="access_level">
	{html_options options=$access_levels selected=$access_level}    
</select>
{/if}
{if !$user_info}
class in school
<select name="class_in_school">
 	<option value="0" selected="selected">{$lang.select}</option>
	{html_options options=$classes selected=$class_in_school}    
</select>
character type
<select name="character_type">
 	<option value="0" selected="selected">{$lang.select}</option>
	{html_options options=$character_types selected=$character_type}    
</select>
{/if}
<input type="hidden" name="page" value="{$page}" />
<input type="submit" name="save" value="Register" />
</form>

>>>>>>> 4be174baba1912d36576f3bc152e9b76f8b24045
