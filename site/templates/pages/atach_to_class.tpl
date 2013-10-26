{if $action eq 'add'}
<form action="{$CONFIG_HOST}" method="post">
<select name="classes">
 	<option value="0" selected="selected">{$lang.select}</option>
	{html_options options=$classes}    
</select>
<input type="hidden" name="page" value="{$page}" />
<input type="hidden" name="action" value="{$action}" />
<input type="hidden" name="flag" value="{$flag}" />
<input type="submit" name="save" value="save" />
</form>
{/if}
{if !$action}
<a href="{$CONFIG_HOST}/?page={$page}&action={$action}&flag=add">add</a>
{section loop=$list name=val}
<br />
{$list[val].Name} <a href="{$CONFIG_HOST}/?page={$page}&action={$action}&flag=delete&id={$list[val].Id}">delete</a>
{/section}
{/if}

