<?php

/* so-techcity/template/extension/module/so_categories/default_theme3.twig */
class __TwigTemplate_43cee26153ff66afe2a7b5d6ccb75cfb8ca8b892ef6e4f0d8a28b31917161fc2 extends Twig_Template
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
        echo "<div class=\"cat-wrap theme3 333 font-title\">
\t";
        // line 2
        $context["j"] = 0;
        // line 3
        echo "\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["items"]) {
            // line 4
            echo "\t\t";
            $context["j"] = ((isset($context["j"]) ? $context["j"] : null) + 1);
            // line 5
            echo "\t\t<div class=\"content-box box-";
            echo (isset($context["j"]) ? $context["j"] : null);
            echo "\">
\t\t\t<div class=\"box-top\">
\t\t\t\t";
            // line 7
            if ((($this->getAttribute($context["items"], "image", array()) && ($this->getAttribute($context["items"], "image", array()) != "")) && ($this->getAttribute($context["items"], "product_image", array()) == 1))) {
                // line 8
                echo "\t\t\t\t\t<div class=\"image-cat\">
\t\t\t\t\t\t<a href=\"";
                // line 9
                echo $this->getAttribute($context["items"], "link", array());
                echo "\"
\t\t\t\t\t\t   title=\"";
                // line 10
                echo $this->getAttribute($context["items"], "title", array());
                echo "\" target=\"";
                echo (isset($context["item_link_target"]) ? $context["item_link_target"] : null);
                echo "\" >
\t\t\t\t\t\t\t<img  class=\"lazyload\"  data-sizes=\"auto\" src=\"image/loading.svg\" data-src=\"";
                // line 11
                echo $this->getAttribute($context["items"], "image", array());
                echo "\" title=\"";
                echo $this->getAttribute($context["items"], "title", array());
                echo "\" alt=\"";
                echo $this->getAttribute($context["items"], "title", array());
                echo "\" />
\t\t\t\t\t\t</a>
\t\t\t\t\t</div>
\t\t\t\t";
            }
            // line 15
            echo "
\t\t\t\t";
            // line 16
            if ((isset($context["cat_title_display"]) ? $context["cat_title_display"] : null)) {
                // line 17
                echo "\t\t\t\t\t<div class=\"cat-title\">
\t\t\t\t\t\t<a href=\"";
                // line 18
                echo $this->getAttribute($context["items"], "link", array());
                echo "\"
\t\t\t\t\t\t   title=\"";
                // line 19
                echo $this->getAttribute($context["items"], "title", array());
                echo " \" target=\"";
                echo (isset($context["item_link_target"]) ? $context["item_link_target"] : null);
                echo "\">
\t\t\t\t\t\t\t";
                // line 20
                echo $this->getAttribute($context["items"], "title_maxlength", array());
                echo "
\t\t\t\t\t\t</a>
\t\t\t\t\t</div>
\t\t\t\t";
            }
            // line 24
            echo "\t\t\t</div>
\t\t\t";
            // line 25
            if ((isset($context["cat_sub_title_display"]) ? $context["cat_sub_title_display"] : null)) {
                // line 26
                echo "\t\t\t\t<div class=\"child-cat\">
\t\t\t\t\t";
                // line 27
                if ( !twig_test_empty($this->getAttribute($context["items"], "child_cat", array()))) {
                    // line 28
                    echo "\t\t\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["items"], "child_cat", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                        // line 29
                        echo "\t\t\t\t\t\t\t<div class=\"arrow\"></div>
\t\t\t\t\t\t\t<div class=\"child-cat-title\">
\t\t\t\t\t\t\t\t<a href=\"";
                        // line 31
                        echo $this->getAttribute($context["item"], "link", array());
                        echo "\" target=\"";
                        echo (isset($context["item_link_target"]) ? $context["item_link_target"] : null);
                        echo "\">
\t\t\t\t\t\t\t\t\t";
                        // line 32
                        if (((twig_length_filter($this->env, $this->getAttribute($context["item"], "title", array())) > (isset($context["cat_sub_title_maxcharacs"]) ? $context["cat_sub_title_maxcharacs"] : null)) && ((isset($context["cat_sub_title_maxcharacs"]) ? $context["cat_sub_title_maxcharacs"] : null) != 0))) {
                            // line 33
                            echo "\t\t\t\t\t\t\t\t\t\t";
                            echo twig_slice($this->env, strip_tags($this->getAttribute($context["item"], "title", array())), 0, (isset($context["cat_sub_title_maxcharacs"]) ? $context["cat_sub_title_maxcharacs"] : null));
                            echo "
\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 34
                            echo "\t
\t\t\t\t\t\t\t\t\t\t";
                            // line 35
                            echo $this->getAttribute($context["item"], "title", array());
                            echo "
\t\t\t\t\t\t\t\t\t";
                        }
                        // line 37
                        echo "
\t\t\t\t\t\t\t\t\t";
                        // line 38
                        if ((isset($context["cat_all_product"]) ? $context["cat_all_product"] : null)) {
                            // line 39
                            echo "\t\t\t\t\t\t\t\t\t\t";
                            echo (("(" . $this->getAttribute($context["item"], "all_product", array())) . "), ");
                            echo "
\t\t\t\t\t\t\t\t\t";
                        }
                        // line 41
                        echo "\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 44
                    echo "\t\t\t\t\t\t<a href=\"";
                    echo $this->getAttribute($context["items"], "link", array());
                    echo "\" class=\"viewmore\" title=\"";
                    echo $this->getAttribute($context["items"], "title", array());
                    echo "\" target=\"";
                    echo (isset($context["item_link_target"]) ? $context["item_link_target"] : null);
                    echo "\"> ";
                    echo $this->getAttribute((isset($context["objlang"]) ? $context["objlang"] : null), "get", array(0 => "text_morecate"), "method");
                    echo " </a>
\t\t\t\t\t";
                } else {
                    // line 46
                    echo "\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t";
                    // line 47
                    echo $this->getAttribute((isset($context["objlang"]) ? $context["objlang"] : null), "get", array(0 => "text_noitem"), "method");
                    echo "
\t\t\t\t\t\t</p>
\t\t\t\t\t";
                }
                // line 50
                echo "\t\t\t\t</div>
\t\t\t";
            }
            // line 52
            echo "\t\t\t
