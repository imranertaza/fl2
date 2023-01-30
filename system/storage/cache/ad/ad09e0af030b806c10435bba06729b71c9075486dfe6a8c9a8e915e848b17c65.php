<?php

/* listing.twig */
class __TwigTemplate_720e871685cde5d1a5b25a6d42a67ea5a6f14e1ea3392d59a253dafa472e1f70 extends Twig_Template
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
        // line 10
        echo "
";
        // line 12
        echo "<div class=\"sidebar-overlay \"></div>
<div class=\"product-filter filters-panel clearfix\">
\t<div class=\"col-xs-4 view-mode\">
\t\t<div class=\"list-view\">
\t\t\t<button type=\"button\" id=\"grid-view\" class=\"btn btn-default grid \" title=\"";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["button_grid"]) ? $context["button_grid"] : null), "html", null, true);
        echo "\"><i class=\"fa fa-th-large\"></i></button>
\t\t\t<button type=\"button\" id=\"list-view\" class=\"btn btn-default list \" title=\"";
        // line 17
        echo twig_escape_filter($this->env, (isset($context["button_list"]) ? $context["button_list"] : null), "html", null, true);
        echo "\"><i class=\"fa  fa-th-list\"></i></button>
\t\t</div>
\t</div>

\t<div class=\"col-xs-4 \">
\t";
        // line 22
        if ((isset($context["column_left"]) ? $context["column_left"] : null)) {
            // line 23
            echo "\t\t<a href=\"javascript:void(0)\" class=\"btn btn-primary open-sidebar \"><i class=\"fa fa-bars\"></i>";
            echo twig_escape_filter($this->env, (isset($context["text_sidebar"]) ? $context["text_sidebar"] : null), "html", null, true);
            echo "</a>
\t";
        }
        // line 25
        echo "\t</div>

\t<div class=\"short-by-show form-inline text-right col-xs-4\">
\t\t<div class=\"form-group short-by\">
\t\t\t<i class=\"fa fa-sort-amount-asc\" aria-hidden=\"true\"></i>
\t\t\t<select id=\"input-sort\" class=\"form-control\" onchange=\"location = this.value;\">
\t\t\t\t";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($context["sorts"]);
        foreach ($context['_seq'] as $context["_key"] => $context["sorts"]) {
            // line 32
            echo "\t\t\t\t";
            if (($this->getAttribute($context["sorts"], "value", array()) == sprintf("%s-%s", (isset($context["sort"]) ? $context["sort"] : null), (isset($context["order"]) ? $context["order"] : null)))) {
                // line 33
                echo "\t\t\t\t\t<option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["sorts"], "href", array()), "html", null, true);
                echo "\" selected=\"selected\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["sorts"], "text", array()), "html", null, true);
                echo "</option>
\t\t\t\t";
            } else {
                // line 35
                echo "\t\t\t\t
\t\t\t\t<option value=\"";
                // line 36
                echo twig_escape_filter($this->env, $this->getAttribute($context["sorts"], "href", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["sorts"], "text", array()), "html", null, true);
                echo "</option>
\t\t\t\t
\t\t\t\t";
            }
            // line 39
            echo "\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sorts'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "\t\t\t</select>
\t\t</div>
\t\t
\t</div>
\t
 
</div>
";
        // line 48
        echo "<div class=\"products-list row \">
\t";
        // line 49
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 50
            echo "\t\t<div class=\"product-layout \">
\t\t\t<div class=\"product-item-container\">
\t\t\t\t<div class=\"left-block\">
\t\t\t\t\t<div class=\"product-image-container \">
\t\t\t\t\t\t<a href=\"";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "href", array()), "html", null, true);
            echo " \" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "name", array()), "html", null, true);
            echo " \">
\t\t\t\t\t\t\t<img  src=\"";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "thumb", array()), "html", null, true);
            echo " \"  title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "name", array()), "html", null, true);
            echo " \" class=\"img-1 img-responsive\" />
\t\t\t\t\t\t</a>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"box-label\">
\t\t\t\t\t\t";
            // line 61
            echo "\t\t\t\t\t\t";
            if (($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "new_status"), "method") && $this->getAttribute($context["product"], "date_available", array()))) {
                echo " 
\t\t\t\t\t\t\t<span class=\"label-product label-new\">";
                // line 62
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["objlang"]) ? $context["objlang"] : null), "get", array(0 => "text_new"), "method"), "html", null, true);
                echo " </span>
