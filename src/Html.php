<?php

namespace ViewHelpers;

class Html
{
	/**
     * Creates an html element.
     *
     * @param string $name  Element name
     * @param array|null  $attrs Element attributes
     *
     * @return string
     */
    public static function element($name, array $attrs = null)
    {
        $str = "<{$name}";

        if (!empty($attrs)) {
            foreach ($attrs as $name => $value) {
                if ($value === false || $value === null) {
                    continue;
                }

                if ($value === true) {
                    $str .= " {$name}";
                    continue;
                }

                if (is_array($value)) {
                    switch ($name) {
                        case 'srcset':
                            $value = array_map(
                                function ($src, $size) {
                                    return "$src $size";
                                },
                                array_values($value),
                                array_keys($value)
                            );
                            $value = implode(', ', $value);
                            break;

                        default:
                            $value = implode(' ', $value);
                            break;
                    }
                }

                $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
                $str .= " {$name}=\"{$value}\"";
            }
        }

        return "$str>";
    }

    /**
     * Creates a <picture> elemement
     *
     * @param string $src
     * @param array $sources ['media' => 'srcset']
     * @param string|array|null $imgAttrs Extra atributes added to <img> element. If it's a string, it will be used as "alt"
     * @param array|null $pictureAttrs Extra attributes added to <picture> element
     */
    public static function picture($src, array $sources = [], $imgAttrs = null, array $pictureAttrs = null)
    {
        $html = '';

        foreach ($sources as $media => $srcset) {
            $html .= self::element('source', ['srcset' => $srcset, 'media' => $media]);
        }

        if (!is_array($imgAttrs)) {
            $imgAttrs = ['alt' => $imgAttrs];
        }

        $imgAttrs['srcset'] = $src;

        $html .= self::element('img', $imgAttrs);

        return self::element('picture', $pictureAttrs).$html.'</picture>';
    }
}
