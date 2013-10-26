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