\t\t\t\t\t\t";
            }
            // line 63
            echo " 
\t\t\t\t\t\t
\t\t\t\t\t\t";
            // line 66
            echo "\t\t\t\t\t\t";
            if ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "discount_status"), "method")) {
                echo " 
\t\t\t\t\t\t";
                // line 67
                if (($this->getAttribute($context["product"], "price", array()) && $this->getAttribute($context["product"], "special", array()))) {
                    echo " 
\t\t\t\t\t\t\t<span class=\"label-product label-sale\">
\t\t\t\t\t\t\t\t ";
                    // line 69
                    echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "discount", array()), "html", null, true);
                    echo "
\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t";
                }
                // line 71
                echo " 
\t\t\t\t\t\t";
            }
            // line 72
            echo " 
\t\t\t\t\t</div> 

\t\t\t\t\t
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"right-block\">
\t\t\t\t\t
\t\t\t\t\t";
            // line 80
            if ((($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "addcart_status"), "method") || $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "wishlist_status"), "method")) || $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "compare_status"), "method"))) {
                echo " 
\t\t\t\t\t<div class=\"button-group\">
\t\t\t\t\t\t";
                // line 82
                if ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "addcart_status"), "method")) {
                    echo " 
\t\t\t\t\t\t\t<button class=\"addToCart btn-button\" type=\"button\" title=\"";
                    // line 83
                    echo twig_escape_filter($this->env, (isset($context["button_cart"]) ? $context["button_cart"] : null), "html", null, true);
                    echo "\" onclick=\"cart.add('";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "product_id", array()), "html", null, true);
                    echo "', '";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "minimum", array()), "html", null, true);
                    echo "');\"><span><!-- ";
                    echo twig_escape_filter($this->env, (isset($context["button_cart"]) ? $context["button_cart"] : null), "html", null, true);
                    echo " --><i class=\"fa fa-shopping-cart\"></i></span></button>
\t\t\t\t\t\t";
                }
                // line 85
                echo "
\t\t\t\t\t\t";
                // line 86
                if ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "wishlist_status"), "method")) {
                    echo " 
\t\t\t\t\t\t\t<button class=\"wishlist btn-button\" type=\"button\" title=\"";
                    // line 87
                    echo twig_escape_filter($this->env, (isset($context["button_wishlist"]) ? $context["button_wishlist"] : null), "html", null, true);
                    echo "\" onclick=\"wishlist.add('";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "product_id", array()), "html", null, true);
                    echo "');\"><i class=\"fa fa-heart-o\"></i></button>
\t\t\t\t\t\t";
                }
                // line 89
                echo "
\t\t\t\t\t\t";
                // line 90
                if ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "compare_status"), "method")) {
                    echo " 
\t\t\t\t\t\t\t<button class=\"compare btn-button\" type=\"button\" title=\"";
                    // line 91
                    echo twig_escape_filter($this->env, (isset($context["button_compare"]) ? $context["button_compare"] : null), "html", null, true);
                    echo "\" onclick=\"compare.add('";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "product_id", array()), "html", null, true);
                    echo "');\"><i class=\"fa fa-retweet\"></i></button>
\t\t\t\t\t\t";
                }
                // line 93
                echo "
\t\t\t\t\t</div>
\t\t\t\t\t";
            }
            // line 96
            echo "
\t\t\t\t\t";
            // line 97
            if ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "rating_status"), "method")) {
                echo " 
\t\t\t\t\t<div class=\"ratings\">
\t\t\t\t\t\t<div class=\"rating-box\">
\t\t\t\t\t\t";
                // line 100
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 101
                    echo "\t\t\t\t\t\t";
                    if (($this->getAttribute($context["product"], "rating", array()) < $context["i"])) {
                        echo " 
\t\t\t\t\t\t\t<span class=\"fa fa-stack\"><i class=\"fa fa-star-o fa-stack-1x\"></i></span>
\t\t\t\t\t\t";
                    } else {
                        // line 103
                        echo "   
\t\t\t\t\t\t\t<span class=\"fa fa-stack\"><i class=\"fa fa-star fa-stack-1x\"></i><i class=\"fa fa-star-o fa-stack-1x\"></i></span>
\t\t\t\t\t\t";
                    }
                    // line 105
                    echo " 
\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 107
                echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t";
            }
            // line 110
            echo " 

