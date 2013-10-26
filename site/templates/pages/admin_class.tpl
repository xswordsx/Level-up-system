{if $action eq 'add'}
<form action="{$CONFIG_HOST}" method="post">
class <input type="text" name="name" />
<input type="hidden" name="page" value="{$page}" />
<input type="hidden" name="action" value="{$action}" />
<input type="submit" name="save" value="save" />

</form>
{/if}
{if !$action}<br />
<a href="{$CONFIG_HOST}/?page={$page}&action=add">add</a>
{section loop=$list name=val}
<br />
{$list[val].Name} <a href="{$CONFIG_HOST}/?page={$page}&action=delete&id={$list[val].Id}">delete</a>
{/section}
{/if}
