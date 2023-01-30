<?php

/* so-techcity/template/extension/module/so_tools/layout.twig */
class __TwigTemplate_4f43f3543c21206f5a1e14b02d4c34a1b80311063c2e3ed3f94a30860f0271e9 extends Twig_Template
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
        if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "status", array(), "any", true, true) && ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "status", array()) == 1))) {
            // line 2
            echo "<script type=\"text/javascript\" src=\"";
            echo (isset($context["tool_js"]) ? $context["tool_js"] : null);
            echo "\"></script>
<div id=\"so-groups\" class=\"";
            // line 3
            echo (isset($context["position"]) ? $context["position"] : null);
            echo " so-groups-sticky hidden-xs\" style=\"top: ";
            echo ((isset($context["top"]) ? $context["top"] : null) . "px");
            echo "\">
\t";
            // line 4
            if ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "show_category", array())) {
                // line 5
                echo "\t<a class=\"sticky-categories\" data-target=\"popup\" data-popup=\"#popup-categories\"><span>";
                echo (isset($context["text_head_categories"]) ? $context["text_head_categories"] : null);
                echo "</span><i class=\"fa fa-align-justify\"></i></a>
\t";
            }
            // line 7
            echo "\t";
            if ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "show_cart", array())) {
                // line 8
                echo "\t<a class=\"sticky-mycart\" data-target=\"popup\" data-popup=\"#popup-mycart\"><span>";
                echo (isset($context["text_head_cart"]) ? $context["text_head_cart"] : null);
                echo "</span><i class=\"fa fa-shopping-cart\"></i></a>
\t";
            }
            // line 10
            echo "\t";
            if ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "show_account", array())) {
                // line 11
                echo "\t<a class=\"sticky-myaccount\" data-target=\"popup\" data-popup=\"#popup-myaccount\"><span>";
                echo (isset($context["text_head_account"]) ? $context["text_head_account"] : null);
                echo "</span><i class=\"fa fa-user\"></i></a>
\t";
            }
            // line 13
            echo "\t";
            if ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "show_search", array())) {
                // line 14
                echo "\t<a class=\"sticky-mysearch\" data-target=\"popup\" data-popup=\"#popup-mysearch\"><span>";
                echo (isset($context["text_head_search"]) ? $context["text_head_search"] : null);
                echo "</span><i class=\"fa fa-search\"></i></a>
\t";
            }
            // line 16
            echo "\t";
            if ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "show_recent_product", array())) {
                // line 17
                echo "\t<a class=\"sticky-recent\" data-target=\"popup\" data-popup=\"#popup-recent\"><span>";
                echo (isset($context["text_head_recent_view"]) ? $context["text_head_recent_view"] : null);
                echo "</span><i class=\"fa fa-recent\"></i></a>
\t";
            }
            // line 19
            echo "\t";
            if ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "show_backtop", array())) {
                // line 20
                echo "\t<a class=\"sticky-backtop\" data-target=\"scroll\" data-scroll=\"html\"><span>";
                echo (isset($context["text_head_gotop"]) ? $context["text_head_gotop"] : null);
                echo "</span><i class=\"fa fa-angle-double-up\"></i></a>
\t";
            }
            // line 22
            echo "