\t\t\t\t\t<h4><a href=\"";
            // line 112
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "href", array()), "html", null, true);
            echo " \">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "name", array()), "html", null, true);
            echo " </a></h4>

\t\t\t\t\t";
            // line 114
            if ($this->getAttribute($context["product"], "price", array())) {
                echo " 
\t\t\t\t\t<div class=\"price\">
\t\t\t\t\t\t";
                // line 116
                if ( !$this->getAttribute($context["product"], "special", array())) {
                    echo " 
\t\t\t\t\t\t\t<span class=\"price-new\">";
                    // line 117
                    echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "price", array()), "html", null, true);
                    echo " </span>
\t\t\t\t\t\t";
                } else {
                    // line 118
                    echo "   
\t\t\t\t\t\t\t<span class=\"price-new\">";
                    // line 119
                    echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "special", array()), "html", null, true);
                    echo " </span> <span class=\"price-old\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "price", array()), "html", null, true);
                    echo " </span>
\t\t\t\t\t\t";
                }
                // line 120
                echo " 
\t\t\t\t\t</div>
\t\t\t\t\t";
            }
            // line 122
            echo " 
\t\t\t\t\t
\t\t\t\t\t";
            // line 124
            if ($this->getAttribute($context["product"], "seller_name", array())) {
                // line 125
                echo "\t\t\t\t\t\t<div class=\"seller_logo\">
\t\t\t\t\t\t\t<a href=\"";
                // line 126
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "seller_href", array()), "html", null, true);
                echo "\" data-toggle=\"tooltip\" target=\"_self\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "seller_name", array()), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t<img class=\"img-responsive\" src=\"";
                // line 127
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "seller_logo", array()), "html", null, true);
                echo "\"> ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "seller_name", array()), "html", null, true);
                echo "\t\t\t\t\t\t\t\t\t\t 
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
            }
            // line 131
            echo "\t\t\t\t\t
\t\t\t\t</div>
\t\t\t\t
\t\t\t</div>
\t\t</div>
\t\t";
            // line 137
            echo "\t
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 139
        echo "</div>

";
        // line 142
        echo "<div class=\"product-filter filters-panel clearfix\">
\t<div class=\"col-xs-12 text-center\">";
        // line 143
        echo twig_escape_filter($this->env, (isset($context["results"]) ? $context["results"] : null), "html", null, true);
        echo "</div>
\t<div class=\"col-xs-12 text-center\">";
        // line 144
        echo twig_escape_filter($this->env, (isset($context["pagination"]) ? $context["pagination"] : null), "html", null, true);
        echo "</div>
</div>
<script type=\"text/javascript\"><!--
reinitView();

function reinitView() {

\t\$('.view-mode .list-view button').bind(\"click\", function() {
\t\t\$(this).parent().find('button').removeClass('active');
\t\t\$(this).addClass('active');
\t});\t
\t// Product List
\t\$('#list-view').click(function() {
\t\t\$('#content .product-layout').attr('class', 'product-layout product-list col-xs-12');
\t\tlocalStorage.setItem('listview', 'list');
\t});

\t// Product Grid
\t\$('#grid-view').click(function() {
\t\t\$('#content .product-layout').attr('class', 'product-layout product-grid col-xs-6');
\t\tlocalStorage.setItem('listview', 'grid');
\t});

\t
\t// Product Table
\t
\tif(localStorage.getItem('listview')== null) localStorage.setItem('listview', 'grid');
\tif (localStorage.getItem('listview') == 'list'){
\t\t\$('#list-view').trigger('click');
\t} else {
\t\t\$('#grid-view').trigger('click');
\t}
}

