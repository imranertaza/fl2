<?php

/* so-techcity/template/extension/module/so_countdown/default.twig */
class __TwigTemplate_d0bd769efe7f6614c30269b1d0afdc80e7bccf67f06a8b85ff416b32316dbc2b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        if ( !twig_test_empty((isset($context["result"]) ? $context["result"] : null))) {
            // line 2
            echo "<script type=\"text/javascript\">
//<![CDATA[
    data = new Date(2013,10,26,12,00,00);
    var listdeal = [];
    function CountDown(date,id){
        dateNow = new Date();
        amount = date.getTime() - dateNow.getTime();
        delete dateNow;
        if(amount < 0){
            document.getElementById(id).innerHTML=\"Now!\";
        } else{
            days=0;hours=0;mins=0;secs=0;out=\"\";
            amount = Math.floor(amount/1000);
            days=Math.floor(amount/86400);
            amount=amount%86400;
            hours=Math.floor(amount/3600);
            amount=amount%3600;
            mins=Math.floor(amount/60);
            amount=amount%60;
            secs=Math.floor(amount);
            if(days != 0){out += \"<div class='time-item time-day'>\" + \"<div class='num-time'>\" + days + \"</div>\" +\" <div class='name-time'>\"+((days==1)?\"Day\":\"Days\") + \"</div>\"+\"</div> \";}
            if(hours != 0){out += \"<div class='time-item time-hour'>\" + \"<div class='num-time'>\" + hours + \"</div>\" +\" <div class='name-time'>\"+((hours==1)?\"Hour\":\"Hours\") + \"</div>\"+\"</div> \";}
            out += \"<div class='time-item time-min'>\" + \"<div class='num-time'>\" + mins + \"</div>\" +\" <div class='name-time'>\"+((mins==1)?\"Min\":\"Mins\") + \"</div>\"+\"</div> \";
            out += \"<div class='time-item time-sec'>\" + \"<div class='num-time'>\" + secs + \"</div>\" +\" <div class='name-time'>\"+((secs==1)?\"Sec\":\"Secs\") + \"</div>\"+\"</div> \";
            out = out.substr(0,out.length-2);
            document.getElementById(id).innerHTML=out;
            setTimeout(function(){CountDown(date,id)}, 1000);
        }
    }
//]]>
</script>

<div id=\"so_popup_countdown\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" style=\"opacity: ";
            // line 34
            echo $this->getAttribute((isset($context["result"]) ? $context["result"] : null), "opacity", array());
            echo "\">
    <div class=\"modal-dialog\" style=\"width: ";
            // line 35
            echo ($this->getAttribute((isset($context["result"]) ? $context["result"] : null), "width", array()) . "px");
            echo "; height: auto;\">
        <div class=\"modal-header\">
            <h2>";
            // line 37
            echo $this->getAttribute((isset($context["result"]) ? $context["result"] : null), "heading_title", array());
            echo "</h2>
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\" onclick=\"dontShowPopup();\">&times;</button>
        </div>
        <div class=\"modal-content\">
            ";
            // line 41
            echo $this->getAttribute((isset($context["result"]) ? $context["result"] : null), "description", array());
            echo "
        </div>
        <div class=\"modal-footer\">
            ";
            // line 44
            if ($this->getAttribute((isset($context["result"]) ? $context["result"] : null), "image", array())) {
                // line 45
                echo "                ";
                if ($this->getAttribute((isset($context["result"]) ? $context["result"] : null), "link", array())) {
                    // line 46
                    echo "                    <a href=\"";
                    echo $this->getAttribute((isset($context["result"]) ? $context["result"] : null), "link", array());
                    echo "\" target=\"_blank\">
                        <img class=\"img-responsive lazyload\" data-sizes=\"auto\" src=\"image/loading.svg\" data-src=\"image/";
                    // line 47
                    echo $this->getAttribute((isset($context["result"]) ? $context["result"] : null), "image", array());
                    echo "\" alt=\"";
                    echo $this->getAttribute((isset($context["result"]) ? $context["result"] : null), "name", array());
                    echo "\" style=\"max-width: ";
                    echo ($this->getAttribute((isset($context["result"]) ? $context["result"] : null), "width", array()) . "px");
                    echo "\" />
                    </a>
                ";
                } else {
                    // line 50
                    echo "                    <img class=\"img-responsive lazyload\" data-sizes=\"auto\" src=\"image/loading.svg\" data-src=\"image/";
                    echo $this->getAttribute((isset($context["result"]) ? $context["result"] : null), "image", array());
                    echo "\" alt=\"";
                    echo $this->getAttribute((isset($context["result"]) ? $context["result"] : null), "name", array());
                    echo "\" style=\"max-width: ";
                    echo ($this->getAttribute((isset($context["result"]) ? $context["result"] : null), "width", array()) . "px");
                    echo "\" />
                ";
                }
                // line 52
                echo "            ";
            }
            // line 53
            echo "            ";
            if (($this->getAttribute((isset($context["result"]) ? $context["result"] : null), "display_countdown", array(), "any", true, true) && ($this->getAttribute((isset($context["result"]) ? $context["result"] : null), "display_countdown", array()) == 1))) {
                // line 54
                echo "            <div id=\"so_countdown_timer\"></div>
            <script type=\"text/javascript\">
            //<![CDATA[
                listdeal.push('so_countdown_timer";
                // line 57
                echo ("&&||&&" . $this->getAttribute((isset($context["result"]) ? $context["result"] : null), "end_date", array()));
                echo "');
            //]]>
            </script> 
            ";
            }
            // line 61
            echo "        </div>
    </div>
</div>
<script>
    function dontShowPopup(){
        \$.cookie('so_visited', 'yes', { expires: 1 });
    }
    jQuery(document).ready(function(\$) {
        var so_visited = \$.cookie('so_visited');
        if (so_visited == 'yes') {
            return false;
        } else {
            \$('#so_popup_countdown').modal();
        }
    });
</script>

<script type=\"text/javascript\">
//<![CDATA[
window.onload=function(){
    if(listdeal.length > 0){
        for(i=0;i<listdeal.length;i++)
        {
            var arr = listdeal[i].split(\"&&||&&\"); 
            var data = new Date(arr[1]);
            CountDown(data, arr[0]);
        }   
    }
};
//]]>
</script>
";
        }
    }

    public function getTemplateName()
    {
        return "so-techcity/template/extension/module/so_countdown/default.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 61,  118 => 57,  113 => 54,  110 => 53,  107 => 52,  97 => 50,  87 => 47,  82 => 46,  79 => 45,  77 => 44,  71 => 41,  64 => 37,  59 => 35,  55 => 34,  21 => 2,  19 => 1,);
    }
}
/* {% if result is not empty %}*/
/* <script type="text/javascript">*/
/* //<![CDATA[*/
/*     data = new Date(2013,10,26,12,00,00);*/
/*     var listdeal = [];*/
/*     function CountDown(date,id){*/
/*         dateNow = new Date();*/
/*         amount = date.getTime() - dateNow.getTime();*/
/*         delete dateNow;*/
/*         if(amount < 0){*/
/*             document.getElementById(id).innerHTML="Now!";*/
/*         } else{*/
/*             days=0;hours=0;mins=0;secs=0;out="";*/
/*             amount = Math.floor(amount/1000);*/
/*             days=Math.floor(amount/86400);*/
/*             amount=amount%86400;*/
/*             hours=Math.floor(amount/3600);*/
/*             amount=amount%3600;*/
/*             mins=Math.floor(amount/60);*/
/*             amount=amount%60;*/
/*             secs=Math.floor(amount);*/
/*             if(days != 0){out += "<div class='time-item time-day'>" + "<div class='num-time'>" + days + "</div>" +" <div class='name-time'>"+((days==1)?"Day":"Days") + "</div>"+"</div> ";}*/
/*             if(hours != 0){out += "<div class='time-item time-hour'>" + "<div class='num-time'>" + hours + "</div>" +" <div class='name-time'>"+((hours==1)?"Hour":"Hours") + "</div>"+"</div> ";}*/
/*             out += "<div class='time-item time-min'>" + "<div class='num-time'>" + mins + "</div>" +" <div class='name-time'>"+((mins==1)?"Min":"Mins") + "</div>"+"</div> ";*/
/*             out += "<div class='time-item time-sec'>" + "<div class='num-time'>" + secs + "</div>" +" <div class='name-time'>"+((secs==1)?"Sec":"Secs") + "</div>"+"</div> ";*/
/*             out = out.substr(0,out.length-2);*/
/*             document.getElementById(id).innerHTML=out;*/
/*             setTimeout(function(){CountDown(date,id)}, 1000);*/
/*         }*/
/*     }*/
/* //]]>*/
/* </script>*/
/* */
/* <div id="so_popup_countdown" class="modal fade" tabindex="-1" role="dialog" style="opacity: {{ result.opacity }}">*/
/*     <div class="modal-dialog" style="width: {{ result.width~'px' }}; height: auto;">*/
/*         <div class="modal-header">*/
/*             <h2>{{ result.heading_title }}</h2>*/
/*             <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="dontShowPopup();">&times;</button>*/
/*         </div>*/
/*         <div class="modal-content">*/
/*             {{ result.description }}*/
/*         </div>*/
/*         <div class="modal-footer">*/
/*             {% if result.image %}*/
/*                 {% if result.link %}*/
/*                     <a href="{{ result.link }}" target="_blank">*/
/*                         <img class="img-responsive lazyload" data-sizes="auto" src="image/loading.svg" data-src="image/{{ result.image }}" alt="{{ result.name }}" style="max-width: {{ result.width~'px' }}" />*/
/*                     </a>*/
/*                 {% else %}*/
/*                     <img class="img-responsive lazyload" data-sizes="auto" src="image/loading.svg" data-src="image/{{ result.image }}" alt="{{ result.name }}" style="max-width: {{ result.width~'px' }}" />*/
/*                 {% endif %}*/
/*             {% endif %}*/
/*             {% if result.display_countdown is defined and result.display_countdown == 1 %}*/
/*             <div id="so_countdown_timer"></div>*/
/*             <script type="text/javascript">*/
/*             //<![CDATA[*/
/*                 listdeal.push('so_countdown_timer{{ "&&||&&"~result.end_date }}');*/
/*             //]]>*/
/*             </script> */
/*             {% endif %}*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/* <script>*/
/*     function dontShowPopup(){*/
/*         $.cookie('so_visited', 'yes', { expires: 1 });*/
/*     }*/
/*     jQuery(document).ready(function($) {*/
/*         var so_visited = $.cookie('so_visited');*/
/*         if (so_visited == 'yes') {*/
/*             return false;*/
/*         } else {*/
/*             $('#so_popup_countdown').modal();*/
/*         }*/
/*     });*/
/* </script>*/
/* */
/* <script type="text/javascript">*/
/* //<![CDATA[*/
/* window.onload=function(){*/
/*     if(listdeal.length > 0){*/
/*         for(i=0;i<listdeal.length;i++)*/
/*         {*/
/*             var arr = listdeal[i].split("&&||&&"); */
/*             var data = new Date(arr[1]);*/
/*             CountDown(data, arr[0]);*/
/*         }   */
/*     }*/
/* };*/
/* //]]>*/
/* </script>*/
/* {% endif %}*/
