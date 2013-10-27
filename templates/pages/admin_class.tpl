<<<<<<< HEAD

<form action="{$CONFIG_HOST}" method="post">
<table>
<tr>
<td>
	<div class="input-group input-group-lg">	
		<span class="input-group-addon">Име на клас</span>		
		<input type="text" name="name" class="form_input" />
    </div>
    </td>
    <td>
        <input type="hidden" name="page" value="{$page}" />
        <input type="hidden" name="action" value="{$action}" />
        <input class="btn btn-primary btn-lg" type="submit" name="save" style="margin-top:0 !important" value="Добави класа" />
    </td>
    </tr>
</table>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Списък от всички класове</div>
  <table class="table">
  	<td>
		<tr>
			<th>#</th>
			<th>Име</th>
			<th>Списък с учениците</th>
			<th>Изтриване на клас</th>
		</tr>
		{section loop=$list name=val}
		<tr>
			<td>{$smarty.section.val.index + 1}</td>
			<td>{$list[val].Name}</td>
			<td>
				<a href="{$CONFIG_HOST}/?page=teacher&action=get_users&flag={$list[val].Id}">Покажи списъкът от ученици</a>
			</td>
			<td><a href="{$CONFIG_HOST}/?page={$page}&action={$action}&flag=delete&id={$list[val].Id}">Изтрий</a></td>
		</tr>
	{/section}
	</td>
  </table>
</div>

=======
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
>>>>>>> 4be174baba1912d36576f3bc152e9b76f8b24045