\t\t</div>
\t\t
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['items'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        echo "</div>


\t
";
    }

    public function getTemplateName()
    {
        return "so-techcity/template/extension/module/so_categories/default_theme3.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  183 => 56,  174 => 52,  170 => 50,  164 => 47,  161 => 46,  149 => 44,  141 => 41,  135 => 39,  133 => 38,  130 => 37,  125 => 35,  122 => 34,  116 => 33,  114 => 32,  108 => 31,  104 => 29,  99 => 28,  97 => 27,  94 => 26,  92 => 25,  89 => 24,  82 => 20,  76 => 19,  72 => 18,  69 => 17,  67 => 16,  64 => 15,  53 => 11,  47 => 10,  43 => 9,  40 => 8,  38 => 7,  32 => 5,  29 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}
/* <div class="cat-wrap theme3 333 font-title">*/
/* 	{% set j = 0 %}*/
/* 	{% for items in list %}*/
/* 		{% set j = j + 1 %}*/
/* 		<div class="content-box box-{{ j }}">*/
/* 			<div class="box-top">*/
/* 				{% if items.image and items.image != '' and items.product_image == 1 %}*/
/* 					<div class="image-cat">*/
/* 						<a href="{{ items.link }}"*/
/* 						   title="{{ items.title }}" target="{{ item_link_target }}" >*/
/* 							<img  class="lazyload"  data-sizes="auto" src="image/loading.svg" data-src="{{ items.image }}" title="{{ items.title }}" alt="{{ items.title }}" />*/
/* 						</a>*/
/* 					</div>*/
/* 				{% endif %}*/
/* */
/* 				{% if cat_title_display %}*/
/* 					<div class="cat-title">*/
/* 						<a href="{{ items.link }}"*/
/* 						   title="{{ items.title }} " target="{{ item_link_target }}">*/
/* 							{{ items.title_maxlength }}*/
/* 						</a>*/
/* 					</div>*/
/* 				{% endif %}*/
/* 			</div>*/
/* 			{% if cat_sub_title_display %}*/
/* 				<div class="child-cat">*/
/* 					{% if items.child_cat is not empty %}*/
/* 						{% for item in items.child_cat %}*/
/* 							<div class="arrow"></div>*/
/* 							<div class="child-cat-title">*/
/* 								<a href="{{ item.link }}" target="{{ item_link_target }}">*/
/* 									{% if item.title|length > cat_sub_title_maxcharacs and cat_sub_title_maxcharacs != 0 %}*/
/* 										{{ item.title|striptags|slice(0, cat_sub_title_maxcharacs) }}*/
/* 									{% else %}	*/
/* 										{{ item.title }}*/
/* 									{% endif %}*/
/* */
/* 									{% if cat_all_product %}*/
/* 										{{ '(' ~ item.all_product ~ '), ' }}*/
/* 									{% endif %}*/
/* 								</a>*/
/* 							</div>*/
/* 						{% endfor %}*/
/* 						<a href="{{ items.link }}" class="viewmore" title="{{ items.title }}" target="{{ item_link_target }}"> {{ objlang.get('text_morecate') }} </a>*/
/* 					{% else %}*/
/* 						<p>*/
/* 							{{ objlang.get('text_noitem') }}*/
/* 						</p>*/
/* 					{% endif %}*/
/* 				</div>*/
/* 			{% endif %}*/
/* 			*/
/* 		</div>*/
/* 		*/
/* 	{% endfor %}*/
/* </div>*/
/* */
/* */
/* 	*/
/* */
