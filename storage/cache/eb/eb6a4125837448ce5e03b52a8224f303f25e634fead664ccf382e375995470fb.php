<?php

/* so-techcity/template/extension/module/so_categories/default.twig */
class __TwigTemplate_9b5a9e82c7ba491226e722278a4dc51ab2af22ad524de7e8869bd0d70420986b extends Twig_Template
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
        if (((isset($context["theme"]) ? $context["theme"] : null) == "theme4")) {
            // line 2
            echo "\t<script type=\"text/javascript\">
\t\t//<![CDATA[
\t\tjQuery(document).ready(function (\$) {
\t\t\t;
\t\t\t(function (element) {
\t\t\t\tvar \$element = \$(element);
\t\t\t\t\$(window).load(function () {
\t\t\t\t\t\$element.imagesLoaded(function () {
\t\t\t\t\t});
\t\t\t\t});
\t\t\t\t\$element.imagesLoaded(function () {

\t\t\t\t\t\$element.so_accordion({
\t\t\t\t\t\titems: '.so-categories-inner',
\t\t\t\t\t\theading: '.so-categories-heading',
\t\t\t\t\t\tcontent: '.so-categories-content',
\t\t\t\t\t\tactive_class: 'selected',
\t\t\t\t\t\tevent: '";
            // line 19
            echo (isset($context["accmouseenter"]) ? $context["accmouseenter"] : null);
            echo "',
\t\t\t\t\t\tdelay: 300,
\t\t\t\t\t\tduration: 500,
\t\t\t\t\t\tactive: '1'
\t\t\t\t\t});

\t\t\t\t\tvar height_content = function () {
\t\t\t\t\t\t\$('.so-categories-inner', \$element).each(function () {
\t\t\t\t\t\t\tvar \$inner = \$('.so-categories-content', \$(this).filter('.selected'));
\t\t\t\t\t\t\t\$inner.css('height', 'auto');
\t\t\t\t\t\t\tif (\$inner.length) {
\t\t\t\t\t\t\t\tvar inner_height = \$inner.height();
\t\t\t\t\t\t\t\t\$inner.css('height', inner_height);
\t\t\t\t\t\t\t}
\t\t\t\t\t\t});
\t\t\t\t\t}
\t\t\t\t\t\$(window).resize(function () {
\t\t\t\t\t\theight_content();
\t\t\t\t\t});
\t\t\t\t\t\$(window).load(function () {
\t\t\t\t\t\theight_content();
\t\t\t\t\t});
\t\t\t\t});
\t\t\t})('#";
            // line 42
            echo (isset($context["uniqued"]) ? $context["uniqued"] : null);
            echo "')

\t\t});
\t\t//]]>
\t</script>
";
        }
        // line 48
        echo "
<!--[if lt IE 9]>
<div id=\"";
        // line 50
        echo (isset($context["uniqued"]) ? $context["uniqued"] : null);
        echo "\" class=\"so-categories module ";
        echo (isset($context["theme"]) ? $context["theme"] : null);
        echo " ";
        echo (isset($context["deviceclass_sfx"]) ? $context["deviceclass_sfx"] : null);
        echo " ";
        echo (isset($context["columnclass_sfx"]) ? $context["columnclass_sfx"] : null);
        echo " msie lt-ie9\"><![endif]-->
<!--[if IE 9]>
<div id=\"";
        // line 52
        echo (isset($context["uniqued"]) ? $context["uniqued"] : null);
        echo "\" class=\"so-categories module ";
        echo (isset($context["theme"]) ? $context["theme"] : null);
        echo " ";
        echo (isset($context["deviceclass_sfx"]) ? $context["deviceclass_sfx"] : null);
        echo " ";
        echo (isset($context["columnclass_sfx"]) ? $context["columnclass_sfx"] : null);
        echo " msie\"><![endif]-->
<!--[if gt IE 9]><!-->
<div id=\"";
        // line 54
        echo (isset($context["uniqued"]) ? $context["uniqued"] : null);
        echo "\" class=\"so-categories module ";
        echo (isset($context["theme"]) ? $context["theme"] : null);
        echo " ";
        echo (isset($context["deviceclass_sfx"]) ? $context["deviceclass_sfx"] : null);
        echo " ";
        echo (isset($context["columnclass_sfx"]) ? $context["columnclass_sfx"] : null);
        echo "\">
\t";
        // line 55
        if ((isset($context["disp_title_module"]) ? $context["disp_title_module"] : null)) {
            // line 56
            echo "\t<h3 class=\"modtitle\"><span>";
            echo (isset($context["head_name"]) ? $context["head_name"] : null);
            echo "</span></h3>
\t";
        }
        // line 58
        echo "\t
\t";
        // line 59
        if (((isset($context["pre_text"]) ? $context["pre_text"] : null) != "")) {
            // line 60
            echo "\t
\t\t";
            // line 61
            echo (isset($context["pre_text"]) ? $context["pre_text"] : null);
            echo "

\t";
        }
        // line 64
        echo "
\t<div class=\"modcontent\">
\t\t";
        // line 66
        if (( !twig_test_empty((isset($context["list"]) ? $context["list"] : null)) && twig_length_filter($this->env, (isset($context["list"]) ? $context["list"] : null)))) {
            // line 67
            echo "\t\t\t";
            echo twig_include($this->env, $context, ((((isset($context["theme_config"]) ? $context["theme_config"] : null) . "/template/extension/module/so_categories/default_") . (isset($context["theme"]) ? $context["theme"] : null)) . ".twig"));
            echo "
\t\t";
        } else {
            // line 69
            echo "\t\t\t";
            echo $this->getAttribute((isset($context["objlang"]) ? $context["objlang"] : null), "get", array(0 => "text_noitem"), "method");
            echo "
\t\t";
        }
        // line 71
        echo "\t</div>

\t";
        // line 73
        if (((isset($context["post_text"]) ? $context["post_text"] : null) != "")) {
            // line 74
            echo "\t<div class=\"form-group\">
\t\t";
            // line 75
            echo (isset($context["post_text"]) ? $context["post_text"] : null);
            echo "
\t</div>
\t";
        }
        // line 78
        echo "</div>

";
    }

    public function getTemplateName()
    {
        return "so-techcity/template/extension/module/so_categories/default.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  166 => 78,  160 => 75,  157 => 74,  155 => 73,  151 => 71,  145 => 69,  139 => 67,  137 => 66,  133 => 64,  127 => 61,  124 => 60,  122 => 59,  119 => 58,  113 => 56,  111 => 55,  101 => 54,  90 => 52,  79 => 50,  75 => 48,  66 => 42,  40 => 19,  21 => 2,  19 => 1,);
    }
}
/* {% if theme == 'theme4' %}*/
/* 	<script type="text/javascript">*/
/* 		//<![CDATA[*/
/* 		jQuery(document).ready(function ($) {*/
/* 			;*/
/* 			(function (element) {*/
/* 				var $element = $(element);*/
/* 				$(window).load(function () {*/
/* 					$element.imagesLoaded(function () {*/
/* 					});*/
/* 				});*/
/* 				$element.imagesLoaded(function () {*/
/* */
/* 					$element.so_accordion({*/
/* 						items: '.so-categories-inner',*/
/* 						heading: '.so-categories-heading',*/
/* 						content: '.so-categories-content',*/
/* 						active_class: 'selected',*/
/* 						event: '{{ accmouseenter }}',*/
/* 						delay: 300,*/
/* 						duration: 500,*/
/* 						active: '1'*/
/* 					});*/
/* */
/* 					var height_content = function () {*/
/* 						$('.so-categories-inner', $element).each(function () {*/
/* 							var $inner = $('.so-categories-content', $(this).filter('.selected'));*/
/* 							$inner.css('height', 'auto');*/
/* 							if ($inner.length) {*/
/* 								var inner_height = $inner.height();*/
/* 								$inner.css('height', inner_height);*/
/* 							}*/
/* 						});*/
/* 					}*/
/* 					$(window).resize(function () {*/
/* 						height_content();*/
/* 					});*/
/* 					$(window).load(function () {*/
/* 						height_content();*/
/* 					});*/
/* 				});*/
/* 			})('#{{ uniqued }}')*/
/* */
/* 		});*/
/* 		//]]>*/
/* 	</script>*/
/* {% endif %}*/
/* */
/* <!--[if lt IE 9]>*/
/* <div id="{{ uniqued }}" class="so-categories module {{ theme }} {{ deviceclass_sfx }} {{ columnclass_sfx }} msie lt-ie9"><![endif]-->*/
/* <!--[if IE 9]>*/
/* <div id="{{ uniqued }}" class="so-categories module {{ theme }} {{ deviceclass_sfx }} {{ columnclass_sfx }} msie"><![endif]-->*/
/* <!--[if gt IE 9]><!-->*/
/* <div id="{{ uniqued }}" class="so-categories module {{ theme }} {{ deviceclass_sfx }} {{ columnclass_sfx }}">*/
/* 	{% if disp_title_module %}*/
/* 	<h3 class="modtitle"><span>{{ head_name }}</span></h3>*/
/* 	{% endif %}*/
/* 	*/
/* 	{% if pre_text != '' %}*/
/* 	*/
/* 		{{ pre_text }}*/
/* */
/* 	{% endif %}*/
/* */
/* 	<div class="modcontent">*/
/* 		{% if list is not empty and list|length %}*/
/* 			{{ include (theme_config~"/template/extension/module/so_categories/default_"~theme~".twig") }}*/
/* 		{% else %}*/
/* 			{{ objlang.get('text_noitem') }}*/
/* 		{% endif %}*/
/* 	</div>*/
/* */
/* 	{% if post_text != '' %}*/
/* 	<div class="form-group">*/
/* 		{{ post_text }}*/
/* 	</div>*/
/* 	{% endif %}*/
/* </div>*/
/* */
/* */
