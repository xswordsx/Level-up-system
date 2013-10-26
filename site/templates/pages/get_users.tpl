<br />
{if !$flag}
{section loop=$list name=val}
<a href="{$CONFIG_HOST}/?page={$page}&action={$action}&flag={$list[val].Id}">{$list[val].Name}</a>
{/section}
{else}
{section loop=$list name=val}
{$list[val].Name} - {$list[val].Ap} ap
{section loop=$list[val].skills name=val1}
| {$list[val].skills[val1].Skills_Id}
{/section}
{/section}
{/if}

