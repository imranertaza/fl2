<?php

/* so-techcity/template/extension/module/so_megamenu/default.twig */
class __TwigTemplate_d4cf71a326ce7a8020ea242cdf601ebf6e610f8956f447edf2a98787133c4069 extends Twig_Template
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
        echo "<div class=\"responsive megamenu-style-dev\">
\t";
        // line 2
        if (($this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "orientation", array()) == 1)) {
            // line 3
            echo "\t<div class=\"so-vertical-menu no-gutter\">
\t";
        }
        // line 5
        echo "\t
\t";
        // line 6
        if (($this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "disp_title_module", array()) && (isset($context["head_name"]) ? $context["head_name"] : null))) {
            // line 7
            echo "\t\t<h3>";
            echo (isset($context["head_name"]) ? $context["head_name"] : null);
            echo "</h3>
\t";
        }
        // line 9
        echo "\t<nav class=\"navbar-default\">
\t\t<div class=\" container-megamenu ";
        // line 10
        if (($this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "full_width", array()) != 1)) {
            echo " ";
            echo "container";
            echo " ";
        }
        echo " ";
        if (($this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "orientation", array()) == 1)) {
            echo " ";
            echo "vertical ";
            echo " ";
        } else {
            echo " ";
            echo "horizontal";
            echo " ";
        }
        echo "\">
\t\t";
        // line 11
        if (($this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "orientation", array()) == 1)) {
            // line 12
            echo "\t\t\t<div id=\"menuHeading\">
\t\t\t\t<div class=\"megamenuToogle-wrapper\">
\t\t\t\t\t<div class=\"megamenuToogle-pattern\">
\t\t\t\t\t\t<div class=\"container\">
\t\t\t\t\t\t\t<div><span></span><span></span><span></span></div>
\t\t\t\t\t\t\t<b>";
            // line 17
            echo (isset($context["navigation_text"]) ? $context["navigation_text"] : null);
            echo "</b>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"navbar-header\">
\t\t\t\t<button type=\"button\" id=\"show-verticalmenu\" data-toggle=\"collapse\"  class=\"navbar-toggle\">
\t\t\t\t\t<!-- <span class=\"icon-bar\"></span>
\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t\t<span class=\"icon-bar\"></span> -->
\t\t\t\t\t<i class=\"fa fa-bars\"></i>
\t\t\t\t\t<span>";
            // line 28
            echo (isset($context["navigation_text"]) ? $context["navigation_text"] : null);
            echo "</span>
\t\t\t\t</button>
\t\t\t</div>
\t\t";
        } else {
            // line 32
            echo "\t\t\t<div class=\"navbar-header\">
\t\t\t\t<button type=\"button\" id=\"show-megamenu\" data-toggle=\"collapse\"  class=\"navbar-toggle\">
\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t</button>
\t\t\t</div>
\t\t";
        }
        // line 40
        echo "
\t\t";
        // line 41
        if (($this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "orientation", array()) == 1)) {
            // line 42
            echo "\t\t\t<div class=\"vertical-wrapper\">
\t\t";
        } else {
            // line 44
            echo "\t\t\t<div class=\"megamenu-wrapper\">
\t\t";
        }
        // line 46
        echo "
\t\t";
        // line 47
        if (($this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "orientation", array()) == 1)) {
            // line 48
            echo "\t\t\t<span id=\"remove-verticalmenu\" class=\"fa fa-times\"></span>
\t\t";
        } else {
            // line 50
            echo "\t\t\t<span id=\"remove-megamenu\" class=\"fa fa-times\"></span>
\t\t";
        }
        // line 52
        echo "
\t\t\t<div class=\"megamenu-pattern\">
\t\t\t\t<div class=\"container\">
\t\t\t\t\t<ul class=\"megamenu\"
\t\t\t\t\tdata-transition=\"";
        // line 56
        if (($this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "animation", array()) != "")) {
            echo $this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "animation", array());
        } else {
            echo "none";
        }
        echo "\" data-animationtime=\"";
        if ((($this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "animation_time", array()) > 0) && ($this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "animation_time", array()) < 5000))) {
            echo $this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "animation_time", array());
        } else {
            echo 500;
        }
        echo "\">
\t\t\t\t\t\t";
        // line 57
        if ((($this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "home_item", array()) == "icon") || ($this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "home_item", array()) == "text"))) {
            // line 58
            echo "\t\t\t\t\t\t\t<li class=\"home\">
\t\t\t\t\t\t\t\t<a href=\"";
            // line 59
            echo (isset($context["home"]) ? $context["home"] : null);
            echo "\">
\t\t\t\t\t\t\t\t";
            // line 60
            if (($this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "home_item", array()) == "icon")) {
                // line 61
                echo "\t\t\t\t\t\t\t\t\t<i class=\"fa fa-home\"></i>
\t\t\t\t\t\t\t\t";
            } else {
                // line 63
                echo "\t\t\t\t\t\t\t\t\t<span><strong>";
                echo (isset($context["home_text"]) ? $context["home_text"] : null);
                echo "</strong></span>
\t\t\t\t\t\t\t\t";
            }
            // line 65
            echo "\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
        }
        // line 68
        echo "\t\t\t\t\t\t
