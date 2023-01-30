<?php

/* so-techcity/template/common/footer.twig */
class __TwigTemplate_652f99da89897c33a2ad4c180eaa243cad09fe3565d23a544015b85c865db20c extends Twig_Template
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
        // line 2
        echo "
";
        // line 3
        if (($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typefooter"), "method") == "1")) {
            // line 4
            echo "\t";
            $this->loadTemplate(((isset($context["theme_directory"]) ? $context["theme_directory"] : null) . "/template/footer/footer1.twig"), "so-techcity/template/common/footer.twig", 4)->display(array_merge($context, array("typefooter" => $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typefooter"), "method"))));
        } elseif (($this->getAttribute(        // line 5
(isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typefooter"), "method") == "2")) {
            // line 6
            echo "\t";
            $this->loadTemplate(((isset($context["theme_directory"]) ? $context["theme_directory"] : null) . "/template/footer/footer2.twig"), "so-techcity/template/common/footer.twig", 6)->display(array_merge($context, array("typefooter" => $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typefooter"), "method"))));
        } elseif (($this->getAttribute(        // line 7
(isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typefooter"), "method") == "3")) {
            // line 8
            echo "\t";
            $this->loadTemplate(((isset($context["theme_directory"]) ? $context["theme_directory"] : null) . "/template/footer/footer3.twig"), "so-techcity/template/common/footer.twig", 8)->display(array_merge($context, array("typefooter" => $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typefooter"), "method"))));
            // line 9
            echo "
";
        }
        // line 11
        echo "

<div id=\"previewModal\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\">
  <div class=\"modal-dialog modal-lg\" role=\"document\">
    <div class=\"modal-content\">
\t\t<div class=\"modal-header\">
\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
\t\t\t<h4 class=\"modal-title\"> ";
        // line 18
        echo $this->getAttribute((isset($context["objlang"]) ? $context["objlang"] : null), "get", array(0 => "text_alertaddtocart"), "method");
        echo "</h4>
\t\t</div>
\t\t<div class=\"modal-body\"></div>
    </div>
  </div>
</div>
";
        // line 25
        echo "
";
        // line 26
        if ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "social_sidebar"), "method")) {
            // line 27
            echo "\t";
            if (($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "social_sidebar"), "method") == 1)) {
                // line 28
                echo "\t\t";
                $context["social_sidebar"] = "socialwidgets-left";
                // line 29
                echo "\t";
            } else {
                // line 30
                echo "\t\t";
                $context["social_sidebar"] = "socialwidgets-right";
                // line 31
                echo "\t";
            }
            // line 32
            echo "\t<section class=\"social-widgets visible-lg ";
            echo (isset($context["social_sidebar"]) ? $context["social_sidebar"] : null);
            echo " \">
\t\t<ul class=\"items\">
\t\t\t";
            // line 34
            if ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "social_fb_status"), "method")) {
                echo " 
\t\t\t<li class=\"item item-01 facebook\">
\t\t\t\t<a href=\"catalog/view/theme/";
                // line 36
                echo (isset($context["theme_directory"]) ? $context["theme_directory"] : null);
                echo "/template/social/facebook.php?account_fb=";
                echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "facebook"), "method");
                echo " \" class=\"tab-icon\"><span class=\"fa fa-facebook\"></span></a>
\t\t\t\t<div class=\"tab-content\">
\t\t\t\t\t<div class=\"title\"><h5>FACEBOOK</h5></div>
\t\t\t\t\t<div class=\"loading\">
\t\t\t\t\t\t<img class=\"lazyload\" data-sizes=\"auto\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" data-src=\"catalog/view/theme/";
                // line 40
                echo (isset($context["theme_directory"]) ? $context["theme_directory"] : null);
                echo "/images/ajax-loader.gif\" class=\"ajaxloader\" alt=\"loader\">
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</li>
\t\t\t";
            }
            // line 44
            echo " 

\t\t\t";
            // line 46
            if ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "social_twitter_status"), "method")) {
                echo " 
\t\t\t<li class=\"item item-02 twitter\">
\t\t\t\t<a href=\"catalog/view/theme/";
                // line 48
                echo (isset($context["theme_directory"]) ? $context["theme_directory"] : null);
                echo "/template/social/twitter.php?account_twitter=";
                echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "twitter"), "method");
                echo " \" class=\"tab-icon\"><span class=\"fa fa-twitter\"></span></a>
\t\t\t\t<div class=\"tab-content\">
\t\t\t\t\t<div class=\"title\"><h5>TWITTER FEEDS</h5></div>
\t\t\t\t\t<div class=\"loading\">
\t\t\t\t\t\t<img class=\"lazyload\" data-sizes=\"auto\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" data-src=\"catalog/view/theme/";
                // line 52
                echo (isset($context["theme_directory"]) ? $context["theme_directory"] : null);
                echo "/images/ajax-loader.gif\" class=\"ajaxloader\" alt=\"loader\">
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</li>
\t\t\t";
            }
            // line 56
            echo " 

\t\t\t";
            // line 58
            if ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "social_custom_status"), "method")) {
                echo " 
\t\t\t<li class=\"item item-03 youtube\">
\t\t\t\t<div class=\"tab-icon\"><span class=\"fa fa-youtube\"></span></div>
\t\t\t\t<div class=\"tab-content\">
\t\t\t\t\t<div class=\"loading\">
\t\t\t\t\t\t";
                // line 63
                if ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "video_code"), "method")) {
                    // line 64
                    echo "\t\t\t\t\t\t\t\t";
                    echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "decode_entities", array(0 => $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "video_code"), "method")), "method");
                    echo "