\t";
            // line 23
            if ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "show_category", array())) {
                // line 24
                echo "\t<div class=\"popup popup-categories popup-hidden\" id=\"popup-categories\">
\t\t<div class=\"popup-screen\">
\t\t\t<div class=\"popup-position\">
\t\t\t\t<div class=\"popup-container popup-small\">
\t\t\t\t\t<div class=\"popup-header\">
\t\t\t\t\t\t<span><i class=\"fa fa-align-justify\"></i>";
                // line 29
                echo (isset($context["text_all_categories"]) ? $context["text_all_categories"] : null);
                echo "</span>
\t\t\t\t\t\t<a class=\"popup-close\" data-target=\"popup-close\" data-popup-close=\"#popup-categories\">&times;</a>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"popup-content\">
\t\t\t\t\t\t";
                // line 33
                if ((isset($context["categories"]) ? $context["categories"] : null)) {
                    // line 34
                    echo "\t\t\t\t\t\t<div class=\"nav-secondary\">
\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t\t";
                    // line 36
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                        // line 37
                        echo "\t\t\t\t\t\t\t\t\t";
                        $context["childrens"] = $this->getAttribute($context["category"], "children", array());
                        // line 38
                        echo "\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t";
                        // line 39
                        if ((isset($context["childrens"]) ? $context["childrens"] : null)) {
                            // line 40
                            echo "\t\t\t\t\t\t\t\t\t\t\t<span class=\"nav-action\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-plus more\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-minus less\"></i>
\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 45
                        echo "\t\t\t\t\t\t\t\t\t\t<a href=\"";
                        echo $this->getAttribute($context["category"], "href", array());
                        echo "\"><i class=\"fa fa-chevron-down nav-arrow\"></i>";
                        echo $this->getAttribute($context["category"], "name", array());
                        echo "</a>
\t\t\t\t\t\t\t\t\t\t";
                        // line 46
                        if ((isset($context["childrens"]) ? $context["childrens"] : null)) {
                            // line 47
                            echo "\t\t\t\t\t\t\t\t\t\t\t<ul class=\"level-2\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 48
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable((isset($context["childrens"]) ? $context["childrens"] : null));
                            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                                // line 49
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                $context["subchildrens"] = $this->getAttribute($context["child"], "children", array());
                                // line 50
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 51
                                if ((isset($context["subchildrens"]) ? $context["subchildrens"] : null)) {
                                    // line 52
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"nav-action\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-plus more\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-minus less\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 57
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                                echo $this->getAttribute($context["child"], "href", array());
                                echo "\"><i class=\"fa fa-chevron-right flip nav-arrow\"></i>";
                                echo $this->getAttribute($context["child"], "name", array());
                                echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 58
                                if ((isset($context["subchildrens"]) ? $context["subchildrens"] : null)) {
                                    // line 59
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<ul class=\"level-3\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 60
                                    $context['_parent'] = $context;
                                    $context['_seq'] = twig_ensure_traversable((isset($context["subchildrens"]) ? $context["subchildrens"] : null));
                                    foreach ($context['_seq'] as $context["_key"] => $context["subchild"]) {
                                        // line 61
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
                                        echo $this->getAttribute($context["subchild"], "href", array());
                                        echo "\">";
                                        echo $this->getAttribute($context["subchild"], "name", array());
                                        echo "</a></li>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    $_parent = $context['_parent'];
                                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subchild'], $context['_parent'], $context['loop']);
                                    $context = array_intersect_key($context, $_parent) + $_parent;
                                    // line 63
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 65
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 67
                            echo "\t\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 69
                        echo "\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 71
                    echo "\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                }
                // line 74
                echo "\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t";
            }
            // line 80
            echo "
\t";
            // line 81
            if ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "show_cart", array())) {
                // line 82
                echo "\t<div class=\"popup popup-mycart popup-hidden\" id=\"popup-mycart\">
\t\t<div class=\"popup-screen\">
\t\t\t<div class=\"popup-position\">
\t\t\t\t<div class=\"popup-container popup-small\">
\t\t\t\t\t<div class=\"popup-html\">
\t\t\t\t\t\t<div class=\"popup-header\">
\t\t\t\t\t\t\t<span><i class=\"fa fa-shopping-cart\"></i>";
                // line 88
                echo (isset($context["text_shopping_cart"]) ? $context["text_shopping_cart"] : null);
                echo "</span>
\t\t\t\t\t\t\t<a class=\"popup-close\" data-target=\"popup-close\" data-popup-close=\"#popup-mycart\">&times;</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"popup-content\">
\t\t\t\t\t\t\t<div class=\"cart-header\">
\t\t\t\t\t\t\t\t";
                // line 93
                if (((isset($context["products"]) ? $context["products"] : null) || (isset($context["vouchers"]) ? $context["vouchers"] : null))) {
                    // line 94
                    echo "\t\t\t\t\t\t\t\t\t<div class=\"notification gray\">
\t\t\t\t\t\t\t\t\t\t<p>";
                    // line 95
                    echo (isset($context["text_items_product"]) ? $context["text_items_product"] : null);
                    echo "</p>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<table class=\"table table-striped\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 98
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                        // line 99
                        echo "\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t  \t\t\t<td class=\"text-left first\">
\t\t\t\t\t\t\t\t\t  \t\t\t\t";
                        // line 101
                        if ($this->getAttribute($context["product"], "thumb", array())) {
                            // line 102
                            echo "\t\t\t\t\t\t\t\t\t    \t\t\t\t<a href=\"";
                            echo $this->getAttribute($context["product"], "href", array());
                            echo "\"><img class=\"img-thumbnail lazyload\" data-sizes=\"auto\" src=\"image/loading.svg\" data-src=\"";
                            echo $this->getAttribute($context["product"], "thumb", array());
                            echo "\" alt=\"";
                            echo $this->getAttribute($context["product"], "name", array());
                            echo "\" title=\"";
                            echo $this->getAttribute($context["product"], "name", array());
                            echo "\" /></a>
\t\t\t\t\t\t\t\t\t    \t\t\t";
                        }
                        // line 104
                        echo "\t\t\t\t\t\t\t\t\t    \t\t</td>
\t\t\t\t\t\t\t\t\t  \t\t\t<td class=\"text-left\">
\t\t\t\t\t\t\t\t\t  \t\t\t\t<a href=\"";
                        // line 106
                        echo $this->getAttribute($context["product"], "href", array());
                        echo "\">";
                        echo $this->getAttribute($context["product"], "name", array());
                        echo "</a>
\t\t\t\t\t\t\t\t\t    \t\t\t";
                        // line 107
                        if ($this->getAttribute($context["product"], "option", array())) {
                            // line 108
                            echo "\t\t\t\t\t\t\t\t\t    \t\t\t\t";
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["product"], "option", array()));
                            foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                                // line 109
                                echo "\t\t\t\t\t\t\t\t\t    \t\t\t\t\t<br />
\t\t\t\t\t\t\t\t\t    \t\t\t\t\t- <small>";
                                // line 110
                                echo $this->getAttribute($context["option"], "name", array());
                                echo " ";
                                echo $this->getAttribute($context["option"], "value", array());
                                echo "</small>
\t\t\t\t\t\t\t\t\t    \t\t\t\t";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 112
                            echo "\t\t\t\t\t\t\t\t\t    \t\t\t";
                        }
                        // line 113
                        echo "\t\t\t\t\t\t\t\t\t    \t\t\t";
                        if ($this->getAttribute($context["product"], "recurring", array())) {
                            // line 114
                            echo "\t\t\t\t\t\t\t\t\t    \t\t\t\t<br />
\t\t\t\t\t\t\t\t\t    \t\t\t\t- <small>";
                            // line 115
                            echo (isset($context["text_recurring"]) ? $context["text_recurring"] : null);
                            echo " ";
                            echo $this->getAttribute($context["product"], "recurring", array());
                            echo "</small>
\t\t\t\t\t\t\t\t\t    \t\t\t";
                        }
                        // line 117
                        echo "\t\t\t\t\t\t\t\t\t    \t\t</td>
\t\t\t\t\t\t\t\t\t  \t\t\t<td class=\"text-right\">x ";
                        // line 118
                        echo $this->getAttribute($context["product"], "quantity", array());
                        echo "</td>
\t\t\t\t\t\t\t\t\t  \t\t\t<td class=\"text-right total-price\">";
                        // line 119
                        echo $this->getAttribute($context["product"], "total", array());
                        echo "</td>
\t\t\t\t\t\t\t\t\t  \t\t\t<td class=\"text-right last\"><a href=\"javascript:;\" onclick=\"cart.remove('";
                        // line 120
                        echo $this->getAttribute($context["product"], "cart_id", array());
                        echo "');\" title=\"";
                        echo (isset($context["button_remove"]) ? $context["button_remove"] : null);
                        echo "\"><i class=\"fa fa-trash\"></i></a></td>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 123
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["vouchers"]) ? $context["vouchers"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["voucher"]) {
                        // line 124
                        echo "\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t  \t\t\t<td class=\"text-left first\"></td>
\t\t\t\t\t\t\t\t\t  \t\t\t<td class=\"text-left\">";
                        // line 126
                        echo $this->getAttribute($context["voucher"], "description", array());
                        echo "</td>
\t\t\t\t\t\t\t\t\t  \t\t\t<td class=\"text-right\">x&nbsp;1</td>
\t\t\t\t\t\t\t\t\t  \t\t\t<td class=\"text-right\">";
                        // line 128
                        echo $this->getAttribute($context["voucher"], "amount", array());
                        echo "</td>
\t\t\t\t\t\t\t\t\t  \t\t\t<td class=\"text-right last\"><a href=\"javascript:;\" onclick=\"voucher.remove('";
                        // line 129
                        echo $this->getAttribute($context["voucher"], "key", array());
                        echo "');\" title=\"";
                        echo (isset($context["button_remove"]) ? $context["button_remove"] : null);
                        echo "\"><i class=\"fa fa-trash\"></i></a></td>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['voucher'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 132
                    echo "\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t<div class=\"cart-bottom\">
\t\t\t\t\t\t\t\t\t\t<table class=\"table table-striped\">
\t\t\t\t\t\t\t\t\t  \t\t";
                    // line 135
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["totals"]) ? $context["totals"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["total"]) {
                        // line 136
                        echo "\t\t\t\t\t\t\t\t\t  \t\t\t<tr>
\t\t\t\t\t\t\t\t\t    \t\t\t<td class=\"text-left\"><strong>";
                        // line 137
                        echo $this->getAttribute($context["total"], "title", array());
                        echo "</strong></td>
\t\t\t\t\t\t\t\t\t    \t\t\t<td class=\"text-right\">";
                        // line 138
                        echo $this->getAttribute($context["total"], "text", array());
                        echo "</td>
\t\t\t\t\t\t\t\t\t  \t\t\t</tr>
\t\t\t\t\t\t\t\t\t  \t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['total'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 141
                    echo "\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t<p class=\"text-center\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 143
                    echo (isset($context["cart"]) ? $context["cart"] : null);
                    echo "\" class=\"btn btn-view-cart\"><strong>";
                    echo (isset($context["text_cart"]) ? $context["text_cart"] : null);
                    echo "</strong></a>
\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 144
                    echo (isset($context["checkout"]) ? $context["checkout"] : null);
                    echo "\" class=\"btn btn-checkout\"><strong>";
                    echo (isset($context["text_checkout"]) ? $context["text_checkout"] : null);
                    echo "</strong></a>
\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
                } else {
                    // line 148
                    echo "\t\t\t\t\t\t\t\t\t<div class=\"notification gray\">
\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-shopping-cart info-icon\"></i>
\t\t\t\t\t\t\t\t\t\t<p>";
                    // line 150
                    echo (isset($context["text_empty"]) ? $context["text_empty"] : null);
                    echo "</p>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
                }
                // line 153
                echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>\t\t\t
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t";
            }
            // line 161
            echo "
\t";
            // line 162
            if ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "show_account", array())) {
                // line 163
                echo "\t<div class=\"popup popup-myaccount popup-hidden\" id=\"popup-myaccount\">
\t\t<div class=\"popup-screen\">
\t\t\t<div class=\"popup-position\">
\t\t\t\t<div class=\"popup-container popup-small\">
\t\t\t\t\t<div class=\"popup-html\">
\t\t\t\t\t\t<div class=\"popup-header\">
\t\t\t\t\t\t\t<span><i class=\"fa fa-user\"></i>";
                // line 169
                echo (isset($context["text_my_account"]) ? $context["text_my_account"] : null);
                echo "</span>
\t\t\t\t\t\t\t<a class=\"popup-close\" data-target=\"popup-close\" data-popup-close=\"#popup-myaccount\">&times;</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"popup-content\">
\t\t\t\t\t\t\t<div class=\"form-content\">
\t\t\t\t\t\t\t\t<div class=\"row space\">
\t\t\t\t\t\t\t\t\t<div class=\"col col-sm-6 col-xs-12\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-box\">
\t\t\t\t\t\t\t\t\t\t\t<form action=\"";
                // line 177
                echo (isset($context["action_currency"]) ? $context["action_currency"] : null);
                echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"sticky-form-currency\">
\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"label-top\" for=\"input-language\"><span>";
                // line 178
                echo (isset($context["text_currency"]) ? $context["text_currency"] : null);
                echo "</span></label>
\t\t\t\t\t\t\t\t\t\t\t\t<select name=\"select-currency\" id=\"input-currency\" class=\"field icon dark arrow\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 180
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["currencies"]) ? $context["currencies"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["currency"]) {
                    // line 181
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if ($this->getAttribute($context["currency"], "symbol_left", array())) {
                        // line 182
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                        echo $this->getAttribute($context["currency"], "code", array());
                        echo "\" ";
                        if (((isset($context["code"]) ? $context["code"] : null) == $this->getAttribute($context["currency"], "code", array()))) {
                            echo " ";
                            echo "selected=\"selected\"";
                            echo " ";
                        }
                        echo ">";
                        echo $this->getAttribute($context["currency"], "symbol_left", array());
                        echo " ";
                        echo $this->getAttribute($context["currency"], "title", array());
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 184
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                        echo $this->getAttribute($context["currency"], "code", array());
                        echo "\" ";
                        if (((isset($context["code"]) ? $context["code"] : null) == $this->getAttribute($context["currency"], "code", array()))) {
                            echo " ";
                            echo "selected=\"selected\"";
                            echo " ";
                        }
                        echo ">";
                        echo $this->getAttribute($context["currency"], "symbol_right", array());
                        echo " ";
                        echo $this->getAttribute($context["currency"], "title", array());
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 186
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['currency'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo "\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"code\" value=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"redirect\" value=\"";
                // line 189
                echo (isset($context["redirect_currency"]) ? $context["redirect_currency"] : null);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col col-sm-6 col-xs-12\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-box\">
\t\t\t\t\t\t\t\t\t\t\t<form action=\"";
                // line 195
                echo (isset($context["action_language"]) ? $context["action_language"] : null);
                echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"sticky-form-language\">
\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"label-top\" for=\"input-language\"><span>";
                // line 196
                echo (isset($context["text_language"]) ? $context["text_language"] : null);
                echo "</span></label>
\t\t\t\t\t\t\t\t\t\t\t\t<select name=\"select-language\" id=\"input-language\" class=\"field icon dark arrow\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 198
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                    // line 199
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if (($this->getAttribute($context["language"], "code", array()) == (isset($context["code_language"]) ? $context["code_language"] : null))) {
                        // line 200
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                        echo $this->getAttribute($context["language"], "code", array());
                        echo "\" selected=\"selected\">";
                        echo $this->getAttribute($context["language"], "name", array());
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 202
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                        echo $this->getAttribute($context["language"], "code", array());
                        echo "\">";
                        echo $this->getAttribute($context["language"], "name", array());
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 204
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 205
                echo "\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"code\" value=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"redirect\" value=\"";
                // line 207
                echo (isset($context["redirect_language"]) ? $context["redirect_language"] : null);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col col-sm-12\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-box\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"hr show\"></div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col col-sm-4 col-xs-6 txt-center\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-box\">
\t\t\t\t\t\t\t\t\t\t\t<a class=\"account-url\" href=\"";
                // line 218
                echo (isset($context["link_order"]) ? $context["link_order"] : null);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"ico ico-32 ico-sm\"><i class=\"fa fa-history\"></i></span><br>
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"account-txt\">";
                // line 220
                echo (isset($context["text_history"]) ? $context["text_history"] : null);
                echo "</span>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col col-sm-4 col-xs-6 txt-center\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-box\">
\t\t\t\t\t\t\t\t\t\t\t<a class=\"account-url\" href=\"";
                // line 226
                echo (isset($context["link_cart"]) ? $context["link_cart"] : null);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"ico ico-32 ico-sm\"><i class=\"fa fa-shoppingcart\"></i></span><br>
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"account-txt\">";
                // line 228
                echo (isset($context["text_shopping_cart"]) ? $context["text_shopping_cart"] : null);
                echo "</span>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col col-sm-4 col-xs-6 txt-center\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-box\">
\t\t\t\t\t\t\t\t\t\t\t<a class=\"account-url\" href=\"";
                // line 234
                echo (isset($context["link_register"]) ? $context["link_register"] : null);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"ico ico-32 ico-sm\"><i class=\"fa fa-register\"></i></span><br>
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"account-txt\">";
                // line 236
                echo (isset($context["text_register"]) ? $context["text_register"] : null);
                echo "</span>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col col-sm-4 col-xs-6 txt-center\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-box\">
\t\t\t\t\t\t\t\t\t\t\t<a class=\"account-url\" href=\"";
                // line 242
                echo (isset($context["link_account"]) ? $context["link_account"] : null);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"ico ico-32 ico-sm\"><i class=\"fa fa-account\"></i></span><br>
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"account-txt\">";
                // line 244
                echo (isset($context["text_account"]) ? $context["text_account"] : null);
                echo "</span>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col col-sm-4 col-xs-6 txt-center\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-box\">
\t\t\t\t\t\t\t\t\t\t\t<a class=\"account-url\" href=\"";
                // line 250
                echo (isset($context["link_download"]) ? $context["link_download"] : null);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"ico ico-32 ico-sm\"><i class=\"fa fa-download\"></i></span><br>
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"account-txt\">";
                // line 252
                echo (isset($context["text_download"]) ? $context["text_download"] : null);
                echo "</span>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col col-sm-4 col-xs-6 txt-center\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-box\">
\t\t\t\t\t\t\t\t\t\t\t<a class=\"account-url\" href=\"";
                // line 258
                echo (isset($context["link_login"]) ? $context["link_login"] : null);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"ico ico-32 ico-sm\"><i class=\"fa fa-login\"></i></span><br>
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"account-txt\">";
                // line 260
                echo (isset($context["text_login"]) ? $context["text_login"] : null);
                echo "</span>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t</div>\t\t\t\t\t
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t";
            }
            // line 274
            echo "
\t";
            // line 275
            if ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "show_search", array())) {
                // line 276
                echo "\t<div class=\"popup popup-mysearch popup-hidden\" id=\"popup-mysearch\">
\t\t<div class=\"popup-screen\">
\t\t\t<div class=\"popup-position\">
\t\t\t\t<div class=\"popup-container popup-small\">
\t\t\t\t\t<div class=\"popup-html\">
\t\t\t\t\t\t<div class=\"popup-header\">
\t\t\t\t\t\t\t<span><i class=\"fa fa-search\"></i>";
                // line 282
                echo (isset($context["text_search"]) ? $context["text_search"] : null);
                echo "</span>
\t\t\t\t\t\t\t<a class=\"popup-close\" data-target=\"popup-close\" data-popup-close=\"#popup-mysearch\">&times;</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"popup-content\">
\t\t\t\t\t\t\t<div class=\"form-content\">
\t\t\t\t\t\t\t\t<div class=\"row space\">
\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-box\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"search\" value=\"\" placeholder=\"";
                // line 290
                echo (isset($context["text_search"]) ? $context["text_search"] : null);
                echo "\" id=\"input-search\" class=\"field\" />
\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-search sbmsearch\"></i>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-box\">
\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" id=\"button-search\" class=\"btn button-search\">";
                // line 296
                echo (isset($context["text_search"]) ? $context["text_search"] : null);
                echo "</button>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t";
            }
            // line 309
            echo "
\t";
            // line 310
            if ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "show_recent_product", array())) {
                // line 311
                echo "\t<div class=\"popup popup-recent popup-hidden\" id=\"popup-recent\">
\t\t<div class=\"popup-screen\">
\t\t\t<div class=\"popup-position\">
\t\t\t\t<div class=\"popup-container popup-small\">
\t\t\t\t\t<div class=\"popup-html\">
\t\t\t\t\t\t<div class=\"popup-header\">
\t\t\t\t\t\t\t<span><i class=\"fa fa-recent\"></i>";
                // line 317
                echo (isset($context["text_recent_products"]) ? $context["text_recent_products"] : null);
                echo "</span>
\t\t\t\t\t\t\t<a class=\"popup-close\" data-target=\"popup-close\" data-popup-close=\"#popup-recent\">&times;</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"popup-content\">
\t\t\t\t\t\t\t<div class=\"form-content\">
\t\t\t\t\t\t\t\t<div class=\"row space\">
\t\t\t\t\t\t\t\t\t";
                // line 323
                if ((isset($context["recent_products"]) ? $context["recent_products"] : null)) {
                    // line 324
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["recent_products"]) ? $context["recent_products"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["product_viewed"]) {
                        // line 325
                        echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"col col-sm-4 col-xs-6\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-box\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"item\">
\t\t\t\t                                        <div class=\"product-thumb transition\">
\t\t\t\t\t\t\t\t                        \t<div class=\"image\">
\t\t\t\t\t\t\t\t                        \t\t";
                        // line 330
                        if ($this->getAttribute($context["product_viewed"], "product_special", array())) {
                            // line 331
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"bt-sale\">";
                            echo $this->getAttribute($context["product_viewed"], "product_discount", array());
                            echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 333
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        if ($this->getAttribute($context["product_viewed"], "product_new", array())) {
                            // line 334
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"bt-new\">";
                            echo (isset($context["text_new"]) ? $context["text_new"] : null);
                            echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 336
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                        echo $this->getAttribute($context["product_viewed"], "product_href", array());
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img class=\"lazyload\" data-sizes=\"auto\" src=\"image/loading.svg\" data-src=\"";
                        // line 337
                        echo $this->getAttribute($context["product_viewed"], "product_image", array());
                        echo "\" alt=\"";
                        echo $this->getAttribute($context["product_viewed"], "product_name", array());
                        echo "\" >
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t                         \t</div>
\t\t\t\t\t\t\t\t\t                        <div class=\"caption\">
\t\t                                                        ";
                        // line 341
                        if ($this->getAttribute($context["product_viewed"], "product_name", array())) {
                            echo "<h4 class=\"font-ct\"><a href=\"";
                            echo $this->getAttribute($context["product_viewed"], "product_href", array());
                            echo "\" title=\"";
                            echo $this->getAttribute($context["product_viewed"], "product_name", array());
                            echo "\" >";
                            echo $this->getAttribute($context["product_viewed"], "product_name", array());
                            echo "</a></h4>";
                        }
                        // line 342
                        echo "\t\t                                                        ";
                        if ($this->getAttribute($context["product_viewed"], "product_price", array())) {
                            // line 343
                            echo "\t\t\t                                                        <p class=\"price\">
\t\t\t                                                        \t";
                            // line 344
                            if (($this->getAttribute($context["product_viewed"], "product_special", array()) == false)) {
                                // line 345
                                echo "\t\t\t\t\t\t\t\t\t\t                                \t<span class=\"price-new\">";
                                echo $this->getAttribute($context["product_viewed"], "product_price", array());
                                echo "</span>
\t\t\t\t\t\t\t\t\t\t                                ";
                            } else {
                                // line 347
                                echo "\t\t\t\t\t\t\t\t\t\t                                \t<span class=\"price-new\">";
                                echo $this->getAttribute($context["product_viewed"], "product_special", array());
                                echo "</span>
\t\t\t\t\t\t\t\t\t\t                                \t<span class=\"price-old\">";
                                // line 348
                                echo $this->getAttribute($context["product_viewed"], "product_price", array());
                                echo "</span>
\t\t\t\t\t\t\t\t\t\t                                ";
                            }
                            // line 350
                            echo "\t\t\t\t\t\t\t\t\t\t                            </p>
\t\t                                                    \t";
                        }
                        // line 352
                        echo "\t\t                                                    </div>
\t\t                                                    <div class=\"button-group\">
\t\t                                                    \t<button type=\"button\" onclick=\"cart.add('";
                        // line 354
                        echo $this->getAttribute($context["product_viewed"], "product_id", array());
                        echo "');\">
\t\t                                                    \t\t<span class=\"\">";
                        // line 355
                        echo (isset($context["button_cart"]) ? $context["button_cart"] : null);
                        echo "</span>
\t\t                                                    \t</button>
\t\t                                                    </div>
\t\t\t                                            </div>
\t\t\t\t                                    </div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product_viewed'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 363
                    echo "\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 364
                    echo "\t\t\t\t\t\t\t\t\t\t<div class=\"col col-xs-12\">";
                    echo (isset($context["text_no_content"]) ? $context["text_no_content"] : null);
                    echo "</div>
\t\t\t\t\t\t\t\t\t";
                }
                // line 366
                echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t";
            }
            // line 376
            echo "</div>
";
        }
    }

    public function getTemplateName()
    {
        return "so-techcity/template/extension/module/so_tools/layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  873 => 376,  861 => 366,  855 => 364,  852 => 363,  838 => 355,  834 => 354,  830 => 352,  826 => 350,  821 => 348,  816 => 347,  810 => 345,  808 => 344,  805 => 343,  802 => 342,  792 => 341,  783 => 337,  778 => 336,  772 => 334,  769 => 333,  763 => 331,  761 => 330,  754 => 325,  749 => 324,  747 => 323,  738 => 317,  730 => 311,  728 => 310,  725 => 309,  709 => 296,  700 => 290,  689 => 282,  681 => 276,  679 => 275,  676 => 274,  659 => 260,  654 => 258,  645 => 252,  640 => 250,  631 => 244,  626 => 242,  617 => 236,  612 => 234,  603 => 228,  598 => 226,  589 => 220,  584 => 218,  570 => 207,  566 => 205,  560 => 204,  552 => 202,  544 => 200,  541 => 199,  537 => 198,  532 => 196,  528 => 195,  519 => 189,  509 => 186,  493 => 184,  477 => 182,  474 => 181,  470 => 180,  465 => 178,  461 => 177,  450 => 169,  442 => 163,  440 => 162,  437 => 161,  427 => 153,  421 => 150,  417 => 148,  408 => 144,  402 => 143,  398 => 141,  389 => 138,  385 => 137,  382 => 136,  378 => 135,  373 => 132,  362 => 129,  358 => 128,  353 => 126,  349 => 124,  344 => 123,  333 => 120,  329 => 119,  325 => 118,  322 => 117,  315 => 115,  312 => 114,  309 => 113,  306 => 112,  296 => 110,  293 => 109,  288 => 108,  286 => 107,  280 => 106,  276 => 104,  264 => 102,  262 => 101,  258 => 99,  254 => 98,  248 => 95,  245 => 94,  243 => 93,  235 => 88,  227 => 82,  225 => 81,  222 => 80,  214 => 74,  209 => 71,  202 => 69,  198 => 67,  191 => 65,  187 => 63,  176 => 61,  172 => 60,  169 => 59,  167 => 58,  160 => 57,  153 => 52,  151 => 51,  148 => 50,  145 => 49,  141 => 48,  138 => 47,  136 => 46,  129 => 45,  122 => 40,  120 => 39,  117 => 38,  114 => 37,  110 => 36,  106 => 34,  104 => 33,  97 => 29,  90 => 24,  88 => 23,  85 => 22,  79 => 20,  76 => 19,  70 => 17,  67 => 16,  61 => 14,  58 => 13,  52 => 11,  49 => 10,  43 => 8,  40 => 7,  34 => 5,  32 => 4,  26 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% if settings.status is defined and settings.status == 1 %}*/
/* <script type="text/javascript" src="{{ tool_js }}"></script>*/
/* <div id="so-groups" class="{{ position }} so-groups-sticky hidden-xs" style="top: {{ top~'px' }}">*/
/* 	{% if settings.show_category %}*/
/* 	<a class="sticky-categories" data-target="popup" data-popup="#popup-categories"><span>{{ text_head_categories }}</span><i class="fa fa-align-justify"></i></a>*/
/* 	{% endif %}*/
/* 	{% if settings.show_cart %}*/
/* 	<a class="sticky-mycart" data-target="popup" data-popup="#popup-mycart"><span>{{ text_head_cart }}</span><i class="fa fa-shopping-cart"></i></a>*/
/* 	{% endif %}*/
/* 	{% if settings.show_account %}*/
/* 	<a class="sticky-myaccount" data-target="popup" data-popup="#popup-myaccount"><span>{{ text_head_account }}</span><i class="fa fa-user"></i></a>*/
/* 	{% endif %}*/
/* 	{% if settings.show_search %}*/
/* 	<a class="sticky-mysearch" data-target="popup" data-popup="#popup-mysearch"><span>{{ text_head_search }}</span><i class="fa fa-search"></i></a>*/
/* 	{% endif %}*/
/* 	{% if settings.show_recent_product %}*/
/* 	<a class="sticky-recent" data-target="popup" data-popup="#popup-recent"><span>{{ text_head_recent_view }}</span><i class="fa fa-recent"></i></a>*/
/* 	{% endif %}*/
/* 	{% if settings.show_backtop %}*/
/* 	<a class="sticky-backtop" data-target="scroll" data-scroll="html"><span>{{ text_head_gotop }}</span><i class="fa fa-angle-double-up"></i></a>*/
/* 	{% endif %}*/
/* */
/* 	{% if settings.show_category %}*/
/* 	<div class="popup popup-categories popup-hidden" id="popup-categories">*/
/* 		<div class="popup-screen">*/
/* 			<div class="popup-position">*/
/* 				<div class="popup-container popup-small">*/
/* 					<div class="popup-header">*/
/* 						<span><i class="fa fa-align-justify"></i>{{ text_all_categories }}</span>*/
/* 						<a class="popup-close" data-target="popup-close" data-popup-close="#popup-categories">&times;</a>*/
/* 					</div>*/
/* 					<div class="popup-content">*/
/* 						{% if categories %}*/
/* 						<div class="nav-secondary">*/
/* 							<ul>*/
/* 								{% for category in categories %}*/
/* 									{% set childrens = category.children %}*/
/* 									<li>*/
/* 										{% if childrens %}*/
/* 											<span class="nav-action">*/
/* 												<i class="fa fa-plus more"></i>*/
/* 												<i class="fa fa-minus less"></i>*/
/* 											</span>*/
/* 										{% endif %}*/
/* 										<a href="{{ category.href }}"><i class="fa fa-chevron-down nav-arrow"></i>{{ category.name }}</a>*/
/* 										{% if childrens %}*/
/* 											<ul class="level-2">*/
/* 												{% for child in childrens %}*/
/* 													{% set subchildrens = child.children %}*/
/* 													<li>*/
/* 														{% if subchildrens %}*/
/* 															<span class="nav-action">*/
/* 																<i class="fa fa-plus more"></i>*/
/* 																<i class="fa fa-minus less"></i>*/
/* 															</span>*/
/* 														{% endif %}*/
/* 														<a href="{{ child.href }}"><i class="fa fa-chevron-right flip nav-arrow"></i>{{ child.name }}</a>*/
/* 														{% if subchildrens %}*/
/* 															<ul class="level-3">*/
/* 																{% for subchild in subchildrens %}*/
/* 																	<li><a href="{{ subchild.href }}">{{ subchild.name }}</a></li>*/
/* 																{% endfor %}*/
/* 															</ul>*/
/* 														{% endif %}*/
/* 													</li>*/
/* 												{% endfor %}*/
/* 											</ul>*/
/* 										{% endif %}*/
/* 									</li>*/
/* 								{% endfor %}*/
/* 							</ul>*/
/* 						</div>*/
/* 						{% endif %}*/
/* 					</div>*/
/* 				</div>*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* 	{% endif %}*/
/* */
/* 	{% if settings.show_cart %}*/
/* 	<div class="popup popup-mycart popup-hidden" id="popup-mycart">*/
/* 		<div class="popup-screen">*/
/* 			<div class="popup-position">*/
/* 				<div class="popup-container popup-small">*/
/* 					<div class="popup-html">*/
/* 						<div class="popup-header">*/
/* 							<span><i class="fa fa-shopping-cart"></i>{{ text_shopping_cart }}</span>*/
/* 							<a class="popup-close" data-target="popup-close" data-popup-close="#popup-mycart">&times;</a>*/
/* 						</div>*/
/* 						<div class="popup-content">*/
/* 							<div class="cart-header">*/
/* 								{% if products or vouchers %}*/
/* 									<div class="notification gray">*/
/* 										<p>{{ text_items_product }}</p>*/
/* 									</div>*/
/* 									<table class="table table-striped">*/
/* 										{% for product in products %}*/
/* 											<tr>*/
/* 									  			<td class="text-left first">*/
/* 									  				{% if product.thumb %}*/
/* 									    				<a href="{{ product.href }}"><img class="img-thumbnail lazyload" data-sizes="auto" src="image/loading.svg" data-src="{{ product.thumb }}" alt="{{ product.name }}" title="{{ product.name }}" /></a>*/
/* 									    			{% endif %}*/
/* 									    		</td>*/
/* 									  			<td class="text-left">*/
/* 									  				<a href="{{ product.href }}">{{ product.name }}</a>*/
/* 									    			{% if product.option %}*/
/* 									    				{% for option in product.option %}*/
/* 									    					<br />*/
/* 									    					- <small>{{ option.name }} {{ option.value }}</small>*/
/* 									    				{% endfor %}*/
/* 									    			{% endif %}*/
/* 									    			{% if product.recurring %}*/
/* 									    				<br />*/
/* 									    				- <small>{{ text_recurring }} {{ product.recurring }}</small>*/
/* 									    			{% endif %}*/
/* 									    		</td>*/
/* 									  			<td class="text-right">x {{ product.quantity }}</td>*/
/* 									  			<td class="text-right total-price">{{ product.total }}</td>*/
/* 									  			<td class="text-right last"><a href="javascript:;" onclick="cart.remove('{{ product.cart_id }}');" title="{{ button_remove }}"><i class="fa fa-trash"></i></a></td>*/
/* 											</tr>*/
/* 										{% endfor %}*/
/* 										{% for voucher in vouchers %}*/
/* 											<tr>*/
/* 									  			<td class="text-left first"></td>*/
/* 									  			<td class="text-left">{{ voucher.description }}</td>*/
/* 									  			<td class="text-right">x&nbsp;1</td>*/
/* 									  			<td class="text-right">{{ voucher.amount }}</td>*/
/* 									  			<td class="text-right last"><a href="javascript:;" onclick="voucher.remove('{{ voucher.key }}');" title="{{ button_remove }}"><i class="fa fa-trash"></i></a></td>*/
/* 											</tr>*/
/* 										{% endfor %}*/
/* 									</table>*/
/* 									<div class="cart-bottom">*/
/* 										<table class="table table-striped">*/
/* 									  		{% for total in totals %}*/
/* 									  			<tr>*/
/* 									    			<td class="text-left"><strong>{{ total.title }}</strong></td>*/
/* 									    			<td class="text-right">{{ total.text }}</td>*/
/* 									  			</tr>*/
/* 									  		{% endfor %}*/
/* 										</table>*/
/* 										<p class="text-center">*/
/* 											<a href="{{ cart }}" class="btn btn-view-cart"><strong>{{ text_cart }}</strong></a>*/
/* 											<a href="{{ checkout }}" class="btn btn-checkout"><strong>{{ text_checkout }}</strong></a>*/
/* 										</p>*/
/* 									</div>*/
/* 								{% else %}*/
/* 									<div class="notification gray">*/
/* 										<i class="fa fa-shopping-cart info-icon"></i>*/
/* 										<p>{{ text_empty }}</p>*/
/* 									</div>*/
/* 								{% endif %}*/
/* 							</div>*/
/* 						</div>			*/
/* 					</div>*/
/* 				</div>*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* 	{% endif %}*/
/* */
/* 	{% if settings.show_account %}*/
/* 	<div class="popup popup-myaccount popup-hidden" id="popup-myaccount">*/
/* 		<div class="popup-screen">*/
/* 			<div class="popup-position">*/
/* 				<div class="popup-container popup-small">*/
/* 					<div class="popup-html">*/
/* 						<div class="popup-header">*/
/* 							<span><i class="fa fa-user"></i>{{ text_my_account }}</span>*/
/* 							<a class="popup-close" data-target="popup-close" data-popup-close="#popup-myaccount">&times;</a>*/
/* 						</div>*/
/* 						<div class="popup-content">*/
/* 							<div class="form-content">*/
/* 								<div class="row space">*/
/* 									<div class="col col-sm-6 col-xs-12">*/
/* 										<div class="form-box">*/
/* 											<form action="{{ action_currency }}" method="post" enctype="multipart/form-data" id="sticky-form-currency">*/
/* 												<label class="label-top" for="input-language"><span>{{ text_currency }}</span></label>*/
/* 												<select name="select-currency" id="input-currency" class="field icon dark arrow">*/
/* 													{% for currency in currencies %}*/
/* 														{% if currency.symbol_left %}*/
/* 															<option value="{{ currency.code }}" {% if code == currency.code %} {{ 'selected="selected"' }} {% endif %}>{{ currency.symbol_left }} {{ currency.title }}</option>*/
/* 														{% else %}*/
/* 															<option value="{{ currency.code }}" {% if code == currency.code %} {{ 'selected="selected"' }} {% endif %}>{{ currency.symbol_right }} {{ currency.title }}</option>*/
/* 														{% endif %}*/
/* 													{% endfor %}					*/
/* 												</select>*/
/* 												<input type="hidden" name="code" value="">*/
/* 												<input type="hidden" name="redirect" value="{{ redirect_currency }}">*/
/* 											</form>*/
/* 										</div>*/
/* 									</div>*/
/* 									<div class="col col-sm-6 col-xs-12">*/
/* 										<div class="form-box">*/
/* 											<form action="{{ action_language }}" method="post" enctype="multipart/form-data" id="sticky-form-language">*/
/* 												<label class="label-top" for="input-language"><span>{{ text_language }}</span></label>*/
/* 												<select name="select-language" id="input-language" class="field icon dark arrow">*/
/* 													{% for language in languages %}*/
/* 														{% if language.code == code_language %}*/
/* 															<option value="{{ language.code }}" selected="selected">{{ language.name }}</option>*/
/* 														{% else %}*/
/* 															<option value="{{ language.code }}">{{ language.name }}</option>*/
/* 														{% endif %}*/
/* 													{% endfor %}*/
/* 												</select>*/
/* 												<input type="hidden" name="code" value="">*/
/* 												<input type="hidden" name="redirect" value="{{ redirect_language }}">*/
/* 											</form>*/
/* 										</div>*/
/* 									</div>*/
/* 									<div class="col col-sm-12">*/
/* 										<div class="form-box">*/
/* 											<div class="hr show"></div>*/
/* 										</div>*/
/* 									</div>*/
/* 									<div class="col col-sm-4 col-xs-6 txt-center">*/
/* 										<div class="form-box">*/
/* 											<a class="account-url" href="{{ link_order }}">*/
/* 												<span class="ico ico-32 ico-sm"><i class="fa fa-history"></i></span><br>*/
/* 												<span class="account-txt">{{ text_history }}</span>*/
/* 											</a>*/
/* 										</div>*/
/* 									</div>*/
/* 									<div class="col col-sm-4 col-xs-6 txt-center">*/
/* 										<div class="form-box">*/
/* 											<a class="account-url" href="{{ link_cart }}">*/
/* 												<span class="ico ico-32 ico-sm"><i class="fa fa-shoppingcart"></i></span><br>*/
/* 												<span class="account-txt">{{ text_shopping_cart }}</span>*/
/* 											</a>*/
/* 										</div>*/
/* 									</div>*/
/* 									<div class="col col-sm-4 col-xs-6 txt-center">*/
/* 										<div class="form-box">*/
/* 											<a class="account-url" href="{{ link_register }}">*/
/* 												<span class="ico ico-32 ico-sm"><i class="fa fa-register"></i></span><br>*/
/* 												<span class="account-txt">{{ text_register }}</span>*/
/* 											</a>*/
/* 										</div>*/
/* 									</div>*/
/* 									<div class="col col-sm-4 col-xs-6 txt-center">*/
/* 										<div class="form-box">*/
/* 											<a class="account-url" href="{{ link_account }}">*/
/* 												<span class="ico ico-32 ico-sm"><i class="fa fa-account"></i></span><br>*/
/* 												<span class="account-txt">{{ text_account }}</span>*/
/* 											</a>*/
/* 										</div>*/
/* 									</div>*/
/* 									<div class="col col-sm-4 col-xs-6 txt-center">*/
/* 										<div class="form-box">*/
/* 											<a class="account-url" href="{{ link_download }}">*/
/* 												<span class="ico ico-32 ico-sm"><i class="fa fa-download"></i></span><br>*/
/* 												<span class="account-txt">{{ text_download }}</span>*/
/* 											</a>*/
/* 										</div>*/
/* 									</div>*/
/* 									<div class="col col-sm-4 col-xs-6 txt-center">*/
/* 										<div class="form-box">*/
/* 											<a class="account-url" href="{{ link_login }}">*/
/* 												<span class="ico ico-32 ico-sm"><i class="fa fa-login"></i></span><br>*/
/* 												<span class="account-txt">{{ text_login }}</span>*/
/* 											</a>*/
/* 										</div>*/
/* 									</div>*/
/* 								</div>*/
/* 							</div>*/
/* 							<div class="clear"></div>*/
/* 						</div>					*/
/* 					</div>*/
/* 				</div>*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* 	{% endif %}*/
/* */
/* 	{% if settings.show_search %}*/
/* 	<div class="popup popup-mysearch popup-hidden" id="popup-mysearch">*/
/* 		<div class="popup-screen">*/
/* 			<div class="popup-position">*/
/* 				<div class="popup-container popup-small">*/
/* 					<div class="popup-html">*/
/* 						<div class="popup-header">*/
/* 							<span><i class="fa fa-search"></i>{{ text_search }}</span>*/
/* 							<a class="popup-close" data-target="popup-close" data-popup-close="#popup-mysearch">&times;</a>*/
/* 						</div>*/
/* 						<div class="popup-content">*/
/* 							<div class="form-content">*/
/* 								<div class="row space">*/
/* 									<div class="col">*/
/* 										<div class="form-box">*/
/* 											<input type="text" name="search" value="" placeholder="{{ text_search }}" id="input-search" class="field" />*/
/* 											<i class="fa fa-search sbmsearch"></i>*/
/* 										</div>*/
/* 									</div>*/
/* 									<div class="col">*/
/* 										<div class="form-box">*/
/* 											<button type="button" id="button-search" class="btn button-search">{{ text_search }}</button>*/
/* 										</div>*/
/* 									</div>*/
/* 								</div>*/
/* 							</div>*/
/* 							<div class="clear"></div>*/
/* 						</div>*/
/* 					</div>*/
/* 				</div>*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* 	{% endif %}*/
/* */
/* 	{% if settings.show_recent_product %}*/
/* 	<div class="popup popup-recent popup-hidden" id="popup-recent">*/
/* 		<div class="popup-screen">*/
/* 			<div class="popup-position">*/
/* 				<div class="popup-container popup-small">*/
/* 					<div class="popup-html">*/
/* 						<div class="popup-header">*/
/* 							<span><i class="fa fa-recent"></i>{{ text_recent_products }}</span>*/
/* 							<a class="popup-close" data-target="popup-close" data-popup-close="#popup-recent">&times;</a>*/
/* 						</div>*/
/* 						<div class="popup-content">*/
/* 							<div class="form-content">*/
/* 								<div class="row space">*/
/* 									{% if recent_products %}*/
/* 										{% for product_viewed in recent_products %}*/
/* 											<div class="col col-sm-4 col-xs-6">*/
/* 												<div class="form-box">*/
/* 													<div class="item">*/
/* 				                                        <div class="product-thumb transition">*/
/* 								                        	<div class="image">*/
/* 								                        		{% if product_viewed.product_special %}*/
/* 																	<span class="bt-sale">{{ product_viewed.product_discount }}</span>*/
/* 																{% endif %}*/
/* 																{% if product_viewed.product_new %}*/
/* 																	<span class="bt-new">{{ text_new }}</span>*/
/* 																{% endif %}*/
/* 																<a href="{{ product_viewed.product_href }}">*/
/* 																	<img class="lazyload" data-sizes="auto" src="image/loading.svg" data-src="{{ product_viewed.product_image }}" alt="{{ product_viewed.product_name }}" >*/
/* 																</a>*/
/* 								                         	</div>*/
/* 									                        <div class="caption">*/
/* 		                                                        {% if product_viewed.product_name %}<h4 class="font-ct"><a href="{{ product_viewed.product_href }}" title="{{ product_viewed.product_name }}" >{{ product_viewed.product_name }}</a></h4>{% endif %}*/
/* 		                                                        {% if product_viewed.product_price %}*/
/* 			                                                        <p class="price">*/
/* 			                                                        	{% if product_viewed.product_special == false %}*/
/* 										                                	<span class="price-new">{{ product_viewed.product_price }}</span>*/
/* 										                                {% else %}*/
/* 										                                	<span class="price-new">{{ product_viewed.product_special }}</span>*/
/* 										                                	<span class="price-old">{{ product_viewed.product_price }}</span>*/
/* 										                                {% endif %}*/
/* 										                            </p>*/
/* 		                                                    	{% endif %}*/
/* 		                                                    </div>*/
/* 		                                                    <div class="button-group">*/
/* 		                                                    	<button type="button" onclick="cart.add('{{ product_viewed.product_id }}');">*/
/* 		                                                    		<span class="">{{ button_cart }}</span>*/
/* 		                                                    	</button>*/
/* 		                                                    </div>*/
/* 			                                            </div>*/
/* 				                                    </div>*/
/* 												</div>*/
/* 											</div>*/
/* 										{% endfor %}*/
/* 									{% else %}*/
/* 										<div class="col col-xs-12">{{ text_no_content}}</div>*/
/* 									{% endif %}*/
/* 								</div>*/
/* 							</div>*/
/* 							<div class="clear"></div>*/
/* 						</div>*/
/* 					</div>*/
/* 				</div>*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* 	{% endif %}*/
/* </div>*/
/* {% endif %}*/
