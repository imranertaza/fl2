<?php

/* so-techcity/template/extension/module/so_home_slider/default.twig */
class __TwigTemplate_45d03a7300dae5a02b0d98d56f51fada017a58a20fbe3e98ebe1e5c617afda85 extends Twig_Template
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
        $context["count_item"] = twig_length_filter($this->env, (isset($context["list"]) ? $context["list"] : null));
        // line 2
        echo "
<div class=\"module sohomepage-slider ";
        // line 3
        echo (isset($context["class_suffix"]) ? $context["class_suffix"] : null);
        echo "\">
    ";
        // line 4
        if ((isset($context["disp_title_module"]) ? $context["disp_title_module"] : null)) {
            // line 5
            echo "      <h3 class=\"modtitle\">";
            echo (isset($context["head_name"]) ? $context["head_name"] : null);
            echo "</h3>
    ";
        }
        // line 7
        echo "
";
        // line 8
        if ((isset($context["pre_text"]) ? $context["pre_text"] : null)) {
            // line 9
            echo "  <div class=\"form-group\">
    ";
            // line 10
            echo (isset($context["pre_text"]) ? $context["pre_text"] : null);
            echo "
  </div>
";
        }
        // line 13
        echo "

<div class=\"modcontent\">
    ";
        // line 16
        if ((isset($context["list"]) ? $context["list"] : null)) {
            echo " 
    <div id=\"sohomepage-slider";
            // line 17
            echo (isset($context["module"]) ? $context["module"] : null);
            echo "\">
         <div class=\"so-homeslider sohomeslider-inner-";
            // line 18
            echo (isset($context["module"]) ? $context["module"] : null);
            echo "\">
        ";
            // line 19
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                echo "        
            <div class=\"item\">
              
                <a href=\"";
                // line 22
                echo $this->getAttribute($context["item"], "url", array());
                echo "\" title=\"";
                echo $this->getAttribute($context["item"], "title", array());
                echo "\" target=\"";
                echo (isset($context["item_link_target"]) ? $context["item_link_target"] : null);
                echo "\">
                    <img class=\"lazyload\"   data-sizes=\"auto\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" data-src=\"";
                // line 23
                echo $this->getAttribute($context["item"], "thumb", array());
                echo "\"  alt=\"";
                echo $this->getAttribute($context["item"], "title", array());
                echo "\" />
                </a>
                <div class=\"sohomeslider-description\">
                    ";
                // line 26
                if ($this->getAttribute($context["item"], "caption", array())) {
                    echo " <h2>";
                    echo $this->getAttribute($context["item"], "caption", array());
                    echo "</h2> ";
                }
                // line 27
                echo "                    ";
                echo $this->getAttribute($context["item"], "description", array());
                echo "              
                </div>
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 31
            echo "        </div>

    <script type=\"text/javascript\">
      var total_item = ";
            // line 34
            echo (isset($context["count_item"]) ? $context["count_item"] : null);
            echo " ;
      \$(\".sohomeslider-inner-";
            // line 35
            echo (isset($context["module"]) ? $context["module"] : null);
            echo "\").owlCarousel2({
          animateOut: '";
            // line 36
            echo (isset($context["animateOut"]) ? $context["animateOut"] : null);
            echo "',
          animateIn: '";
            // line 37
            echo (isset($context["animateIn"]) ? $context["animateIn"] : null);
            echo "',
          autoplay: ";
            // line 38
            echo (isset($context["autoplay"]) ? $context["autoplay"] : null);
            echo ",
          autoplayTimeout: ";
            // line 39
            echo (isset($context["autoplayTimeout"]) ? $context["autoplayTimeout"] : null);
            echo ",
          autoplaySpeed:  ";
            // line 40
            echo (isset($context["autoplaySpeed"]) ? $context["autoplaySpeed"] : null);
            echo ",
          smartSpeed: 500,
          autoplayHoverPause: ";
            // line 42
            echo (isset($context["autoplayHoverPause"]) ? $context["autoplayHoverPause"] : null);
            echo ",
          startPosition: ";
            // line 43
            echo (isset($context["startPosition"]) ? $context["startPosition"] : null);
            echo ",
          mouseDrag:  ";
            // line 44
            echo (isset($context["mouseDrag"]) ? $context["mouseDrag"] : null);
            echo ",
          touchDrag: ";
            // line 45
            echo (isset($context["touchDrag"]) ? $context["touchDrag"] : null);
            echo ",
          dots: ";
            // line 46
            echo (isset($context["dots"]) ? $context["dots"] : null);
            echo ",
          autoWidth: false,
          dotClass: \"owl2-dot\",
          dotsClass: \"owl2-dots\",
          loop: ";
            // line 50
            echo (isset($context["loop"]) ? $context["loop"] : null);
            echo ",
          navText: [\"Next\", \"Prev\"],
          navClass: [\"owl2-prev\", \"owl2-next\"],
          responsive: {
          0:{ items: ";
            // line 54
            echo (isset($context["nb_column4"]) ? $context["nb_column4"] : null);
            echo ",
            nav: total_item <= ";
            // line 55
            echo (isset($context["nb_column4"]) ? $context["nb_column4"] : null);
            echo " ? false : ((";
            echo (isset($context["nav"]) ? $context["nav"] : null);
            echo " ) ? true: false),
          },
          480:{ items: ";
            // line 57
            echo (isset($context["nb_column3"]) ? $context["nb_column3"] : null);
            echo ",
            nav: total_item <= ";
            // line 58
            echo (isset($context["nb_column3"]) ? $context["nb_column3"] : null);
            echo " ? false : ((";
            echo (isset($context["nav"]) ? $context["nav"] : null);
            echo " ) ? true: false),
          },
          768:{ items: ";
            // line 60
            echo (isset($context["nb_column2"]) ? $context["nb_column2"] : null);
            echo ",
            nav: total_item <= ";
            // line 61
            echo (isset($context["nb_column2"]) ? $context["nb_column2"] : null);
            echo " ? false : ((";
            echo (isset($context["nav"]) ? $context["nav"] : null);
            echo " ) ? true: false),
          },
          992:{ items: ";
            // line 63
            echo (isset($context["nb_column1"]) ? $context["nb_column1"] : null);
            echo ",
            nav: total_item <= ";
            // line 64
            echo (isset($context["nb_column1"]) ? $context["nb_column1"] : null);
            echo " ? false : ((";
            echo (isset($context["nav"]) ? $context["nav"] : null);
            echo " ) ? true: false),
          },
          1200:{ items: ";
            // line 66
            echo (isset($context["nb_column0"]) ? $context["nb_column0"] : null);
            echo ",
            nav: total_item <= ";
            // line 67
            echo (isset($context["nb_column0"]) ? $context["nb_column0"] : null);
            echo " ? false : ((";
            echo (isset($context["nav"]) ? $context["nav"] : null);
            echo " ) ? true: false),
          }
        },
      });
    </script>
    </div>
    ";
        } else {
            // line 73
            echo "  
        ";
            // line 74
            echo $this->getAttribute((isset($context["objlang"]) ? $context["objlang"] : null), "get", array(0 => "text_noitem"), "method");
            echo "
    ";
        }
        // line 76
        echo "</div> <!--/.modcontent-->

";
        // line 78
        if ((isset($context["post_text"]) ? $context["post_text"] : null)) {
            // line 79
            echo "  <div class=\"form-group\">
    ";
            // line 80
            echo (isset($context["post_text"]) ? $context["post_text"] : null);
            echo "
  </div>
";
        }
        // line 83
        echo "

</div> 
";
    }

    public function getTemplateName()
    {
        return "so-techcity/template/extension/module/so_home_slider/default.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  255 => 83,  249 => 80,  246 => 79,  244 => 78,  240 => 76,  235 => 74,  232 => 73,  220 => 67,  216 => 66,  209 => 64,  205 => 63,  198 => 61,  194 => 60,  187 => 58,  183 => 57,  176 => 55,  172 => 54,  165 => 50,  158 => 46,  154 => 45,  150 => 44,  146 => 43,  142 => 42,  137 => 40,  133 => 39,  129 => 38,  125 => 37,  121 => 36,  117 => 35,  113 => 34,  108 => 31,  97 => 27,  91 => 26,  83 => 23,  75 => 22,  67 => 19,  63 => 18,  59 => 17,  55 => 16,  50 => 13,  44 => 10,  41 => 9,  39 => 8,  36 => 7,  30 => 5,  28 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% set count_item = list|length %}*/
/* */
/* <div class="module sohomepage-slider {{ class_suffix}}">*/
/*     {% if disp_title_module %}*/
/*       <h3 class="modtitle">{{ head_name}}</h3>*/
/*     {% endif %}*/
/* */
/* {% if pre_text %}*/
/*   <div class="form-group">*/
/*     {{ pre_text }}*/
/*   </div>*/
/* {% endif %}*/
/* */
/* */
/* <div class="modcontent">*/
/*     {% if list %} */
/*     <div id="sohomepage-slider{{ module}}">*/
/*          <div class="so-homeslider sohomeslider-inner-{{ module}}">*/
/*         {% for item in list %}        */
/*             <div class="item">*/
/*               */
/*                 <a href="{{ item.url}}" title="{{ item.title}}" target="{{ item_link_target}}">*/
/*                     <img class="lazyload"   data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ item.thumb}}"  alt="{{ item.title}}" />*/
/*                 </a>*/
/*                 <div class="sohomeslider-description">*/
/*                     {% if item.caption %} <h2>{{ item.caption }}</h2> {% endif %}*/
/*                     {{ item.description}}              */
/*                 </div>*/
/*             </div>*/
/*         {% endfor %}*/
/*         </div>*/
/* */
/*     <script type="text/javascript">*/
/*       var total_item = {{ count_item }} ;*/
/*       $(".sohomeslider-inner-{{ module}}").owlCarousel2({*/
/*           animateOut: '{{ animateOut}}',*/
/*           animateIn: '{{ animateIn}}',*/
/*           autoplay: {{ autoplay}},*/
/*           autoplayTimeout: {{ autoplayTimeout}},*/
/*           autoplaySpeed:  {{ autoplaySpeed}},*/
/*           smartSpeed: 500,*/
/*           autoplayHoverPause: {{ autoplayHoverPause}},*/
/*           startPosition: {{ startPosition}},*/
/*           mouseDrag:  {{ mouseDrag}},*/
/*           touchDrag: {{ touchDrag}},*/
/*           dots: {{ dots}},*/
/*           autoWidth: false,*/
/*           dotClass: "owl2-dot",*/
/*           dotsClass: "owl2-dots",*/
/*           loop: {{ loop}},*/
/*           navText: ["Next", "Prev"],*/
/*           navClass: ["owl2-prev", "owl2-next"],*/
/*           responsive: {*/
/*           0:{ items: {{ nb_column4}},*/
/*             nav: total_item <= {{ nb_column4 }} ? false : (({{ nav  }} ) ? true: false),*/
/*           },*/
/*           480:{ items: {{ nb_column3 }},*/
/*             nav: total_item <= {{ nb_column3 }} ? false : (({{ nav  }} ) ? true: false),*/
/*           },*/
/*           768:{ items: {{ nb_column2 }},*/
/*             nav: total_item <= {{ nb_column2 }} ? false : (({{ nav  }} ) ? true: false),*/
/*           },*/
/*           992:{ items: {{ nb_column1 }},*/
/*             nav: total_item <= {{ nb_column1 }} ? false : (({{ nav  }} ) ? true: false),*/
/*           },*/
/*           1200:{ items: {{ nb_column0 }},*/
/*             nav: total_item <= {{ nb_column0 }} ? false : (({{ nav  }} ) ? true: false),*/
/*           }*/
/*         },*/
/*       });*/
/*     </script>*/
/*     </div>*/
/*     {% else %}  */
/*         {{ objlang.get('text_noitem') }}*/
/*     {% endif %}*/
/* </div> <!--/.modcontent-->*/
/* */
/* {% if post_text %}*/
/*   <div class="form-group">*/
/*     {{ post_text }}*/
/*   </div>*/
/* {% endif %}*/
/* */
/* */
/* </div> */
/* */
