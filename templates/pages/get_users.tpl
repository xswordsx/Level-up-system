<br />
<<<<<<< HEAD
{literal}
<script>
function Get_users() {
	var id=$('#class_id').val();
	window.location=CONFIG_HOST+'/?page=teacher&action=get_users&flag='+id;
	
}
</script>
{/literal}
<div class="input-group input-group-lg">	
	<span class="input-group-addon">Моля изберете клас</span>		
    <select onchange="Get_users();" id="class_id" class="form-control class-select">
    <option value="0" selected="selected">{$lang.select}</option>
        {html_options options=$classes selected=$flag}    
    </select>
</div>
<div class="row">
	<div class="span4 offset4">
		{if $list}<table class="students">
		<thead>
			<tr>
				<th class="name">Име</th>
				<th class="character-info">Информация</th>
				<th class="spells">Умения</th>
				<th class="appoints">Точки действие</th>
			</tr>
		</thead>
		{section loop=$list name=val}
		<tr class="{cycle values="odd,even"}">
			<td>{$list[val].Name}</td>
			<td>{$list[val].character_name}<br /> <span class="span_level">Ниво : {$list[val].level}</span>
			</td>
			<td>
			{section loop=$list[val].skills name=val1}
			<img skillid="{$list[val].skills[val1].Id}" class="skillicon"src="{$CONFIG_HOST}/{$list[val].skills[val1].src}" onclick="onSkillClick('{$list[val].Id}','{$list[val].skills[val1].Id}')"/>
			{/section}
			</td>
			<td> {$list[val].Ap} ap </td>
		</tr>	
		{/section}
		</table>
		{/if}
	<div>
</div>
{literal}
<script>
	function onSkillClick(uid,sid){
		console.log(uid,sid)
		requester.getJSON("api.php/use_skill/"+uid+"/"+sid).then(function(data){
			console.log(data)
			if(data.success="1"){
				console.log("happy")
			}else{
				console.log("sad");
			}
		});
	};
	
</script>
{/literal}



=======
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
>>>>>>> 4be174baba1912d36576f3bc152e9b76f8b24045