\t\t\t\t\t\t";
        // line 69
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["menu"]) ? $context["menu"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["row"]) {
            // line 70
            echo "\t\t\t\t\t\t\t";
            $context["class"] = "";
            // line 71
            echo "\t\t\t\t\t\t\t";
            $context["icon_font"] = "";
            // line 72
            echo "\t\t\t\t\t\t\t";
            $context["class_link"] = "clearfix";
            // line 73
            echo "\t\t\t\t\t\t\t";
            $context["label_item"] = "";
            // line 74
            echo "\t\t\t\t\t\t\t";
            $context["title"] = false;
            // line 75
            echo "\t\t\t\t\t\t\t";
            $context["target"] = false;
            // line 76
            echo "
\t\t\t\t\t\t\t";
            // line 77
            if (twig_in_filter("no_image", $this->getAttribute($context["row"], "icon", array()))) {
                // line 78
                echo "\t\t\t\t\t\t\t\t";
                $context["icon"] = "";
                // line 79
                echo "\t\t\t\t\t\t\t";
            } else {
                // line 80
                echo "\t\t\t\t\t\t\t\t";
                $context["icon"] = $this->getAttribute($context["row"], "icon", array());
                // line 81
                echo "\t\t\t\t\t\t\t";
            }
            // line 82
            echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
            // line 83
            if (($this->getAttribute($context["row"], "description", array()) != "")) {
                // line 84
                echo "\t\t\t\t\t\t\t\t";
                $context["class_link"] = ((isset($context["class_link"]) ? $context["class_link"] : null) . " description");
                // line 85
                echo "\t\t\t\t\t\t\t";
            }
            // line 86
            echo "
\t\t\t\t\t\t\t";
            // line 87
            if (((((isset($context["route"]) ? $context["route"] : null) && ((isset($context["route"]) ? $context["route"] : null) == $this->getAttribute($context["row"], "route", array()))) && (isset($context["path"]) ? $context["path"] : null)) && ((isset($context["path"]) ? $context["path"] : null) == $this->getAttribute($context["row"], "path", array())))) {
                // line 88
                echo "\t\t\t\t\t\t\t\t";
                $context["class"] = ((isset($context["class"]) ? $context["class"] : null) . " active_menu");
                // line 89
                echo "\t\t\t\t\t\t\t";
            }
            // line 90
            echo "
\t\t\t\t\t\t\t";
            // line 91
            if ($this->getAttribute($context["row"], "class_menu", array())) {
                // line 92
                echo "\t\t\t\t\t\t\t\t";
                $context["class"] = ((isset($context["class"]) ? $context["class"] : null) . $this->getAttribute($context["row"], "class_menu", array()));
                // line 93
                echo "\t\t\t\t\t\t\t";
            }
            // line 94
            echo "
\t\t\t\t\t\t\t";
            // line 95
            if ($this->getAttribute($context["row"], "icon_font", array())) {
                // line 96
                echo "\t\t\t\t\t\t\t\t";
                $context["icon_font"] = ((((isset($context["icon_font"]) ? $context["icon_font"] : null) . "<i class=\"") . $this->getAttribute($context["row"], "icon_font", array())) . "\"></i>");
                // line 97
                echo "\t\t\t\t\t\t\t";
            }
            // line 98
            echo "
\t\t\t\t\t\t\t";
            // line 99
            if ($this->getAttribute($context["row"], "label_item", array())) {
                // line 100
                echo "\t\t\t\t\t\t\t\t";
                $context["label_item"] = ((((isset($context["label_item"]) ? $context["label_item"] : null) . "<span class=\"label") . $this->getAttribute($context["row"], "label_item", array())) . "\"></span>");
                // line 101
                echo "\t\t\t\t\t\t\t";
            }
            // line 102
            echo "
\t\t\t\t\t\t\t";
            // line 103
            if ((twig_test_iterable($this->getAttribute($context["row"], "submenu", array())) && $this->getAttribute($context["row"], "submenu", array()))) {
                // line 104
                echo "\t\t\t\t\t\t\t\t";
                $context["class"] = ((isset($context["class"]) ? $context["class"] : null) . " with-sub-menu");
                // line 105
                echo "\t\t\t\t\t\t\t\t";
                if (($this->getAttribute($context["row"], "submenu_type", array()) == 1)) {
                    // line 106
                    echo "\t\t\t\t\t\t\t\t\t";
                    $context["class"] = ((isset($context["class"]) ? $context["class"] : null) . " click");
                    // line 107
                    echo "\t\t\t\t\t\t\t\t";
                } else {
                    // line 108
                    echo "\t\t\t\t\t\t\t\t\t";
                    $context["class"] = ((isset($context["class"]) ? $context["class"] : null) . " hover");
                    // line 109
                    echo "\t\t\t\t\t\t\t\t";
                }
                // line 110
                echo "\t\t\t\t\t\t\t";
            }
            // line 111
            echo "
\t\t\t\t\t\t\t";
            // line 112
            if (($this->getAttribute($context["row"], "position", array()) == 1)) {
                // line 113
                echo "\t\t\t\t\t\t\t\t";
                $context["class"] = ((isset($context["class"]) ? $context["class"] : null) . " pull-right");
                // line 114
                echo "\t\t\t\t\t\t\t";
            }
            // line 115
            echo "
\t\t\t\t\t\t\t";
            // line 116
            if (($this->getAttribute($context["row"], "submenu_type", array()) == 2)) {
                // line 117
                echo "\t\t\t\t\t\t\t\t";
                $context["title"] = "title=\"hover-intent\"";
                // line 118
                echo "\t\t\t\t\t\t\t";
            }
            // line 119
            echo "
\t\t\t\t\t\t\t";
            // line 120
            if (($this->getAttribute($context["row"], "new_window", array()) == 1)) {
                // line 121
                echo "\t\t\t\t\t\t\t\t";
                $context["target"] = "target=\"_blank\"";
                // line 122
                echo "\t\t\t\t\t\t\t";
            }
            // line 123
            echo "
\t\t\t\t\t\t\t";
            // line 124
            if (($this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "orientation", array()) == 1)) {
                // line 125
                echo "\t\t\t\t\t\t\t\t<li class=\"item-vertical ";
                echo (isset($context["class"]) ? $context["class"] : null);
                echo "\" ";
                echo (isset($context["title"]) ? $context["title"] : null);
                echo ">
\t\t\t\t\t\t\t\t\t<p class='close-menu'></p>
\t\t\t\t\t\t\t\t\t";
                // line 127
                if ((twig_test_iterable($this->getAttribute($context["row"], "submenu", array())) && $this->getAttribute($context["row"], "submenu", array()))) {
                    // line 128
                    echo "\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    echo $this->getAttribute($context["row"], "link", array());
                    echo "\" class=\"";
                    echo (isset($context["class_link"]) ? $context["class_link"] : null);
                    echo "\" ";
                    echo (isset($context["target"]) ? $context["target"] : null);
                    echo ">
\t\t\t\t\t\t\t\t\t\t\t<span>
\t\t\t\t\t\t\t\t\t\t\t\t<strong>";
                    // line 130
                    echo ((((isset($context["icon_font"]) ? $context["icon_font"] : null) . (isset($context["icon"]) ? $context["icon"] : null)) . $this->getAttribute($this->getAttribute($context["row"], "name", array()), (isset($context["lang_id"]) ? $context["lang_id"] : null), array(), "array")) . $this->getAttribute($context["row"], "description", array()));
                    echo "</strong>
\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 132
                    echo (isset($context["label_item"]) ? $context["label_item"] : null);
                    echo "
\t\t\t\t\t\t\t\t\t\t\t<b class='fa fa-angle-right' ></b>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 136
                    echo "\t\t\t\t\t\t\t\t \t\t<a href=\"";
                    echo $this->getAttribute($context["row"], "link", array());
                    echo "\" class=\"";
                    echo (isset($context["class_link"]) ? $context["class_link"] : null);
                    echo "\" ";
                    echo (isset($context["target"]) ? $context["target"] : null);
                    echo ">
\t\t\t\t\t\t\t\t\t\t\t<span>
\t\t\t\t\t\t\t\t\t\t\t\t<strong>";
                    // line 138
                    echo ((((isset($context["icon_font"]) ? $context["icon_font"] : null) . (isset($context["icon"]) ? $context["icon"] : null)) . $this->getAttribute($this->getAttribute($context["row"], "name", array()), (isset($context["lang_id"]) ? $context["lang_id"] : null), array(), "array")) . $this->getAttribute($context["row"], "description", array()));
                    echo "</strong>
\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 140
                    echo (isset($context["label_item"]) ? $context["label_item"] : null);
                    echo "
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t";
                }
                // line 143
                echo "
\t\t\t\t\t\t\t\t\t";
                // line 144
                if ((twig_test_iterable($this->getAttribute($context["row"], "submenu", array())) && $this->getAttribute($context["row"], "submenu", array()))) {
                    // line 145
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    if (twig_in_filter("%", $this->getAttribute($context["row"], "submenu_width", array()))) {
                        // line 146
                        echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"sub-menu\" data-subwidth =\"";
                        echo twig_replace_filter($this->getAttribute($context["row"], "submenu_width", array()), array("%" => ""));
                        echo "\">
\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 148
                        echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"sub-menu\" style=\"width:";
                        echo $this->getAttribute($context["row"], "submenu_width", array());
                        echo "\">
\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 150
                    echo "
\t\t\t\t\t\t\t\t\t\t<div class=\"content\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 153
                    $context["row_fluid"] = 0;
                    // line 154
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["row"], "submenu", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["submenu"]) {
                        // line 155
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        if ((((isset($context["row_fluid"]) ? $context["row_fluid"] : null) + $this->getAttribute($context["submenu"], "content_width", array())) > 12)) {
                            // line 156
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["row_fluid"] = $this->getAttribute($context["submenu"], "content_width", array());
                            // line 157
                            echo "\t\t\t\t\t\t\t\t\t\t \t\t\t\t</div><div class=\"border\"></div><div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 159
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["row_fluid"] = ((isset($context["row_fluid"]) ? $context["row_fluid"] : null) + $this->getAttribute($context["submenu"], "content_width", array()));
                            // line 160
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 161
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-";
                        echo $this->getAttribute($context["submenu"], "content_width", array());
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 162
                        if (($this->getAttribute($context["submenu"], "content_type", array()) == 0)) {
                            // line 163
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"html ";
                            echo $this->getAttribute($context["submenu"], "class_menu", array());
                            echo "\">";
                            echo $this->getAttribute($context["submenu"], "html", array());
                            echo "</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute(                        // line 164
$context["submenu"], "content_type", array()) == 1)) {
                            // line 165
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (twig_test_iterable($this->getAttribute($context["submenu"], "product", array()))) {
                                // line 166
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"product ";
                                echo $this->getAttribute($context["submenu"], "class_menu", array());
                                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"image\"><a href=\"";
                                // line 167
                                echo $this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "link", array());
                                echo "\" onclick=\"window.location = '";
                                echo $this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "link", array());
                                echo "'\"><img class=\"lazyload\" data-sizes=\"auto\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" data-src=\"";
                                echo $this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "image", array());
                                echo "\" alt=\"\"></a></div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"name\"><a href=\"";
                                // line 168
                                echo $this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "link", array());
                                echo "\" onclick=\"window.location = '";
                                echo $this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "link", array());
                                echo "'\">";
                                echo $this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "name", array());
                                echo "</a></div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"price\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 170
                                if ( !$this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "special", array())) {
                                    // line 171
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    echo $this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "price", array());
                                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                } else {
                                    // line 173
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    echo $this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "special", array());
                                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 175
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 178
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute($context["submenu"], "content_type", array()) == 2)) {
                            // line 179
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"categories ";
                            echo $this->getAttribute($context["submenu"], "class_menu", array());
                            echo "\">";
                            echo $this->getAttribute($context["submenu"], "categories", array());
                            echo "</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute(                        // line 180
$context["submenu"], "content_type", array()) == 3)) {
                            // line 181
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (twig_test_iterable($this->getAttribute($context["submenu"], "manufactures", array()))) {
                                // line 182
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<ul class=\"manufacturer ";
                                echo $this->getAttribute($context["submenu"], "class_menu", array());
                                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 183
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["submenu"], "manufactures", array()));
                                foreach ($context['_seq'] as $context["_key"] => $context["manufacturer"]) {
                                    // line 184
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
                                    echo $this->getAttribute($context["manufacturer"], "link", array());
                                    echo "\">";
                                    echo $this->getAttribute($context["manufacturer"], "name", array());
                                    echo "</a></li>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['manufacturer'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 186
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 188
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute($context["submenu"], "content_type", array()) == 4)) {
                            // line 189
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (($this->getAttribute($this->getAttribute($context["submenu"], "images", array()), "show_title", array()) == 1)) {
                                // line 190
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"title-submenu\">";
                                echo $this->getAttribute($this->getAttribute($context["submenu"], "name", array()), (isset($context["lang_id"]) ? $context["lang_id"] : null), array(), "array");
                                echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 192
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"link ";
                            echo $this->getAttribute($context["submenu"], "class_menu", array());
                            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 193
                            echo $this->getAttribute($this->getAttribute($context["submenu"], "images", array()), "link", array());
                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute(                        // line 195
$context["submenu"], "content_type", array()) == 5)) {
                            // line 196
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            if ($this->getAttribute($this->getAttribute($context["submenu"], "subcategory", array()), "categories", array())) {
                                // line 197
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<ul class=\"subcategory ";
                                echo $this->getAttribute($context["submenu"], "class_menu", array());
                                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 198
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["submenu"], "subcategory", array()), "categories", array()));
                                foreach ($context['_seq'] as $context["_key"] => $context["categories"]) {
                                    // line 199
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 200
                                    if (($this->getAttribute($this->getAttribute($context["submenu"], "subcategory", array()), "show_title", array()) == 1)) {
                                        // line 201
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                                        echo $this->getAttribute($context["categories"], "href", array());
                                        echo "\" class=\"title-submenu ";
                                        echo $this->getAttribute($context["submenu"], "class_menu", array());
                                        echo "\">";
                                        echo $this->getAttribute($context["categories"], "name", array());
                                        echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 203
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    if ($this->getAttribute($context["categories"], "categories", array())) {
                                        // line 204
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        echo $this->getAttribute($context["categories"], "categories", array());
                                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 206
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    if (($this->getAttribute($this->getAttribute($context["submenu"], "subcategory", array()), "show_image", array()) == 1)) {
                                        // line 207
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img class=\"lazyload\" data-sizes=\"auto\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" data-src=\"";
                                        echo $this->getAttribute($context["categories"], "thumb", array());
                                        echo "\" alt=\"\" >
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 209
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['categories'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 211
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 213
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute($context["submenu"], "content_type", array()) == 6)) {
                            // line 214
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (($this->getAttribute($this->getAttribute($context["submenu"], "productlist", array()), "show_title", array()) == 1)) {
                                // line 215
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"title-submenu\">";
                                echo $this->getAttribute($this->getAttribute($context["submenu"], "name", array()), (isset($context["lang_id"]) ? $context["lang_id"] : null), array(), "array");
                                echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 217
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            if ($this->getAttribute($this->getAttribute($context["submenu"], "productlist", array()), "products", array())) {
                                // line 218
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["submenu"], "productlist", array()), "products", array()));
                                foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                                    // line 219
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    $context["itempage"] = (($this->getAttribute($this->getAttribute($context["submenu"], "productlist", array()), "col", array())) ? ((12 / $this->getAttribute($this->getAttribute($context["submenu"], "productlist", array()), "col", array()))) : (4));
                                    // line 220
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-xs-";
                                    echo (isset($context["itempage"]) ? $context["itempage"] : null);
                                    echo " ";
                                    echo $this->getAttribute($context["submenu"], "class_menu", array());
                                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"product-thumb\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"image\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                                    // line 223
                                    echo $this->getAttribute($context["product"], "href", array());
                                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img class=\"lazyload\" data-sizes=\"auto\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" data-src=\"";
                                    // line 224
                                    echo $this->getAttribute($context["product"], "thumb", array());
                                    echo "\" alt=\"";
                                    echo $this->getAttribute($context["product"], "name", array());
                                    echo "\" title=\"";
                                    echo $this->getAttribute($context["product"], "name", array());
                                    echo "\"  />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"caption\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<h4><a href=\"";
                                    // line 229
                                    echo $this->getAttribute($context["product"], "href", array());
                                    echo "\">";
                                    echo $this->getAttribute($context["product"], "name", array());
                                    echo "</a></h4>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p>";
                                    // line 230
                                    echo $this->getAttribute($context["product"], "description", array());
                                    echo "</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 231
                                    if ($this->getAttribute($context["product"], "rating", array())) {
                                        // line 232
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"rating\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        // line 233
                                        $context['_parent'] = $context;
                                        $context['_seq'] = twig_ensure_traversable(range(1, 5));
                                        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                                            // line 234
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            if (($this->getAttribute($context["product"], "rating", array()) < $context["i"])) {
                                                // line 235
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"fa fa-stack\"><i class=\"fa fa-star-o fa-stack-2x\"></i></span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            } else {
                                                // line 237
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"fa fa-stack\"><i class=\"fa fa-star fa-stack-2x\"></i><i class=\"fa fa-star-o fa-stack-2x\"></i></span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            }
                                            // line 239
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        }
                                        $_parent = $context['_parent'];
                                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                                        $context = array_intersect_key($context, $_parent) + $_parent;
                                        // line 240
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 242
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 243
                                    if ($this->getAttribute($context["product"], "price", array())) {
                                        // line 244
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p class=\"price\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        // line 245
                                        if ( !$this->getAttribute($context["product"], "special", array())) {
                                            // line 246
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            echo $this->getAttribute($context["product"], "price", array());
                                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t   \t\t";
                                        } else {
                                            // line 248
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"price-new\">";
                                            echo $this->getAttribute($context["product"], "special", array());
                                            echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"price-old\">";
                                            // line 249
                                            echo $this->getAttribute($context["product"], "price", array());
                                            echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t   \t\t";
                                        }
                                        // line 251
                                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t   \t\t";
                                        // line 252
                                        if ($this->getAttribute($context["product"], "tax", array())) {
                                            // line 253
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"price-tax\">";
                                            echo $this->getAttribute($context["product"], "tax", array());
                                            echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        }
                                        // line 255
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 257
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t  \t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t  \t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t \t";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 262
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 263
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['submenu'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 266
                    echo "\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t
\t\t\t\t\t\t\t\t\t";
                }
                // line 270
                echo "\t\t\t\t\t\t\t\t</li>\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
            } else {
                // line 271
                echo "\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<li class=\"";
                // line 272
                echo (isset($context["class"]) ? $context["class"] : null);
                echo "\" ";
                echo (isset($context["title"]) ? $context["title"] : null);
                echo ">
\t\t\t\t\t\t\t\t\t<p class='close-menu'></p>
\t\t\t\t\t\t\t\t\t";
                // line 274
                if ((twig_test_iterable($this->getAttribute($context["row"], "submenu", array())) && $this->getAttribute($context["row"], "submenu", array()))) {
                    // line 275
                    echo "\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    echo $this->getAttribute($context["row"], "link", array());
                    echo "\" class=\"";
                    echo (isset($context["class_link"]) ? $context["class_link"] : null);
                    echo "\" ";
                    echo (isset($context["target"]) ? $context["target"] : null);
                    echo ">
\t\t\t\t\t\t\t\t\t\t\t<strong>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 277
                    echo ((((isset($context["icon_font"]) ? $context["icon_font"] : null) . (isset($context["icon"]) ? $context["icon"] : null)) . $this->getAttribute($this->getAttribute($context["row"], "name", array()), (isset($context["lang_id"]) ? $context["lang_id"] : null), array(), "array")) . $this->getAttribute($context["row"], "description", array()));
                    echo "
\t\t\t\t\t\t\t\t\t\t\t</strong>
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 279
                    echo (isset($context["label_item"]) ? $context["label_item"] : null);
                    echo "
\t\t\t\t\t\t\t\t\t\t\t<b class='caret'></b>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 283
                    echo "\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    echo $this->getAttribute($context["row"], "link", array());
                    echo "\" class=\"";
                    echo (isset($context["class_link"]) ? $context["class_link"] : null);
                    echo "\" ";
                    echo (isset($context["target"]) ? $context["target"] : null);
                    echo ">
\t\t\t\t\t\t\t\t\t\t\t<strong>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 285
                    echo ((((isset($context["icon_font"]) ? $context["icon_font"] : null) . (isset($context["icon"]) ? $context["icon"] : null)) . $this->getAttribute($this->getAttribute($context["row"], "name", array()), (isset($context["lang_id"]) ? $context["lang_id"] : null), array(), "array")) . $this->getAttribute($context["row"], "description", array()));
                    echo "
\t\t\t\t\t\t\t\t\t\t\t</strong>
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 287
                    echo (isset($context["label_item"]) ? $context["label_item"] : null);
                    echo "
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t";
                }
                // line 290
                echo "
\t\t\t\t\t\t\t\t\t";
                // line 291
                if ((twig_test_iterable($this->getAttribute($context["row"], "submenu", array())) && $this->getAttribute($context["row"], "submenu", array()))) {
                    // line 292
                    echo "\t\t\t\t\t\t\t\t\t\t<div class=\"sub-menu\" style=\"width: ";
                    echo $this->getAttribute($context["row"], "submenu_width", array());
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"content\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 295
                    $context["row_fluid"] = 0;
                    // line 296
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["row"], "submenu", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["submenu"]) {
                        // line 297
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        if ((((isset($context["row_fluid"]) ? $context["row_fluid"] : null) + $this->getAttribute($context["submenu"], "content_width", array())) > 12)) {
                            // line 298
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["row_fluid"] = $this->getAttribute($context["submenu"], "content_width", array());
                            // line 299
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div><div class=\"border\"></div><div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 301
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["row_fluid"] = ((isset($context["row_fluid"]) ? $context["row_fluid"] : null) + $this->getAttribute($context["submenu"], "content_width", array()));
                            // line 302
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 303
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-";
                        echo $this->getAttribute($context["submenu"], "content_width", array());
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 304
                        if (($this->getAttribute($context["submenu"], "content_type", array()) == 0)) {
                            // line 305
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"html ";
                            echo $this->getAttribute($context["submenu"], "class_menu", array());
                            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 306
                            echo $this->getAttribute($context["submenu"], "html", array());
                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute(                        // line 308
$context["submenu"], "content_type", array()) == 1)) {
                            // line 309
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (twig_test_iterable($this->getAttribute($context["submenu"], "product", array()))) {
                                // line 310
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"product ";
                                echo $this->getAttribute($context["submenu"], "class_menu", array());
                                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"image\"><a href=\"";
                                // line 311
                                echo $this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "link", array());
                                echo "\" onclick=\"window.location = '";
                                echo $this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "link", array());
                                echo "'\"><img class=\"lazyload\" data-sizes=\"auto\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" data-src=\"";
                                echo $this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "image", array());
                                echo "\" alt=\"\"></a></div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"name\"><a href=\"";
                                // line 312
                                echo $this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "link", array());
                                echo "\" onclick=\"window.location = '";
                                echo $this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "link", array());
                                echo "'\">";
                                echo $this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "name", array());
                                echo "</a></div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"price\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 314
                                if ( !$this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "special", array())) {
                                    // line 315
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    echo $this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "price", array());
                                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                } else {
                                    // line 317
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    echo $this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "special", array());
                                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 319
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 322
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute($context["submenu"], "content_type", array()) == 2)) {
                            // line 323
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"categories ";
                            echo $this->getAttribute($context["submenu"], "class_menu", array());
                            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 324
                            echo $this->getAttribute($context["submenu"], "categories", array());
                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute(                        // line 326
$context["submenu"], "content_type", array()) == 3)) {
                            // line 327
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (twig_test_iterable($this->getAttribute($context["submenu"], "manufactures", array()))) {
                                // line 328
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<ul class=\"manufacturer ";
                                echo $this->getAttribute($context["submenu"], "class_menu", array());
                                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 329
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["submenu"], "manufactures", array()));
                                foreach ($context['_seq'] as $context["_key"] => $context["manufacturer"]) {
                                    // line 330
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
                                    echo $this->getAttribute($context["manufacturer"], "link", array());
                                    echo "\">";
                                    echo $this->getAttribute($context["manufacturer"], "name", array());
                                    echo "</a></li>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['manufacturer'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 332
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 334
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute($context["submenu"], "content_type", array()) == 4)) {
                            // line 335
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (($this->getAttribute($this->getAttribute($context["submenu"], "images", array()), "show_title", array()) == 1)) {
                                // line 336
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"title-submenu\">";
                                echo $this->getAttribute($this->getAttribute($context["submenu"], "name", array()), (isset($context["lang_id"]) ? $context["lang_id"] : null), array(), "array");
                                echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 338
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"link ";
                            echo $this->getAttribute($context["submenu"], "class_menu", array());
                            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 339
                            echo $this->getAttribute($this->getAttribute($context["submenu"], "images", array()), "link", array());
                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute(                        // line 341
$context["submenu"], "content_type", array()) == 5)) {
                            // line 342
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            if ($this->getAttribute($this->getAttribute($context["submenu"], "subcategory", array()), "categories", array())) {
                                // line 343
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<ul class=\"subcategory ";
                                echo $this->getAttribute($context["submenu"], "class_menu", array());
                                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 344
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["submenu"], "subcategory", array()), "categories", array()));
                                foreach ($context['_seq'] as $context["_key"] => $context["categories"]) {
                                    // line 345
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 346
                                    if (($this->getAttribute($this->getAttribute($context["submenu"], "subcategory", array()), "show_title", array()) == 1)) {
                                        // line 347
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                                        echo $this->getAttribute($context["categories"], "href", array());
                                        echo "\" class=\"title-submenu ";
                                        echo $this->getAttribute($context["submenu"], "class_menu", array());
                                        echo "\">";
                                        echo $this->getAttribute($context["categories"], "name", array());
                                        echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 349
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    if ($this->getAttribute($context["categories"], "categories", array())) {
                                        // line 350
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        echo $this->getAttribute($context["categories"], "categories", array());
                                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 352
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    if (($this->getAttribute($this->getAttribute($context["submenu"], "subcategory", array()), "show_image", array()) == 1)) {
                                        // line 353
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img class=\"lazyload\" data-sizes=\"auto\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" data-src=\"";
                                        echo $this->getAttribute($context["categories"], "thumb", array());
                                        echo "\" alt=\"\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 355
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</li>\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['categories'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 357
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 359
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute($context["submenu"], "content_type", array()) == 6)) {
                            // line 360
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (($this->getAttribute($this->getAttribute($context["submenu"], "productlist", array()), "show_title", array()) == 1)) {
                                // line 361
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"title-submenu\">";
                                echo $this->getAttribute($this->getAttribute($context["submenu"], "name", array()), (isset($context["lang_id"]) ? $context["lang_id"] : null), array(), "array");
                                echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 363
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            if ($this->getAttribute($this->getAttribute($context["submenu"], "productlist", array()), "products", array())) {
                                // line 364
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["submenu"], "productlist", array()), "products", array()));
                                foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                                    // line 365
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    $context["itempage"] = (($this->getAttribute($this->getAttribute($context["submenu"], "productlist", array()), "col", array())) ? ((12 / $this->getAttribute($this->getAttribute($context["submenu"], "productlist", array()), "col", array()))) : (4));
                                    // line 366
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-";
                                    echo (isset($context["itempage"]) ? $context["itempage"] : null);
                                    echo " ";
                                    echo $this->getAttribute($context["submenu"], "class_menu", array());
                                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"product-thumb\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"image\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                                    // line 369
                                    echo $this->getAttribute($context["product"], "href", array());
                                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img class=\"lazyload\" data-sizes=\"auto\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" data-src=\"";
                                    // line 370
                                    echo $this->getAttribute($context["product"], "thumb", array());
                                    echo "\" alt=\"";
                                    echo $this->getAttribute($context["product"], "name", array());
                                    echo "\" title=\"";
                                    echo $this->getAttribute($context["product"], "name", array());
                                    echo "\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"caption\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<h4><a href=\"";
                                    // line 375
                                    echo $this->getAttribute($context["product"], "href", array());
                                    echo "\">";
                                    echo $this->getAttribute($context["product"], "name", array());
                                    echo "</a></h4>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p>";
                                    // line 376
                                    echo $this->getAttribute($context["product"], "description", array());
                                    echo "</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 377
                                    if ($this->getAttribute($context["product"], "rating", array())) {
                                        // line 378
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"rating\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        // line 379
                                        $context['_parent'] = $context;
                                        $context['_seq'] = twig_ensure_traversable(range(1, 5));
                                        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                                            // line 380
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            if (($this->getAttribute($context["product"], "rating", array()) < $context["i"])) {
                                                // line 381
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"fa fa-stack\"><i class=\"fa fa-star-o fa-stack-2x\"></i></span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            } else {
                                                // line 383
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"fa fa-stack\"><i class=\"fa fa-star fa-stack-2x\"></i><i class=\"fa fa-star-o fa-stack-2x\"></i></span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            }
                                            // line 385
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        }
                                        $_parent = $context['_parent'];
                                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                                        $context = array_intersect_key($context, $_parent) + $_parent;
                                        // line 386
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 388
                                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 389
                                    if ($this->getAttribute($context["product"], "price", array())) {
                                        // line 390
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p class=\"price\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        // line 391
                                        if ( !$this->getAttribute($context["product"], "special", array())) {
                                            // line 392
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            echo $this->getAttribute($context["product"], "price", array());
                                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t   \t";
                                        } else {
                                            // line 394
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"price-new\">";
                                            echo $this->getAttribute($context["product"], "special", array());
                                            echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"price-old\">";
                                            // line 395
                                            echo $this->getAttribute($context["product"], "price", array());
                                            echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t   \t";
                                        }
                                        // line 397
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t   \t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t   \t";
                                        // line 398
                                        if ($this->getAttribute($context["product"], "tax", array())) {
                                            // line 399
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"price-tax\">";
                                            echo $this->getAttribute($context["product"], "tax", array());
                                            echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        }
                                        // line 401
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 403
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t  \t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t  \t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t \t\t\t\t";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 408
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 409
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 410
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['submenu'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 412
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
                }
                // line 416
                echo "\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
            }
            // line 418
            echo "\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 419
        echo "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t</div>
\t</nav>
\t";
        // line 425
        if (($this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "orientation", array()) == 1)) {
            // line 426
            echo "\t\t</div>
\t";
        }
        // line 428
        echo "</div>

";
        // line 430
        if (($this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "orientation", array()) == 1)) {
            // line 431
            echo "<script type=\"text/javascript\">
\t\$(document).ready(function() {
\t\tvar itemver =  ";
            // line 433
            echo $this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "show_itemver", array());
            echo ";
\t\tif(itemver <= \$( \".vertical ul.megamenu >li\" ).length)
\t\t\t\$('.vertical ul.megamenu').append('<li class=\"loadmore\"><i class=\"fa fa-plus-square-o\"></i><span class=\"more-view\"> ";
            // line 435
            echo (isset($context["text_more_category"]) ? $context["text_more_category"] : null);
            echo "</span></li>');
\t\t\$('.horizontal ul.megamenu li.loadmore').remove();

\t\tvar show_itemver = itemver-1 ;
\t\t\$('ul.megamenu > li.item-vertical').each(function(i){
\t\t\tif(i>show_itemver){
\t\t\t\t\t\$(this).css('display', 'none');
\t\t\t}
\t\t});
\t\t\$(\".megamenu .loadmore\").click(function(){
\t\t\tif(\$(this).hasClass('open')){
\t\t\t\t\$('ul.megamenu li.item-vertical').each(function(i){
\t\t\t\t\tif(i>show_itemver){
\t\t\t\t\t\t\$(this).slideUp(200);
\t\t\t\t\t\t\$(this).css('display', 'none');
\t\t\t\t\t}
\t\t\t\t});
\t\t\t\t\$(this).removeClass('open');
\t\t\t\t\$('.loadmore').html('<i class=\"fa fa-plus-square-o\"></i><span class=\"more-view\">";
            // line 453
            echo (isset($context["text_more_category"]) ? $context["text_more_category"] : null);
            echo "</span>');
\t\t\t}else{
\t\t\t\t\$('ul.megamenu li.item-vertical').each(function(i){
\t\t\t\t\tif(i>show_itemver){
\t\t\t\t\t\t\$(this).slideDown(200);
\t\t\t\t\t}
\t\t\t\t});
\t\t\t\t\$(this).addClass('open');
\t\t\t\t\$('.loadmore').html('<i class=\"fa fa-minus-square-o\"></i><span class=\"more-view\">";
            // line 461
            echo (isset($context["text_close_category"]) ? $context["text_close_category"] : null);
            echo "</span>');
\t\t\t}
\t\t});
\t});
</script>
";
        }
        // line 467
        echo "<script>
\$(document).ready(function(){
\t\$('a[href=\"";
        // line 469
        echo (isset($context["actual_link"]) ? $context["actual_link"] : null);
        echo "\"]').each(function() {
\t\t\$(this).parents('.with-sub-menu').addClass('sub-active');
\t});  
});
</script>";
    }

    public function getTemplateName()
    {
        return "so-techcity/template/extension/module/so_megamenu/default.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1292 => 469,  1288 => 467,  1279 => 461,  1268 => 453,  1247 => 435,  1242 => 433,  1238 => 431,  1236 => 430,  1232 => 428,  1228 => 426,  1226 => 425,  1218 => 419,  1212 => 418,  1208 => 416,  1202 => 412,  1195 => 410,  1192 => 409,  1189 => 408,  1179 => 403,  1175 => 401,  1169 => 399,  1167 => 398,  1164 => 397,  1159 => 395,  1154 => 394,  1148 => 392,  1146 => 391,  1143 => 390,  1141 => 389,  1138 => 388,  1134 => 386,  1128 => 385,  1124 => 383,  1120 => 381,  1117 => 380,  1113 => 379,  1110 => 378,  1108 => 377,  1104 => 376,  1098 => 375,  1086 => 370,  1082 => 369,  1073 => 366,  1070 => 365,  1065 => 364,  1062 => 363,  1056 => 361,  1053 => 360,  1050 => 359,  1046 => 357,  1039 => 355,  1033 => 353,  1030 => 352,  1024 => 350,  1021 => 349,  1011 => 347,  1009 => 346,  1006 => 345,  1002 => 344,  997 => 343,  994 => 342,  992 => 341,  987 => 339,  982 => 338,  976 => 336,  973 => 335,  970 => 334,  966 => 332,  955 => 330,  951 => 329,  946 => 328,  943 => 327,  941 => 326,  936 => 324,  931 => 323,  928 => 322,  923 => 319,  917 => 317,  911 => 315,  909 => 314,  900 => 312,  892 => 311,  887 => 310,  884 => 309,  882 => 308,  877 => 306,  872 => 305,  870 => 304,  865 => 303,  862 => 302,  859 => 301,  855 => 299,  852 => 298,  849 => 297,  844 => 296,  842 => 295,  835 => 292,  833 => 291,  830 => 290,  824 => 287,  819 => 285,  809 => 283,  802 => 279,  797 => 277,  787 => 275,  785 => 274,  778 => 272,  775 => 271,  771 => 270,  765 => 266,  755 => 263,  752 => 262,  742 => 257,  738 => 255,  732 => 253,  730 => 252,  727 => 251,  722 => 249,  717 => 248,  711 => 246,  709 => 245,  706 => 244,  704 => 243,  701 => 242,  697 => 240,  691 => 239,  687 => 237,  683 => 235,  680 => 234,  676 => 233,  673 => 232,  671 => 231,  667 => 230,  661 => 229,  649 => 224,  645 => 223,  636 => 220,  633 => 219,  628 => 218,  625 => 217,  619 => 215,  616 => 214,  613 => 213,  609 => 211,  602 => 209,  596 => 207,  593 => 206,  587 => 204,  584 => 203,  574 => 201,  572 => 200,  569 => 199,  565 => 198,  560 => 197,  557 => 196,  555 => 195,  550 => 193,  545 => 192,  539 => 190,  536 => 189,  533 => 188,  529 => 186,  518 => 184,  514 => 183,  509 => 182,  506 => 181,  504 => 180,  497 => 179,  494 => 178,  489 => 175,  483 => 173,  477 => 171,  475 => 170,  466 => 168,  458 => 167,  453 => 166,  450 => 165,  448 => 164,  441 => 163,  439 => 162,  434 => 161,  431 => 160,  428 => 159,  424 => 157,  421 => 156,  418 => 155,  413 => 154,  411 => 153,  406 => 150,  400 => 148,  394 => 146,  391 => 145,  389 => 144,  386 => 143,  380 => 140,  375 => 138,  365 => 136,  358 => 132,  353 => 130,  343 => 128,  341 => 127,  333 => 125,  331 => 124,  328 => 123,  325 => 122,  322 => 121,  320 => 120,  317 => 119,  314 => 118,  311 => 117,  309 => 116,  306 => 115,  303 => 114,  300 => 113,  298 => 112,  295 => 111,  292 => 110,  289 => 109,  286 => 108,  283 => 107,  280 => 106,  277 => 105,  274 => 104,  272 => 103,  269 => 102,  266 => 101,  263 => 100,  261 => 99,  258 => 98,  255 => 97,  252 => 96,  250 => 95,  247 => 94,  244 => 93,  241 => 92,  239 => 91,  236 => 90,  233 => 89,  230 => 88,  228 => 87,  225 => 86,  222 => 85,  219 => 84,  217 => 83,  214 => 82,  211 => 81,  208 => 80,  205 => 79,  202 => 78,  200 => 77,  197 => 76,  194 => 75,  191 => 74,  188 => 73,  185 => 72,  182 => 71,  179 => 70,  175 => 69,  172 => 68,  167 => 65,  161 => 63,  157 => 61,  155 => 60,  151 => 59,  148 => 58,  146 => 57,  132 => 56,  126 => 52,  122 => 50,  118 => 48,  116 => 47,  113 => 46,  109 => 44,  105 => 42,  103 => 41,  100 => 40,  90 => 32,  83 => 28,  69 => 17,  62 => 12,  60 => 11,  42 => 10,  39 => 9,  33 => 7,  31 => 6,  28 => 5,  24 => 3,  22 => 2,  19 => 1,);
    }
}
/* <div class="responsive megamenu-style-dev">*/
/* 	{% if ustawienia.orientation == 1 %}*/
/* 	<div class="so-vertical-menu no-gutter">*/
/* 	{% endif %}*/
/* 	*/
/* 	{% if ustawienia.disp_title_module and head_name %}*/
/* 		<h3>{{ head_name }}</h3>*/
/* 	{% endif %}*/
/* 	<nav class="navbar-default">*/
/* 		<div class=" container-megamenu {% if ustawienia.full_width != 1 %} {{ 'container' }} {% endif %} {% if ustawienia.orientation == 1 %} {{ 'vertical ' }} {% else %} {{ 'horizontal' }} {% endif %}">*/
/* 		{% if ustawienia.orientation == 1 %}*/
/* 			<div id="menuHeading">*/
/* 				<div class="megamenuToogle-wrapper">*/
/* 					<div class="megamenuToogle-pattern">*/
/* 						<div class="container">*/
/* 							<div><span></span><span></span><span></span></div>*/
/* 							<b>{{ navigation_text }}</b>*/
/* 						</div>*/
/* 					</div>*/
/* 				</div>*/
/* 			</div>*/
/* 			<div class="navbar-header">*/
/* 				<button type="button" id="show-verticalmenu" data-toggle="collapse"  class="navbar-toggle">*/
/* 					<!-- <span class="icon-bar"></span>*/
/* 					<span class="icon-bar"></span>*/
/* 					<span class="icon-bar"></span> -->*/
/* 					<i class="fa fa-bars"></i>*/
/* 					<span>{{ navigation_text }}</span>*/
/* 				</button>*/
/* 			</div>*/
/* 		{% else %}*/
/* 			<div class="navbar-header">*/
/* 				<button type="button" id="show-megamenu" data-toggle="collapse"  class="navbar-toggle">*/
/* 					<span class="icon-bar"></span>*/
/* 					<span class="icon-bar"></span>*/
/* 					<span class="icon-bar"></span>*/
/* 				</button>*/
/* 			</div>*/
/* 		{% endif %}*/
/* */
/* 		{% if ustawienia.orientation == 1 %}*/
/* 			<div class="vertical-wrapper">*/
/* 		{% else %}*/
/* 			<div class="megamenu-wrapper">*/
/* 		{% endif %}*/
/* */
/* 		{% if ustawienia.orientation == 1 %}*/
/* 			<span id="remove-verticalmenu" class="fa fa-times"></span>*/
/* 		{% else %}*/
/* 			<span id="remove-megamenu" class="fa fa-times"></span>*/
/* 		{% endif %}*/
/* */
/* 			<div class="megamenu-pattern">*/
/* 				<div class="container">*/
/* 					<ul class="megamenu"*/
/* 					data-transition="{% if ustawienia.animation != '' %}{{ ustawienia.animation }}{% else %}{{ 'none' }}{% endif %}" data-animationtime="{% if ustawienia.animation_time > 0 and ustawienia.animation_time < 5000 %}{{ ustawienia.animation_time }}{% else %}{{ 500 }}{% endif %}">*/
/* 						{% if ustawienia.home_item == 'icon' or ustawienia.home_item == 'text' %}*/
/* 							<li class="home">*/
/* 								<a href="{{ home }}">*/
/* 								{% if ustawienia.home_item == 'icon' %}*/
/* 									<i class="fa fa-home"></i>*/
/* 								{% else %}*/
/* 									<span><strong>{{ home_text }}</strong></span>*/
/* 								{% endif %}*/
/* 								</a>*/
/* 							</li>*/
/* 						{% endif %}*/
/* 						*/
/* 						{% for key, row in menu %}*/
/* 							{% set class 		= '' %}*/
/* 							{% set icon_font 	= '' %}*/
/* 							{% set class_link 	= 'clearfix' %}*/
/* 							{% set label_item 	= '' %}*/
/* 							{% set title 		= false %}*/
/* 							{% set target 		= false %}*/
/* */
/* 							{% if 'no_image' in row.icon %}*/
/* 								{% set icon = '' %}*/
/* 							{% else %}*/
/* 								{% set icon = row.icon %}*/
/* 							{% endif %}*/
/* 							*/
/* 							{% if row.description != '' %}*/
/* 								{% set class_link = class_link~' description' %}*/
/* 							{% endif %}*/
/* */
/* 							{% if route and route == row.route and path and path == row.path %}*/
/* 								{% set class = class~' active_menu' %}*/
/* 							{% endif %}*/
/* */
/* 							{% if row.class_menu %}*/
/* 								{% set class = class~row.class_menu %}*/
/* 							{% endif %}*/
/* */
/* 							{% if row.icon_font %}*/
/* 								{% set icon_font = icon_font~'<i class="'~row.icon_font~'"></i>' %}*/
/* 							{% endif %}*/
/* */
/* 							{% if row.label_item %}*/
/* 								{% set label_item = label_item~'<span class="label'~row.label_item~'"></span>' %}*/
/* 							{% endif %}*/
/* */
/* 							{% if row.submenu is iterable and row.submenu %}*/
/* 								{% set class = class~' with-sub-menu' %}*/
/* 								{% if row.submenu_type == 1 %}*/
/* 									{% set class = class~' click' %}*/
/* 								{% else %}*/
/* 									{% set class = class~' hover' %}*/
/* 								{% endif %}*/
/* 							{% endif %}*/
/* */
/* 							{% if row.position == 1 %}*/
/* 								{% set class = class~' pull-right' %}*/
/* 							{% endif %}*/
/* */
/* 							{% if row.submenu_type == 2 %}*/
/* 								{% set title = 'title="hover-intent"' %}*/
/* 							{% endif %}*/
/* */
/* 							{% if row.new_window == 1 %}*/
/* 								{% set target = 'target="_blank"' %}*/
/* 							{% endif %}*/
/* */
/* 							{% if ustawienia.orientation == 1 %}*/
/* 								<li class="item-vertical {{ class }}" {{ title }}>*/
/* 									<p class='close-menu'></p>*/
/* 									{% if row.submenu is iterable and row.submenu %}*/
/* 										<a href="{{ row.link }}" class="{{ class_link }}" {{ target }}>*/
/* 											<span>*/
/* 												<strong>{{ icon_font~icon~row.name[lang_id]~row.description }}</strong>*/
/* 											</span>*/
/* 											{{ label_item }}*/
/* 											<b class='fa fa-angle-right' ></b>*/
/* 										</a>*/
/* 									{% else %}*/
/* 								 		<a href="{{ row.link }}" class="{{ class_link }}" {{ target }}>*/
/* 											<span>*/
/* 												<strong>{{ icon_font~icon~row.name[lang_id]~row.description }}</strong>*/
/* 											</span>*/
/* 											{{ label_item }}*/
/* 										</a>*/
/* 									{% endif %}*/
/* */
/* 									{% if row.submenu is iterable and row.submenu %}*/
/* 										{% if '%' in row.submenu_width %}*/
/* 											<div class="sub-menu" data-subwidth ="{{ row.submenu_width|replace({'%': ''}) }}">*/
/* 										{% else %}*/
/* 											<div class="sub-menu" style="width:{{ row.submenu_width }}">*/
/* 										{% endif %}*/
/* */
/* 										<div class="content">*/
/* 											<div class="row">*/
/* 												{% set row_fluid = 0 %}*/
/* 												{% for submenu in row.submenu %}*/
/* 													{% if row_fluid+submenu.content_width > 12 %}*/
/* 														{% set row_fluid = submenu.content_width %}*/
/* 										 				</div><div class="border"></div><div class="row">*/
/* 													{% else %}*/
/* 														{% set row_fluid = row_fluid+submenu.content_width %}*/
/* 													{% endif %}*/
/* 													<div class="col-sm-{{ submenu.content_width }}">*/
/* 														{% if submenu.content_type == 0 %}*/
/* 															<div class="html {{submenu.class_menu }}">{{ submenu.html }}</div>*/
/* 														{% elseif submenu.content_type == 1 %}*/
/* 															{% if submenu.product is iterable %}*/
/* 																<div class="product {{ submenu.class_menu }}">*/
/* 																	<div class="image"><a href="{{ submenu.product.link }}" onclick="window.location = '{{ submenu.product.link }}'"><img class="lazyload" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ submenu.product.image }}" alt=""></a></div>*/
/* 																	<div class="name"><a href="{{ submenu.product.link }}" onclick="window.location = '{{ submenu.product.link }}'">{{ submenu.product.name }}</a></div>*/
/* 																	<div class="price">*/
/* 																		{% if not submenu.product.special %}*/
/* 																			{{ submenu.product.price }}*/
/* 																		{% else %}*/
/* 																			{{ submenu.product.special }}*/
/* 																		{% endif %}*/
/* 																	</div>*/
/* 																</div>*/
/* 															{% endif %}*/
/* 														{% elseif submenu.content_type == 2 %}*/
/* 															<div class="categories {{ submenu.class_menu }}">{{ submenu.categories }}</div>*/
/* 														{% elseif submenu.content_type == 3 %}*/
/* 															{% if submenu.manufactures is iterable %}*/
/* 																<ul class="manufacturer {{ submenu.class_menu }}">*/
/* 																	{% for manufacturer in submenu.manufactures %}*/
/* 																		<li><a href="{{ manufacturer.link }}">{{ manufacturer.name }}</a></li>*/
/* 																	{% endfor %}*/
/* 																</ul>*/
/* 															{% endif %}*/
/* 														{% elseif submenu.content_type == 4 %}*/
/* 															{% if submenu.images.show_title == 1 %}*/
/* 																<span class="title-submenu">{{ submenu.name[lang_id] }}</span>*/
/* 															{% endif %}*/
/* 															<div class="link {{ submenu.class_menu }}">*/
/* 																{{ submenu.images.link }}*/
/* 															</div>*/
/* 														{% elseif submenu.content_type == 5 %}*/
/* 															{% if submenu.subcategory.categories %}*/
/* 																<ul class="subcategory {{ submenu.class_menu }}">*/
/* 																	{% for categories in submenu.subcategory.categories %}*/
/* 																		<li>*/
/* 																			{% if submenu.subcategory.show_title == 1 %}*/
/* 																				<a href="{{ categories.href }}" class="title-submenu {{ submenu.class_menu }}">{{ categories.name }}</a>*/
/* 																			{% endif %}*/
/* 																			{% if categories.categories %}*/
/* 																				{{ categories.categories }}*/
/* 																			{% endif %}*/
/* 																			{% if submenu.subcategory.show_image == 1 %}*/
/* 																				<img class="lazyload" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ categories.thumb }}" alt="" >*/
/* 																			{% endif %}*/
/* 																		</li>*/
/* 																	{% endfor %}*/
/* 																</ul>*/
/* 															{% endif %}*/
/* 														{% elseif submenu.content_type == 6 %}*/
/* 															{% if submenu.productlist.show_title == 1 %}*/
/* 																<span class="title-submenu">{{ submenu.name[lang_id] }}</span>*/
/* 															{% endif %}*/
/* 															{% if submenu.productlist.products %}*/
/* 																{% for product in submenu.productlist.products %}*/
/* 																	{% set itempage = submenu.productlist.col ? 12/submenu.productlist.col : 4 %}*/
/* 																	<div class="col-xs-{{ itempage }} {{ submenu.class_menu }}">*/
/* 																		<div class="product-thumb">*/
/* 																			<div class="image">*/
/* 																				<a href="{{ product.href }}">*/
/* 																					<img class="lazyload" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ product.thumb }}" alt="{{ product.name }}" title="{{ product.name }}"  />*/
/* 																				</a>*/
/* 																			</div>*/
/* 																			<div>*/
/* 																				<div class="caption">*/
/* 																					<h4><a href="{{ product.href }}">{{ product.name }}</a></h4>*/
/* 																					<p>{{ product.description }}</p>*/
/* 																					{% if product.rating %}*/
/* 																						<div class="rating">*/
/* 																							{% for i in 1..5 %}*/
/* 																								{% if product.rating < i %}*/
/* 																									<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>*/
/* 																								{% else %}*/
/* 																									<span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>*/
/* 																								{% endif %}*/
/* 																							{% endfor %}*/
/* 																						</div>*/
/* 																					{% endif %}*/
/* 																			*/
/* 																					{% if product.price %}*/
/* 																						<p class="price">*/
/* 																							{% if not product.special %}*/
/* 																								{{ product.price }}*/
/* 																					   		{% else %}*/
/* 																								<span class="price-new">{{ product.special }}</span>*/
/* 																								<span class="price-old">{{ product.price }}</span>*/
/* 																					   		{% endif %}*/
/* */
/* 																					   		{% if product.tax %}*/
/* 																								<span class="price-tax">{{ product.tax }}</span>*/
/* 																							{% endif %}*/
/* 																						</p>*/
/* 																					{% endif %}*/
/* 																		  		</div>*/
/* 																			</div>*/
/* 																	  	</div>*/
/* 																	</div>*/
/* 															 	{% endfor %}*/
/* 															{% endif %}*/
/* 														{% endif %}													*/
/* 													</div>*/
/* 												{% endfor %}*/
/* 											</div>*/
/* 										</div>				*/
/* 										</div>			*/
/* 									{% endif %}*/
/* 								</li>							*/
/* 							{% else %}						*/
/* 								<li class="{{ class }}" {{ title }}>*/
/* 									<p class='close-menu'></p>*/
/* 									{% if row.submenu is iterable and row.submenu %}*/
/* 										<a href="{{ row.link }}" class="{{ class_link }}" {{ target }}>*/
/* 											<strong>*/
/* 												{{ icon_font~icon~row.name[lang_id]~row.description }}*/
/* 											</strong>*/
/* 											{{ label_item }}*/
/* 											<b class='caret'></b>*/
/* 										</a>*/
/* 									{% else %}*/
/* 										<a href="{{ row.link }}" class="{{ class_link }}" {{ target }}>*/
/* 											<strong>*/
/* 												{{ icon_font~icon~row.name[lang_id]~row.description }}*/
/* 											</strong>*/
/* 											{{ label_item }}*/
/* 										</a>*/
/* 									{% endif %}*/
/* */
/* 									{% if row.submenu is iterable and row.submenu %}*/
/* 										<div class="sub-menu" style="width: {{ row.submenu_width }}">*/
/* 											<div class="content">*/
/* 												<div class="row">*/
/* 													{% set row_fluid = 0 %}*/
/* 													{% for submenu in row.submenu %}*/
/* 														{% if row_fluid+submenu.content_width > 12 %}*/
/* 															{% set row_fluid = submenu.content_width %}*/
/* 															</div><div class="border"></div><div class="row">*/
/* 														{% else %}*/
/* 															{% set row_fluid = row_fluid+submenu.content_width %}*/
/* 														{% endif %}*/
/* 														<div class="col-sm-{{ submenu.content_width }}">*/
/* 															{% if submenu.content_type == 0 %}*/
/* 																<div class="html {{ submenu.class_menu }}">*/
/* 																	{{ submenu.html }}*/
/* 																</div>*/
/* 															{% elseif submenu.content_type == 1 %}*/
/* 																{% if submenu.product is iterable %}*/
/* 																	<div class="product {{ submenu.class_menu }}">*/
/* 																		<div class="image"><a href="{{ submenu.product.link }}" onclick="window.location = '{{ submenu.product.link }}'"><img class="lazyload" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ submenu.product.image }}" alt=""></a></div>*/
/* 																		<div class="name"><a href="{{ submenu.product.link }}" onclick="window.location = '{{ submenu.product.link }}'">{{ submenu.product.name }}</a></div>*/
/* 																		<div class="price">*/
/* 																			{% if not submenu.product.special %}*/
/* 																				{{ submenu.product.price }}*/
/* 																			{% else %}*/
/* 																				{{ submenu.product.special }}*/
/* 																			{% endif %}*/
/* 																		</div>*/
/* 																	</div>*/
/* 																{% endif %}*/
/* 															{% elseif submenu.content_type == 2 %}*/
/* 																<div class="categories {{ submenu.class_menu }}">*/
/* 																	{{ submenu.categories }}*/
/* 																</div>															*/
/* 															{% elseif submenu.content_type == 3 %}*/
/* 																{% if submenu.manufactures is iterable %}*/
/* 																	<ul class="manufacturer {{ submenu.class_menu }}">*/
/* 																		{% for manufacturer in submenu.manufactures %}*/
/* 																			<li><a href="{{ manufacturer.link }}">{{ manufacturer.name }}</a></li>*/
/* 																		{% endfor %}*/
/* 																	</ul>*/
/* 																{% endif %}*/
/* 															{% elseif submenu.content_type == 4 %}*/
/* 																{% if submenu.images.show_title == 1 %}*/
/* 																	<span class="title-submenu">{{ submenu.name[lang_id] }}</span>*/
/* 																{% endif %}*/
/* 																<div class="link {{ submenu.class_menu }}">*/
/* 																	{{ submenu.images.link }}*/
/* 																</div>*/
/* 															{% elseif submenu.content_type == 5 %}*/
/* 																{% if submenu.subcategory.categories %}*/
/* 																	<ul class="subcategory {{ submenu.class_menu }}">*/
/* 																		{% for categories in submenu.subcategory.categories %}*/
/* 																			<li>*/
/* 																				{% if submenu.subcategory.show_title == 1 %}*/
/* 																					<a href="{{ categories.href }}" class="title-submenu {{ submenu.class_menu }}">{{ categories.name }}</a>*/
/* 																				{% endif %}*/
/* 																				{% if categories.categories %}*/
/* 																					{{ categories.categories }}*/
/* 																				{% endif %}*/
/* 																				{% if submenu.subcategory.show_image == 1 %}*/
/* 																					<img class="lazyload" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ categories.thumb }}" alt="" />*/
/* 																				{% endif %}*/
/* 																			</li>		*/
/* 																		{% endfor %}*/
/* 																	</ul>*/
/* 																{% endif %}*/
/* 															{% elseif submenu.content_type == 6 %}*/
/* 																{% if submenu.productlist.show_title == 1 %}*/
/* 																	<span class="title-submenu">{{ submenu.name[lang_id] }}</span>*/
/* 																{% endif %}*/
/* 																{% if submenu.productlist.products %}*/
/* 																	{% for product in submenu.productlist.products %}*/
/* 																		{% set itempage = submenu.productlist.col ? 12/submenu.productlist.col : 4 %}*/
/* 																		<div class="col-sm-{{ itempage }} {{ submenu.class_menu }}">*/
/* 																			<div class="product-thumb">*/
/* 																				<div class="image">*/
/* 																					<a href="{{ product.href }}">*/
/* 																						<img class="lazyload" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ product.thumb }}" alt="{{ product.name }}" title="{{ product.name }}"/>*/
/* 																					</a>*/
/* 																				</div>*/
/* 																				<div>*/
/* 																					<div class="caption">*/
/* 																						<h4><a href="{{ product.href }}">{{ product.name }}</a></h4>*/
/* 																						<p>{{ product.description }}</p>*/
/* 																						{% if product.rating %}*/
/* 																							<div class="rating">*/
/* 																								{% for i in 1..5 %}*/
/* 																									{% if product.rating < i %}*/
/* 																										<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>*/
/* 																									{% else %}*/
/* 																										<span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>*/
/* 																									{% endif %}*/
/* 																								{% endfor %}*/
/* 																							</div>*/
/* 																						{% endif %}*/
/* */
/* 																						{% if product.price %}*/
/* 																							<p class="price">*/
/* 																								{% if not product.special %}*/
/* 																									{{ product.price }}*/
/* 																							   	{% else %}*/
/* 																									<span class="price-new">{{ product.special }}</span>*/
/* 																									<span class="price-old">{{ product.price }}</span>*/
/* 																							   	{% endif %}*/
/* 																							   	*/
/* 																							   	{% if product.tax %}*/
/* 																									<span class="price-tax">{{ product.tax }}</span>*/
/* 																								{% endif %}*/
/* 																							</p>*/
/* 																						{% endif %}*/
/* 																			  		</div>*/
/* 																				</div>*/
/* 														  					</div>*/
/* 																		</div>*/
/* 													 				{% endfor %}*/
/* 																{% endif %}*/
/* 															{% endif %}*/
/* 														</div>*/
/* 													{% endfor %}*/
/* 												</div>												*/
/* 											</div>*/
/* 										</div>										*/
/* 									{% endif %}*/
/* 								</li>*/
/* 							{% endif %}*/
/* 						{% endfor %}*/
/* 					</ul>*/
/* 				</div>*/
/* 			</div>*/
/* 		</div>*/
/* 		</div>*/
/* 	</nav>*/
/* 	{% if ustawienia.orientation == 1 %}*/
/* 		</div>*/
/* 	{% endif %}*/
/* </div>*/
/* */
/* {% if ustawienia.orientation == 1 %}*/
/* <script type="text/javascript">*/
/* 	$(document).ready(function() {*/
/* 		var itemver =  {{ ustawienia.show_itemver }};*/
/* 		if(itemver <= $( ".vertical ul.megamenu >li" ).length)*/
/* 			$('.vertical ul.megamenu').append('<li class="loadmore"><i class="fa fa-plus-square-o"></i><span class="more-view"> {{text_more_category}}</span></li>');*/
/* 		$('.horizontal ul.megamenu li.loadmore').remove();*/
/* */
/* 		var show_itemver = itemver-1 ;*/
/* 		$('ul.megamenu > li.item-vertical').each(function(i){*/
/* 			if(i>show_itemver){*/
/* 					$(this).css('display', 'none');*/
/* 			}*/
/* 		});*/
/* 		$(".megamenu .loadmore").click(function(){*/
/* 			if($(this).hasClass('open')){*/
/* 				$('ul.megamenu li.item-vertical').each(function(i){*/
/* 					if(i>show_itemver){*/
/* 						$(this).slideUp(200);*/
/* 						$(this).css('display', 'none');*/
/* 					}*/
/* 				});*/
/* 				$(this).removeClass('open');*/
/* 				$('.loadmore').html('<i class="fa fa-plus-square-o"></i><span class="more-view">{{text_more_category}}</span>');*/
/* 			}else{*/
/* 				$('ul.megamenu li.item-vertical').each(function(i){*/
/* 					if(i>show_itemver){*/
/* 						$(this).slideDown(200);*/
/* 					}*/
/* 				});*/
/* 				$(this).addClass('open');*/
/* 				$('.loadmore').html('<i class="fa fa-minus-square-o"></i><span class="more-view">{{text_close_category}}</span>');*/
/* 			}*/
/* 		});*/
/* 	});*/
/* </script>*/
/* {% endif %}*/
/* <script>*/
/* $(document).ready(function(){*/
/* 	$('a[href="{{ actual_link }}"]').each(function() {*/
/* 		$(this).parents('.with-sub-menu').addClass('sub-active');*/
/* 	});  */
/* });*/
/* </script>*/
