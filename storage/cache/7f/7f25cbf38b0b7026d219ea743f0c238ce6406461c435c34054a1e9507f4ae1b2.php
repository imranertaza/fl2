<?php

/* so-techcity/template/extension/module/so_quickview/default.twig */
class __TwigTemplate_b07715615fb09648467da77d4c2230541689f27ba2380b42cdd374386f9a2adc extends Twig_Template
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
        echo "<script type=\"text/javascript\">
\t
\tfunction _SoQuickView(){
\t\tvar windowWidth = window.innerWidth || document.documentElement.clientWidth;
\t\tif (windowWidth > 1200 ) {
\t\t\tvar \$item_class = \$('";
        // line 6
        echo (isset($context["class_suffix"]) ? $context["class_suffix"] : null);
        echo "');
\t\t\tif (\$item_class.length > 0) {
\t\t\t\tfor (var i = 0; i < \$item_class.length; i++) {
\t\t\t\t\tif(\$(\$item_class[i]).find('.quickview_handler').length <= 0){
\t\t\t\t\t\tvar \$product_id = \$(\$item_class[i]).find('a', \$(this)).attr('data-product');
\t\t\t\t\t\tif(\$.isNumeric(\$product_id) ){
\t\t\t\t\t\t\tvar _quickviewbutton = \"<a class='visible-lg btn-button quickview quickview_handler' href='";
        // line 12
        echo $this->getAttribute((isset($context["our_url"]) ? $context["our_url"] : null), "link", array(0 => "extension/soconfig/quickview", 1 => "product_id="), "method");
        echo "\"+\$product_id+\"' title=\\\"";
        echo (isset($context["label_text"]) ? $context["label_text"] : null);
        echo "\\\" data-title =\\\"";
        echo (isset($context["label_text"]) ? $context["label_text"] : null);
        echo "\\\" data-fancybox-type=\\\"iframe\\\" ><i class=\\\"pe-7s-search\\\"></i><span>";
        echo (isset($context["label_text"]) ? $context["label_text"] : null);
        echo "</span></a>\";
\t\t\t\t\t\t\t\$(\$item_class[i]).append(_quickviewbutton);
\t\t\t\t\t\t}
\t\t\t\t\t}
\t\t\t\t}
\t\t\t}
\t\t}
\t\t
\t}

\tjQuery(document).ready(function (\$) {
\t\t_SoQuickView();
\t\t// Hide tooltip when clicking on it
\t\tvar hasTooltip = \$(\"[data-toggle='tooltip']\").tooltip({container: 'body'});
\t\thasTooltip.on('click', function () {
\t\t\t\t\$(this).tooltip('hide')
\t\t});
\t});

\t
</script>";
    }

    public function getTemplateName()
    {
        return "so-techcity/template/extension/module/so_quickview/default.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 12,  26 => 6,  19 => 1,);
    }
}
/* <script type="text/javascript">*/
/* 	*/
/* 	function _SoQuickView(){*/
/* 		var windowWidth = window.innerWidth || document.documentElement.clientWidth;*/
/* 		if (windowWidth > 1200 ) {*/
/* 			var $item_class = $('{{ class_suffix }}');*/
/* 			if ($item_class.length > 0) {*/
/* 				for (var i = 0; i < $item_class.length; i++) {*/
/* 					if($($item_class[i]).find('.quickview_handler').length <= 0){*/
/* 						var $product_id = $($item_class[i]).find('a', $(this)).attr('data-product');*/
/* 						if($.isNumeric($product_id) ){*/
/* 							var _quickviewbutton = "<a class='visible-lg btn-button quickview quickview_handler' href='{{ our_url.link('extension/soconfig/quickview','product_id=') }}"+$product_id+"' title=\"{{ label_text }}\" data-title =\"{{ label_text }}\" data-fancybox-type=\"iframe\" ><i class=\"pe-7s-search\"></i><span>{{ label_text }}</span></a>";*/
/* 							$($item_class[i]).append(_quickviewbutton);*/
/* 						}*/
/* 					}*/
/* 				}*/
/* 			}*/
/* 		}*/
/* 		*/
/* 	}*/
/* */
/* 	jQuery(document).ready(function ($) {*/
/* 		_SoQuickView();*/
/* 		// Hide tooltip when clicking on it*/
/* 		var hasTooltip = $("[data-toggle='tooltip']").tooltip({container: 'body'});*/
/* 		hasTooltip.on('click', function () {*/
/* 				$(this).tooltip('hide')*/
/* 		});*/
/* 	});*/
/* */
/* 	*/
/* </script>*/