//--></script> ";
    }

    public function getTemplateName()
    {
        return "listing.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  350 => 144,  346 => 143,  343 => 142,  339 => 139,  332 => 137,  325 => 131,  316 => 127,  310 => 126,  307 => 125,  305 => 124,  301 => 122,  296 => 120,  289 => 119,  286 => 118,  281 => 117,  277 => 116,  272 => 114,  265 => 112,  261 => 110,  255 => 107,  248 => 105,  243 => 103,  236 => 101,  232 => 100,  226 => 97,  223 => 96,  218 => 93,  211 => 91,  207 => 90,  204 => 89,  197 => 87,  193 => 86,  190 => 85,  179 => 83,  175 => 82,  170 => 80,  160 => 72,  156 => 71,  150 => 69,  145 => 67,  140 => 66,  136 => 63,  131 => 62,  126 => 61,  116 => 55,  110 => 54,  104 => 50,  100 => 49,  97 => 48,  88 => 40,  82 => 39,  74 => 36,  71 => 35,  63 => 33,  60 => 32,  56 => 31,  48 => 25,  42 => 23,  40 => 22,  32 => 17,  28 => 16,  22 => 12,  19 => 10,);
    }
}
/* {#*/
/* ****************************************************** */
/*  * @package	SO Framework for Opencart 3.x*/
/*  * @author	http://www.opencartworks.com*/
/*  * @license	GNU General Public License*/
/*  * @copyright(C) 2008-2017 opencartworks.com. All rights reserved.*/
/*  *******************************************************/
/* #}*/
/* {#====  Variables Device_res ==== #}*/
/* */
/* {#==== filters panel Top==== #}*/
/* <div class="sidebar-overlay "></div>*/
/* <div class="product-filter filters-panel clearfix">*/
/* 	<div class="col-xs-4 view-mode">*/
/* 		<div class="list-view">*/
/* 			<button type="button" id="grid-view" class="btn btn-default grid " title="{{ button_grid }}"><i class="fa fa-th-large"></i></button>*/
/* 			<button type="button" id="list-view" class="btn btn-default list " title="{{ button_list }}"><i class="fa  fa-th-list"></i></button>*/
/* 		</div>*/
/* 	</div>*/
/* */
/* 	<div class="col-xs-4 ">*/
/* 	{% if column_left  %}*/
/* 		<a href="javascript:void(0)" class="btn btn-primary open-sidebar "><i class="fa fa-bars"></i>{{ text_sidebar }}</a>*/
/* 	{% endif %}*/
/* 	</div>*/
/* */
/* 	<div class="short-by-show form-inline text-right col-xs-4">*/
/* 		<div class="form-group short-by">*/
/* 			<i class="fa fa-sort-amount-asc" aria-hidden="true"></i>*/
/* 			<select id="input-sort" class="form-control" onchange="location = this.value;">*/
/* 				{% for sorts in sorts %}*/
/* 				{% if sorts.value == '%s-%s'|format(sort, order) %}*/
/* 					<option value="{{ sorts.href }}" selected="selected">{{ sorts.text }}</option>*/
/* 				{% else %}*/
/* 				*/
/* 				<option value="{{ sorts.href }}">{{ sorts.text }}</option>*/
/* 				*/
/* 				{% endif %}*/
/* 				{% endfor %}*/
/* 			</select>*/
/* 		</div>*/
/* 		*/
/* 	</div>*/
/* 	*/
/*  */
/* </div>*/
/* {#==== Product List|Grid ==== #}*/
/* <div class="products-list row ">*/
/* 	{% for  product in products %}*/
/* 		<div class="product-layout ">*/
/* 			<div class="product-item-container">*/
/* 				<div class="left-block">*/
/* 					<div class="product-image-container ">*/
/* 						<a href="{{ product.href }} " title="{{ product.name }} ">*/
/* 							<img  src="{{ product.thumb }} "  title="{{ product.name }} " class="img-1 img-responsive" />*/
/* 						</a>*/
/* 					</div>*/
/* 					*/
/* 					<div class="box-label">*/
/* 						{#===== New Label=======#}*/
/* 						{% if soconfig.get_settings('new_status') and product.date_available %} */
/* 							<span class="label-product label-new">{{ objlang.get('text_new')}} </span>*/
/* 						{% endif %} */
/* 						*/
/* 						{#=======Discount Label======= #}*/
/* 						{% if soconfig.get_settings('discount_status')  %} */
/* 						{% if product.price  and  product.special  %} */
/* 							<span class="label-product label-sale">*/
/* 								 {{ product.discount }}*/
/* 							</span>*/
/* 						{% endif %} */
/* 						{% endif %} */
/* 					</div> */
/* */
/* 					*/
/* 				</div>*/
/* 				*/
/* 				<div class="right-block">*/
/* 					*/
/* 					{% if soconfig.get_settings('addcart_status') or soconfig.get_settings('wishlist_status') or soconfig.get_settings('compare_status') %} */
/* 					<div class="button-group">*/
/* 						{% if soconfig.get_settings('addcart_status') %} */
/* 							<button class="addToCart btn-button" type="button" title="{{ button_cart}}" onclick="cart.add('{{ product.product_id }}', '{{ product.minimum }}');"><span><!-- {{ button_cart }} --><i class="fa fa-shopping-cart"></i></span></button>*/
/* 						{% endif %}*/
/* */
/* 						{% if soconfig.get_settings('wishlist_status') %} */
/* 							<button class="wishlist btn-button" type="button" title="{{ button_wishlist}}" onclick="wishlist.add('{{ product.product_id }}');"><i class="fa fa-heart-o"></i></button>*/
/* 						{% endif %}*/
/* */
/* 						{% if soconfig.get_settings('compare_status') %} */
/* 							<button class="compare btn-button" type="button" title="{{ button_compare }}" onclick="compare.add('{{ product.product_id }}');"><i class="fa fa-retweet"></i></button>*/
/* 						{% endif %}*/
/* */
/* 					</div>*/
/* 					{% endif %}*/
/* */
/* 					{% if soconfig.get_settings('rating_status') %} */
/* 					<div class="ratings">*/
/* 						<div class="rating-box">*/
/* 						{% for i in 1..5 %}*/
/* 						{% if product.rating < i %} */
/* 							<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>*/
/* 						{% else %}   */
/* 							<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>*/
/* 						{% endif %} */
/* 						{% endfor %}*/
/* */
/* 						</div>*/
/* 					</div>*/
/* 					{% endif %} */
/* */
/* 					<h4><a href="{{ product.href }} ">{{ product.name }} </a></h4>*/
/* */
/* 					{% if product.price %} */
/* 					<div class="price">*/
/* 						{% if not product.special %} */
/* 							<span class="price-new">{{ product.price }} </span>*/
/* 						{% else %}   */
/* 							<span class="price-new">{{ product.special }} </span> <span class="price-old">{{ product.price }} </span>*/
/* 						{% endif %} */
/* 					</div>*/
/* 					{% endif %} */
/* 					*/
/* 					{% if  product.seller_name %}*/
/* 						<div class="seller_logo">*/
/* 							<a href="{{product.seller_href}}" data-toggle="tooltip" target="_self" title="{{product.seller_name}}">*/
/* 								<img class="img-responsive" src="{{ product.seller_logo }}"> {{product.seller_name}}										 */
/* 							</a>*/
/* 						</div>*/
/* 					{% endif %}*/
/* 					*/
/* 				</div>*/
/* 				*/
/* 			</div>*/
/* 		</div>*/
/* 		{# ====End Clearfix fluid grid layout =======#}*/
/* 	*/
/* 	{% endfor %}*/
/* </div>*/
/* */
/* {#==== filters panel Bottom==== #}*/
/* <div class="product-filter filters-panel clearfix">*/
/* 	<div class="col-xs-12 text-center">{{ results }}</div>*/
/* 	<div class="col-xs-12 text-center">{{ pagination }}</div>*/
/* </div>*/
/* <script type="text/javascript"><!--*/
/* reinitView();*/
/* */
/* function reinitView() {*/
/* */
/* 	$('.view-mode .list-view button').bind("click", function() {*/
/* 		$(this).parent().find('button').removeClass('active');*/
/* 		$(this).addClass('active');*/
/* 	});	*/
/* 	// Product List*/
/* 	$('#list-view').click(function() {*/
/* 		$('#content .product-layout').attr('class', 'product-layout product-list col-xs-12');*/
/* 		localStorage.setItem('listview', 'list');*/
/* 	});*/
/* */
/* 	// Product Grid*/
/* 	$('#grid-view').click(function() {*/
/* 		$('#content .product-layout').attr('class', 'product-layout product-grid col-xs-6');*/
/* 		localStorage.setItem('listview', 'grid');*/
/* 	});*/
/* */
/* 	*/
/* 	// Product Table*/
/* 	*/
/* 	if(localStorage.getItem('listview')== null) localStorage.setItem('listview', 'grid');*/
/* 	if (localStorage.getItem('listview') == 'list'){*/
/* 		$('#list-view').trigger('click');*/
/* 	} else {*/
/* 		$('#grid-view').trigger('click');*/
/* 	}*/
/* }*/
/* */
/* //--></script> */
