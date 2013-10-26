<form action="{$CONFIG_HOST}" method="post">
xp:<input type="text" name="xp" value="{$xp}" />
ap: <input type="text" name="ap" value="{$ap}" />
broi: <input type="text" name="count" value="{$count}" />
<input type="hidden" name="page" value="{$page}" />
<input type="hidden" name="action" value="{$action}" />
<input type="submit" name="generate" value="generate" />
</form>

{section loop=$list name=val}
{$list[val]}<br />

{/section}
