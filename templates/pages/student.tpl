heloooooo
<div id="wrapper">
    <div id="skills">
    </div>
    </div>
    <script>
        function addSkill(id){
            var skillNode = $("#skill-"+id).css("border", "5px solid red");
            skillNode.className = "activated";

        }
        var skillNodes = [
            {id: 1,level:0, depth:1, src:"../img/icon1.jpg"},
            {id: 2,level:1, depth:0, src:"../img/icon1.jpg"},
            {id: 3,level:1, depth:2, src:"../img/icon1.jpg"},
            {id: 4,level:2, depth:1, src:"../img/icon1.jpg"},
            {id: 5,level:2, depth:2, src:"../img/icon1.jpg"},
            {id: 6,level:3, depth:1, src:"../img/icon1.jpg"}
        ];
        (function renderSkillNodes(skills){
            for(var i = 0; i<skills.length; i++){
                var div = document.createElement("div");
                var img = document.createElement("img");
                img.src = skills[i].src;
                div.appendChild(img);
                div.className = "icon";
                div.style.position = "absolute";
                div.style.top = skills[i].level*110 + "px";
                div.style.left = skills[i].depth*100 + "px";
                div.id = "skill-"+skills[i].id;
                div.setAttribute("onclick","addSkill("+skills[i].id+")");
                $("#skills").append(div);
            }
        }(skillNodes));
    </script>
</div>