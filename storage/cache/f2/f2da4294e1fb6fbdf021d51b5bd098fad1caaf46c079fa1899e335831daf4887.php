<?php

/* default/template/extension/module/so_page_builder/default_row.twig */
class __TwigTemplate_27dbab19474d0321c4daea77005fd90d144371e865bee21044f280f18a166eed extends Twig_Template
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
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["rows_child"]) ? $context["rows_child"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["row_child"]) {
            // line 2
            echo "<div class=\"row ";
            echo $this->getAttribute($context["row_child"], "text_class_id", array());
            echo " ";
            echo ((($this->getAttribute($context["row_child"], "text_class", array()) != "")) ? ((" " . $this->getAttribute($context["row_child"], "text_class", array()))) : (""));
            echo " ";
            if (($this->getAttribute($context["row_child"], "background_type", array()) == 1)) {
                echo " ";
                echo "row-color";
                echo " ";
            } elseif (($this->getAttribute($context["row_child"], "background_type", array()) == 2)) {
                echo " ";
                echo "row-image";
                echo " ";
            } elseif (($this->getAttribute($context["row_child"], "background_type", array()) == 3)) {
                echo " ";
                echo "row-video";
                echo " ";
            }
            echo "\">
\t";
            // line 3
            if (($this->getAttribute($context["row_child"], "background_type", array()) == 3)) {
                // line 4
                echo "\t\t";
                if (($this->getAttribute($context["row_child"], "video_type", array()) == 0)) {
                    // line 5
                    echo "\t\t\t<div class=\"bg-video\" id=\"";
                    echo (isset($context["id_row_video"]) ? $context["id_row_video"] : null);
                    echo "\" data-id=\"";
                    echo (isset($context["id_row_video"]) ? $context["id_row_video"] : null);
                    echo "\" data-loop=\"true\" data-muted=\"true\" data-autoplay=\"true\" data-ratio=\"1.77\" data-overlay=\"\" data-swfpath=\"\"  data-youtube=\"";
                    echo $this->getAttribute($context["row_child"], "link_video", array());
                    echo "\"></div>
\t\t";
                } else {
                    // line 7
                    echo "\t\t\t<div class=\"bg-video\" id=\"";
                    echo (isset($context["id_row_video"]) ? $context["id_row_video"] : null);
                    echo "\" data-id=\"";
                    echo (isset($context["id_row_video"]) ? $context["id_row_video"] : null);
                    echo "\" data-loop=\"true\" data-muted=\"true\" data-autoplay=\"true\" data-ratio=\"1.77\" data-overlay=\"\" data-swfpath=\"\"  data-webm=\"";
                    echo $this->getAttribute($context["row_child"], "link_video", array());
                    echo "\">
\t\t\t\t<div style=\"z-index: 0; position: absolute; top: 0px; left: 0px; right: 0px; bottom: 0px; overflow: hidden;\">
\t\t\t\t\t<video autoplay=\"\" style=\"width:100%;height:100%;\" loop=\"\" onended=\"this.play()\"><source src=\"";
                    // line 9
                    echo $this->getAttribute($context["row_child"], "link_video", array());
                    echo "\" type=\"video/webm\"></video>
\t\t\t\t</div>
\t\t\t</div>
\t\t";
                }
                // line 13
                echo "\t";
            }
            // line 14
            echo "
\t";
            // line 15
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["row_child"], "cols", array()));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["col"]) {
                // line 16
                echo "\t\t<div class=\"col-lg-";
                echo $this->getAttribute($context["col"], "lg_col", array());
                echo " col-md-";
                echo $this->getAttribute($context["col"], "md_col", array());
                echo " col-sm-";
                echo $this->getAttribute($context["col"], "sm_col", array());
                echo " col-xs-";
                echo $this->getAttribute($context["col"], "xs_col", array());
                echo " ";
                echo $this->getAttribute($context["col"], "text_class_id", array());
                echo ((($this->getAttribute($context["col"], "text_class", array()) != "")) ? ((" " . $this->getAttribute($context["col"], "text_class", array()))) : (""));
                echo "\">
\t\t\t";
                // line 17
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["col"], "widgets", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["widget"]) {
                    // line 18
                    echo "\t\t\t\t";
                    if ($this->getAttribute($context["widget"], "content", array())) {
                        // line 19
                        echo "\t\t\t\t\t";
                        echo $this->getAttribute($context["widget"], "content", array());
                        echo "
\t\t\t\t";
                    }
                    // line 21
                    echo "\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['widget'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 22
                echo "\t\t\t
\t\t\t";
                // line 23
                if (($this->getAttribute($context["col"], "rows", array()) && $this->getAttribute($context["col"], "rows", array()))) {
                    // line 24
                    echo "\t\t\t\t";
                    $context["rows_child"] = $this->getAttribute($context["col"], "rows", array());
                    // line 25
                    echo "\t\t\t\t";
                    $this->loadTemplate(((isset($context["DIR_TEMPLATE"]) ? $context["DIR_TEMPLATE"] : null) . (isset($context["template_row"]) ? $context["template_row"] : null)), "default/template/extension/module/so_page_builder/default_row.twig", 25)->display($context);
                    // line 26
                    echo "\t\t\t";
                }
                // line 27
                echo "
\t\t\t";
                // line 28
                if (($this->getAttribute($context["col"], "background_type", array()) == 3)) {
                    // line 29
                    echo "\t\t\t\t";
                    if (($this->getAttribute($context["col"], "col_video_type", array()) == 0)) {
                        // line 30
                        echo "\t\t\t\t\t<div class=\"bg-video\" id=\"";
                        echo (isset($context["id_col_video"]) ? $context["id_col_video"] : null);
                        echo "\" data-id=\"";
                        echo (isset($context["id_col_video"]) ? $context["id_col_video"] : null);
                        echo "\" data-loop=\"true\" data-muted=\"true\" data-autoplay=\"true\" data-ratio=\"1.77\" data-overlay=\"\" data-swfpath=\"\"  data-youtube=\"";
                        echo $this->getAttribute($context["col"], "col_link_video", array());
                        echo "\"></div>
\t\t\t\t";
                    } else {
                        // line 32
                        echo "\t\t\t\t\t<div class=\"bg-video\" id=\"";
                        echo (isset($context["id_col_video"]) ? $context["id_col_video"] : null);
                        echo "\" data-id=\"";
                        echo (isset($context["id_col_video"]) ? $context["id_col_video"] : null);
                        echo "\" data-loop=\"true\" data-muted=\"true\" data-autoplay=\"true\" data-ratio=\"1.77\" data-overlay=\"\" data-swfpath=\"\"  data-webm=\"";
                        echo $this->getAttribute($context["col"], "col_link_video", array());
                        echo "\">
\t\t\t\t\t\t<div style=\"z-index: 0; position: absolute; top: 0px; left: 0px; right: 0px; bottom: 0px; overflow: hidden;\">
\t\t\t\t\t\t\t<video autoplay=\"\" style=\"width:100%;height:100%;\" loop=\"\" onended=\"this.play()\"><source src=\"";
                        // line 34
                        echo $this->getAttribute($context["col"], "col_link_video", array());
                        echo "\" type=\"video/webm\"></video>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t";
                    }
                    // line 38
                    echo "\t\t\t";
                }
                // line 39
                echo "\t\t</div>
\t";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['col'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 41
            echo "</div>
";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row_child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "default/template/extension/module/so_page_builder/default_row.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  212 => 41,  197 => 39,  194 => 38,  187 => 34,  177 => 32,  167 => 30,  164 => 29,  162 => 28,  159 => 27,  156 => 26,  153 => 25,  150 => 24,  148 => 23,  145 => 22,  139 => 21,  133 => 19,  130 => 18,  126 => 17,  112 => 16,  95 => 15,  92 => 14,  89 => 13,  82 => 9,  72 => 7,  62 => 5,  59 => 4,  57 => 3,  36 => 2,  19 => 1,);
    }
}
/* {% for row_child in rows_child %}*/
/* <div class="row {{ row_child.text_class_id }} {{ row_child.text_class != '' ? ' '~row_child.text_class : '' }} {% if row_child.background_type == 1 %} {{ "row-color" }} {% elseif row_child.background_type == 2 %} {{ "row-image" }} {% elseif row_child.background_type == 3 %} {{ "row-video" }} {% endif %}">*/
/* 	{% if row_child.background_type == 3 %}*/
/* 		{% if row_child.video_type == 0 %}*/
/* 			<div class="bg-video" id="{{ id_row_video }}" data-id="{{ id_row_video }}" data-loop="true" data-muted="true" data-autoplay="true" data-ratio="1.77" data-overlay="" data-swfpath=""  data-youtube="{{ row_child.link_video }}"></div>*/
/* 		{% else %}*/
/* 			<div class="bg-video" id="{{ id_row_video }}" data-id="{{ id_row_video }}" data-loop="true" data-muted="true" data-autoplay="true" data-ratio="1.77" data-overlay="" data-swfpath=""  data-webm="{{ row_child.link_video }}">*/
/* 				<div style="z-index: 0; position: absolute; top: 0px; left: 0px; right: 0px; bottom: 0px; overflow: hidden;">*/
/* 					<video autoplay="" style="width:100%;height:100%;" loop="" onended="this.play()"><source src="{{ row_child.link_video }}" type="video/webm"></video>*/
/* 				</div>*/
/* 			</div>*/
/* 		{% endif %}*/
/* 	{% endif %}*/
/* */
/* 	{% for col in row_child.cols %}*/
/* 		<div class="col-lg-{{ col.lg_col }} col-md-{{ col.md_col }} col-sm-{{ col.sm_col }} col-xs-{{ col.xs_col }} {{ col.text_class_id }}{{ col.text_class != '' ? ' '~col.text_class : '' }}">*/
/* 			{% for widget in col.widgets %}*/
/* 				{% if widget.content %}*/
/* 					{{ widget.content }}*/
/* 				{% endif %}*/
/* 			{% endfor %}*/
/* 			*/
/* 			{% if col.rows and col.rows %}*/
/* 				{% set rows_child = col.rows %}*/
/* 				{% include DIR_TEMPLATE~template_row %}*/
/* 			{% endif %}*/
/* */
/* 			{% if col.background_type == 3 %}*/
/* 				{% if col.col_video_type == 0 %}*/
/* 					<div class="bg-video" id="{{ id_col_video }}" data-id="{{ id_col_video }}" data-loop="true" data-muted="true" data-autoplay="true" data-ratio="1.77" data-overlay="" data-swfpath=""  data-youtube="{{ col.col_link_video }}"></div>*/
/* 				{% else %}*/
/* 					<div class="bg-video" id="{{ id_col_video }}" data-id="{{ id_col_video }}" data-loop="true" data-muted="true" data-autoplay="true" data-ratio="1.77" data-overlay="" data-swfpath=""  data-webm="{{ col.col_link_video }}">*/
/* 						<div style="z-index: 0; position: absolute; top: 0px; left: 0px; right: 0px; bottom: 0px; overflow: hidden;">*/
/* 							<video autoplay="" style="width:100%;height:100%;" loop="" onended="this.play()"><source src="{{ col.col_link_video }}" type="video/webm"></video>*/
/* 						</div>*/
/* 					</div>*/
/* 				{% endif %}*/
/* 			{% endif %}*/
/* 		</div>*/
/* 	{% endfor %}*/
/* </div>*/
/* {% endfor %}*/
