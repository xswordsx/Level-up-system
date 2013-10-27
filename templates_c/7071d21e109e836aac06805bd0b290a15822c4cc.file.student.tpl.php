<?php /* Smarty version Smarty-3.1.8, created on 2013-10-27 04:35:48
         compiled from "templates/pages/student.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1277622966526bb09fd2cf19-46261248%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7071d21e109e836aac06805bd0b290a15822c4cc' => 
    array (
      0 => 'templates/pages/student.tpl',
      1 => 1382848537,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1277622966526bb09fd2cf19-46261248',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_526bb09fd6a805_99129492',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526bb09fd6a805_99129492')) {function content_526bb09fd6a805_99129492($_smarty_tpl) {?><div id="wrapper">
    <div id="success-message" class="success">
        &nbsp;
    </div>
    <div id="error-message" class="error">
        &nbsp;
    </div>
    <div id="user_info" style="min-height:100%; position:relative;">
        <div id="skills" style="width: 300px; float: left;">
        </div>
        <div id="character_pic" style="width: 200px; float: right;">
        </div>
        <div style="position: absolute; top: 400px; background: #000; opacity: 0.5; color: white; padding: 10px; position: absolute; left: -30px; height: 64px; border-bottom-left-radius: 5px;">
            <p><b>Skill points: <span id="spell_power"></span></b></p>
            <p><b>Level: <span id="level"></span></b></p>
        </div>
        <div id="description" style="position: fixed; z-index: 1; background: #000; opacity: 0.8; color: white; padding: 6px 8px; width: 200px; display: none;"></div>
        <div id="code" style="position: absolute; top: 330px; left: 520px; width: 250px;  border: 1px solid black; border-radius: 5px; -moz-border-radius: 5px;
    	padding: 5px; border-width:2px; border-style:solid; border-color:rgba(52,28,14,0.2); background-color:#110e0d; color:#909090">
        Моля въведете кода, за да получите точки
            <input type="text" class="form-control enter_code" id="codeValue" />
            <button id="submitCode" class="btn btn-default" style="margin-left: 40px;margin-top: 5px; height: 24px; width:150px;text-align: center;line-height: 10px; background: url(http://magicschool.g-georgiev.com/img/enter-code.png);border:0px !important"></button>
        </div>
        <div id="xp_bar" style="position:absolute; bottom:-34px; left:-35px; width: 832px; background: url('img/xp-bar.png'); height: 68px;">
            <div style="margin-left: 340px; margin-top: 5px; color: white; text-weight: bold;">
                XP: 
                <span id="current-xp"></span>
                /
                <span id="max-xp"></span>
            </div>
            <div class="progress" style="margin-top: 10px; margin-left: 3px; width: 827px; height: 29px; padding-left: 10px; padding-right: 10px;">
              <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 50%;height: 15px;margin-top: 6px;border-radius: 6px;">
                <span class="sr-only">asdasd</span>
              </div>
            </div>
        </div>
        <script>
		$('#error-message').hide();
		$('#success-message').hide();
		
            $("#submitCode").click(function(){
                var codeInput = $("#codeValue").val();
                requester.getJSON("api.php/activate_code/"+uid+"/"+codeInput).then(function(data){
                    if(data.success == 1){
                        $("#current-xp").text(data.user_info.Xp);
                        $("#max-xp").text(100*data.user_info.level+50*(data.user_info.level-1));
						$('.progress-bar').css("width", data.user_info.Xp/(100*data.user_info.level+50*(data.user_info.level-1))*100+"%");
						$('.progressbar').attr("", data.Xp);
                        $("#spell_power").text(data.user_info.Sp);
                        $("#level").text(data.user_info.level);
                        $("#codeValue").val("");
						var msg=data.status;
						if(data.result)msg+='.<br> '+data.result;
                        $("#success-message").html(msg);
                        $("#success-message").show();;
                        setTimeout(function(){
                            $("#success-message").hide();
                        },8000);
                    }
                    else
                    {
                        $("#error-message").text(data.status);
                        $("#error-message").show();
                        setTimeout(function(){
                            $("#error-message").hide();
                        },8000);
                    }
                }, function(data){
                    if(data.success == 1){
                        $("#success-message").text(data.status);
                        setTimeout(function(){
                            $("#success-message").hide();
                        },8000);
                    }
                    else
                    {
                        $("#error-message").text(data.status);
                        setTimeout(function(){
                            $("#error-message").hide();
                        },8000);
                    }
                });
            });

            function removeDescription()
            {
                $("#description").hide();
            }

            function showDescription(name,desc, parents)
            {
				
				var X=event.clientX + document.body.scrollLeft;
				var Y=event.clientY + document.body.scrollTop;
                var description = "<h3>"+name+"</h3><p>"+desc+"</p>";
                if(parents.length > 0){
                    description+="<p>Трябва да сте вдигнали: <span style='color: red;'>";
                    for (var i = 0; i <parents.length; i++) {
                        description+=parents[i];
                    }
                    description+="</span></p>";
                }
				$("#description").css('left',X);
				$("#description").css('top',Y);
                $("#description").html(description).show();
            }

            function addSkill(id){
                requester.getJSON("api.php/get_skill/"+uid+"/"+id).then(function(data){
                    if(data.success == 1)
                    {
                        $("#spell_power").text($("#spell_power").text()-1);
                        $("#success-message").text(data.status);
                        $("#success-message").show();
                        setTimeout(function(){
                            $("#success-message").hide();
                        },4000);
                        var skillNode = $("#skill-"+id).css("opacity", "1");
                        skillNode.className = "activated";
                    }
                    else
                    {
                        $("#error-message").text(data.status);
                        $("#error-message").show();

                        setTimeout(function(){
                            $("#error-message").hide();
                        },4000);
                    }
                }, function(data){
                    if(data.success == 1){
                        $("#success-message").text(data.status);
                        $("#success-message").show();
                        setTimeout(function(){
                            $("#success-message").hide();
                        },4000);
                    }
                    else
                    {
                        $("#error-message").text(data.status);
                        $("#error-message").show();
                        setTimeout(function(){
                            $("#error-message").hide();
                        },4000);
                    }
                });
            }
            var skills = new Array();
            requester.getJSON("api.php/user_info/"+uid).then(function(data){
                for (var i = 0; i < data.skills.length; i++) {
                    skills.push(data.skills[i].Skills_Id);
                }
                $("#wrapper").css("background", "url('"+data.src+"')");
                $('.progress-bar').css("width", data.Xp/(100*data.level+50*(data.level-1))*100+"%");
                $('.progressbar').attr("", data.Xp);
                $("#spell_power").text(data.Sp);
                $("#level").text(data.level);
                $("#current-xp").text(data.Xp);
                $("#max-xp").text(100*data.level+50*(data.level-1));

                requester.getJSON("api.php/character_skills/"+uid).then(function(data){
                    for(var i = 0; i<data.length; i++){
                        var div = document.createElement("div");
                        var img = document.createElement("img");
                        img.src = CONFIG_HOST+data[i].src;
                        img.width = "50";
                        img.height = "50";
                        div.appendChild(img);
                        div.className = "icon";
                        div.style.position = "absolute";
                        div.style.top = data[i].level*80 + "px";
                        div.style.left = data[i].depth*75 + "px";
                        div.id = "skill-"+data[i].Id;
                        div.setAttribute("onclick","addSkill("+data[i].Id+")");
                        var parents = new Array();
                        if(data[i].parent){
                            for(var j = 0; j < data[i].parent.length; j++){
                                parents.push(data[i].parent[j].Name);
                            }
                        }
                        div.setAttribute("onmouseover","showDescription('"+data[i].Name+"','"+data[i].Description+"','"+parents+"')");
                        div.setAttribute("onmouseout","removeDescription()");

                        if(skills.indexOf(data[i].Id) != -1)
                        {
                            div.className = "activated";
                            div.style.opacity = 1;
                        }
                        else
                        {
                            div.style.opacity = 0.5;
                        }

                        $("#skills").append(div);
                    }
                }, function(){
                    console.log("error");
                });
            }, function(){
                console.log("error");
            });

            
            
        </script>
    </div>
</div><?php }} ?>