\t\t\t\t\t\t";
                }
                // line 65
                echo " 
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</li>
\t\t\t";
            }
            // line 69
            echo " 
\t\t</ul>
\t</section>
\t
";
        }
        // line 73
        echo " 

</div>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "so-techcity/template/common/footer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  167 => 73,  160 => 69,  153 => 65,  147 => 64,  145 => 63,  137 => 58,  133 => 56,  125 => 52,  116 => 48,  111 => 46,  107 => 44,  99 => 40,  90 => 36,  85 => 34,  79 => 32,  76 => 31,  73 => 30,  70 => 29,  67 => 28,  64 => 27,  62 => 26,  59 => 25,  50 => 18,  41 => 11,  37 => 9,  34 => 8,  32 => 7,  29 => 6,  27 => 5,  24 => 4,  22 => 3,  19 => 2,);
    }
}
/* {# =========== Show Header==============#}*/
/* */
/* {% if soconfig.get_settings('typefooter') =='1'%}*/
/* 	{% include theme_directory~'/template/footer/footer1.twig' with {typefooter: soconfig.get_settings('typefooter')} %}*/
/* {% elseif soconfig.get_settings('typefooter') =='2'%}*/
/* 	{% include theme_directory~'/template/footer/footer2.twig' with {typefooter: soconfig.get_settings('typefooter')} %}*/
/* {% elseif soconfig.get_settings('typefooter') =='3'%}*/
/* 	{% include theme_directory~'/template/footer/footer3.twig' with {typefooter: soconfig.get_settings('typefooter')} %}*/
/* */
/* {% endif %}*/
/* */
/* */
/* <div id="previewModal" class="modal fade" tabindex="-1" role="dialog">*/
/*   <div class="modal-dialog modal-lg" role="document">*/
/*     <div class="modal-content">*/
/* 		<div class="modal-header">*/
/* 			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>*/
/* 			<h4 class="modal-title"> {{objlang.get('text_alertaddtocart') }}</h4>*/
/* 		</div>*/
/* 		<div class="modal-body"></div>*/
/*     </div>*/
/*   </div>*/
/* </div>*/
/* {# =========== Show BackToTop==============#}*/
/* */
/* {% if soconfig.get_settings('social_sidebar')  %}*/
/* 	{% if soconfig.get_settings('social_sidebar') == 1 %}*/
/* 		{% set  social_sidebar = 'socialwidgets-left'%}*/
/* 	{% else %}*/
/* 		{% set  social_sidebar = 'socialwidgets-right'%}*/
/* 	{% endif %}*/
/* 	<section class="social-widgets visible-lg {{social_sidebar}} ">*/
/* 		<ul class="items">*/
/* 			{% if soconfig.get_settings('social_fb_status') %} */
/* 			<li class="item item-01 facebook">*/
/* 				<a href="catalog/view/theme/{{ theme_directory }}/template/social/facebook.php?account_fb={{soconfig.get_settings('facebook')}} " class="tab-icon"><span class="fa fa-facebook"></span></a>*/
/* 				<div class="tab-content">*/
/* 					<div class="title"><h5>FACEBOOK</h5></div>*/
/* 					<div class="loading">*/
/* 						<img class="lazyload" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="catalog/view/theme/{{ theme_directory }}/images/ajax-loader.gif" class="ajaxloader" alt="loader">*/
/* 					</div>*/
/* 				</div>*/
/* 			</li>*/
/* 			{% endif %} */
/* */
/* 			{% if soconfig.get_settings('social_twitter_status') %} */
/* 			<li class="item item-02 twitter">*/
/* 				<a href="catalog/view/theme/{{ theme_directory }}/template/social/twitter.php?account_twitter={{ soconfig.get_settings('twitter')}} " class="tab-icon"><span class="fa fa-twitter"></span></a>*/
/* 				<div class="tab-content">*/
/* 					<div class="title"><h5>TWITTER FEEDS</h5></div>*/
/* 					<div class="loading">*/
/* 						<img class="lazyload" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="catalog/view/theme/{{ theme_directory }}/images/ajax-loader.gif" class="ajaxloader" alt="loader">*/
/* 					</div>*/
/* 				</div>*/
/* 			</li>*/
/* 			{% endif %} */
/* */
/* 			{% if soconfig.get_settings('social_custom_status') %} */
/* 			<li class="item item-03 youtube">*/
/* 				<div class="tab-icon"><span class="fa fa-youtube"></span></div>*/
/* 				<div class="tab-content">*/
/* 					<div class="loading">*/
/* 						{% if soconfig.get_settings('video_code') %}*/
/* 								{{ soconfig.decode_entities( soconfig.get_settings('video_code') ) }}*/
/* 						{% endif %} */
/* 					</div>*/
/* 				</div>*/
/* 			</li>*/
/* 			{% endif %} */
/* 		</ul>*/
/* 	</section>*/
/* 	*/
/* {% endif %} */
/* */
/* </div>*/
/* </body>*/
/* </html>*/
