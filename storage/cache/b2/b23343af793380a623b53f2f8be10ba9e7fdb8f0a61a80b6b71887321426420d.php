<?php

/* so-techcity/template/footer/footer1.twig */
class __TwigTemplate_6de39e7a2ec97daba1a0207d8d4bb5e922610f3938e8ae6b64c45bea3f311233 extends Twig_Template
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
        echo "

<footer class=\"footer-container typefooter-";
        // line 3
        echo (((isset($context["typefooter"]) ? $context["typefooter"] : null)) ? ((isset($context["typefooter"]) ? $context["typefooter"] : null)) : ("1"));
        echo "\">
\t";
        // line 4
        if ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "backtop"), "method")) {
            // line 5
            echo "\t<div class=\"back-to-top\"><i class=\"fa fa-angle-up\"></i></div>
\t";
        }
        // line 7
        echo "\t";
        echo "  
\t";
        // line 8
        if ( !twig_test_empty((isset($context["footer_block1"]) ? $context["footer_block1"] : null))) {
            // line 9
            echo "\t<div class=\"footer-main desc-collapse showdown\" id=\"collapse-footer\">
\t
\t\t";
            // line 11
            echo (isset($context["footer_block1"]) ? $context["footer_block1"] : null);
            echo "
\t\t\t
\t</div>
\t<div class=\"button-toggle hidden-lg hidden-md\">
         <a class=\"showmore\" data-toggle=\"collapse\" href=\"#\" aria-expanded=\"false\" aria-controls=\"collapse-footer\">
            <span class=\"toggle-more\">";
            // line 16
            echo $this->getAttribute((isset($context["objlang"]) ? $context["objlang"] : null), "get", array(0 => "show_more"), "method");
            echo " <i class=\"fa fa-angle-down\"></i></span> 
            <span class=\"toggle-less\">";
            // line 17
            echo $this->getAttribute((isset($context["objlang"]) ? $context["objlang"] : null), "get", array(0 => "show_less"), "method");
            echo " <i class=\"fa fa-angle-up\"></i></span>           
\t\t</a>        
\t</div>
\t";
        }
        // line 21
        echo "\t
\t
\t";
        // line 23
        echo " 
\t<div class=\"footer-bottom \">
\t\t<div class=\"container\">\t\t
\t\t\t<div class=\"row\">\t\t\t\t\t\t
\t\t\t\t<div class=\"col-lg-6 col-md-7 col-sm-12 col-xs-12 copyright-w\">\t
\t\t\t\t\t<div class=\"copyright\">
\t\t\t\t\t\t";
        // line 29
        if (twig_test_empty($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "copyright"), "method"))) {
            // line 30
            echo "\t\t\t\t\t\t\t";
            echo (isset($context["powered"]) ? $context["powered"] : null);
            echo "
\t\t\t\t\t\t";
        } else {
            // line 32
            echo "\t\t\t\t\t\t\t";
            echo twig_replace_filter($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "decode_entities", array(0 => $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "copyright"), "method")), "method"), array("{year}" => twig_date_format_filter($this->env, "now", "Y")));
            echo "
\t\t\t\t\t\t";
        }
        // line 34
        echo "\t\t\t\t\t</div>\t
\t\t\t\t</div>
\t\t\t\t";
        // line 36
        if ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "imgpayment_status"), "method")) {
            echo " 
\t\t\t\t<div class=\"col-lg-6 col-md-5 col-sm-12 col-xs-12 payment-w\">
\t\t\t\t\t<img src=\"image/";
            // line 38
            echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "imgpayment"), "method");
            echo "\"  alt=\"imgpayment\">
\t\t\t\t</div>
\t\t\t\t";
        }
        // line 41
        echo "\t\t\t</div>
\t\t</div>
\t</div>
</footer>";
    }

    public function getTemplateName()
    {
        return "so-techcity/template/footer/footer1.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 41,  97 => 38,  92 => 36,  88 => 34,  82 => 32,  76 => 30,  74 => 29,  66 => 23,  62 => 21,  55 => 17,  51 => 16,  43 => 11,  39 => 9,  37 => 8,  33 => 7,  29 => 5,  27 => 4,  23 => 3,  19 => 1,);
    }
}
/* */
/* */
/* <footer class="footer-container typefooter-{{typefooter ? typefooter : '1'}}">*/
/* 	{% if soconfig.get_settings('backtop') %}*/
/* 	<div class="back-to-top"><i class="fa fa-angle-up"></i></div>*/
/* 	{% endif %}*/
/* 	{#======	FOOTER TOP	=======#}  */
/* 	{% if footer_block1 is not empty %}*/
/* 	<div class="footer-main desc-collapse showdown" id="collapse-footer">*/
/* 	*/
/* 		{{footer_block1}}*/
/* 			*/
/* 	</div>*/
/* 	<div class="button-toggle hidden-lg hidden-md">*/
/*          <a class="showmore" data-toggle="collapse" href="#" aria-expanded="false" aria-controls="collapse-footer">*/
/*             <span class="toggle-more">{{ objlang.get('show_more') }} <i class="fa fa-angle-down"></i></span> */
/*             <span class="toggle-less">{{ objlang.get('show_less') }} <i class="fa fa-angle-up"></i></span>           */
/* 		</a>        */
/* 	</div>*/
/* 	{% endif %}*/
/* 	*/
/* 	*/
/* 	{#======	FOOTER BOTTOM	=======#} */
/* 	<div class="footer-bottom ">*/
/* 		<div class="container">		*/
/* 			<div class="row">						*/
/* 				<div class="col-lg-6 col-md-7 col-sm-12 col-xs-12 copyright-w">	*/
/* 					<div class="copyright">*/
/* 						{% if soconfig.get_settings('copyright') is empty %}*/
/* 							{{ powered }}*/
/* 						{% else %}*/
/* 							{{ soconfig.decode_entities(soconfig.get_settings('copyright'))|replace({'{year}': "now"|date("Y")}) }}*/
/* 						{% endif %}*/
/* 					</div>	*/
/* 				</div>*/
/* 				{% if soconfig.get_settings('imgpayment_status')%} */
/* 				<div class="col-lg-6 col-md-5 col-sm-12 col-xs-12 payment-w">*/
/* 					<img src="image/{{  soconfig.get_settings('imgpayment') }}"  alt="imgpayment">*/
/* 				</div>*/
/* 				{% endif %}*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* </footer>*/
