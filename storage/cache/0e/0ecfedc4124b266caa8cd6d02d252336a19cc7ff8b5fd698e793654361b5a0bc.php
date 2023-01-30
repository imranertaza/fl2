<?php

/* so-techcity/template/common/home.twig */
class __TwigTemplate_5a5b6fd6abe9868c71e009817528376e738a39265a3cfa35a3a32d51a2ceb0f9 extends Twig_Template
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
";
        // line 2
        echo (isset($context["header"]) ? $context["header"] : null);
        echo "

    
    <div id=\"content\" class=\"";
        // line 5
        echo (isset($context["class"]) ? $context["class"] : null);
        echo "\">

    ";
        // line 7
        echo (isset($context["content_home"]) ? $context["content_home"] : null);
        echo "
    ";
        // line 8
        echo (isset($context["content_top"]) ? $context["content_top"] : null);
        echo "
    ";
        // line 9
        echo (isset($context["content_bottom"]) ? $context["content_bottom"] : null);
        echo "
     </div>
   

";
        // line 13
        echo (isset($context["footer"]) ? $context["footer"] : null);
    }

    public function getTemplateName()
    {
        return "so-techcity/template/common/home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 13,  41 => 9,  37 => 8,  33 => 7,  28 => 5,  22 => 2,  19 => 1,);
    }
}
/* */
/* {{ header }}*/
/* */
/*     */
/*     <div id="content" class="{{ class }}">*/
/* */
/*     {{ content_home }}*/
/*     {{ content_top }}*/
/*     {{ content_bottom }}*/
/*      </div>*/
/*    */
/* */
/* {{ footer }}*/
