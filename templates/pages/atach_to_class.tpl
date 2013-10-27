<<<<<<< HEAD
<br />
<form action="{$CONFIG_HOST}" method="post">
<table>
<tr>
<td>
	<div class="input-group input-group-lg">	
		<span class="input-group-addon">Моля изберете клас</span>		
		<select name="classes" class="form-control class-select">
			{html_options options=$classes}
		</select>
    </div>
    </td>
    <td>
        <input type="hidden" name="page" value="{$page}" />
        <input type="hidden" name="action" value="{$action}" />
        <input type="hidden" name="flag" value="add" />
        <input class="btn btn-primary btn-lg" type="submit" name="save" style="margin-top:0 !important" value="Добави ме в този клас" />
        </td>
        </tr>
        </table>
</form>

<br />
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Списък от класовете, които администрирам</div>
  <table class="table">
  	<td>
		<tr>
			<th>#</th>
			<th>Име</th>
			<th>Списък с учениците</th>
			<th>Изключване от клас</th>
		</tr>
		{section loop=$list name=val}
		<tr>
			<td>{$smarty.section.val.index + 1}</td>
			<td>{$list[val].Name}</td>
			<td>
				<a href="{$CONFIG_HOST}/?page={$page}&action=get_users&flag={$list[val].Id}">Покажи списъкът от ученици</a>
			</td>
			<td><a href="{$CONFIG_HOST}/?page={$page}&action={$action}&flag=delete&id={$list[val].Id}">Изключи ме!</a></td>
		</tr>
	{/section}
	</td>
  </table>
</div>
=======
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
>>>>>>> 4be174baba1912d36576f3bc152e9b76f8b24045

