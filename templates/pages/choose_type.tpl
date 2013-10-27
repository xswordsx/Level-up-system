<form action="{$CONFIRM_HOST}" method="get" id="character_type">
<input type="hidden" name="type" id="type"/>
</form>


<div id="container">
    <div id="wrapper-character">
        <div class="content">
            <h1>Hello, Adventurers !</h1>
            <span>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed hendrerit erat a suscipit sagittis.
                Proin semper dictum felis non faucibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Sed dapibus placerat adipiscing. Nullam viverra eros a dui venenatis, vitae sollicitudin mauris gravida.
            </span>
        </div>
        <div class="characters">
            <a href="javascript:void(0)" onclick="Send_form('1')"><img src="{$CONFIG_HOST}/img/characters/spellcaster-small.jpg"></a>
            <a href="javascript:void(0)" onclick="Send_form('2')"><img src="{$CONFIG_HOST}/img/characters/warrior-small.jpg"></a>
            <a href="javascript:void(0)" onclick="Send_form('3')"><img src="{$CONFIG_HOST}/img/characters/ranger-small.jpg"></a>
        </div>
    </div>
</div>



{literal}
<script>
function Send_form(type) {
	$('#type').val(type);
	$('#character_type').submit();
	
}
</script>
{/literal}