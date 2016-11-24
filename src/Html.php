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
     * @param string|null $alt
     */
    public static function picture($src, array $sources = [], $alt = null)
    {
        $html = '';

        foreach ($sources as $media => $srcset) {
            $html .= self::element('source', ['srcset' => $srcset, 'media' => $media]);
        }

        $html .= self::element('img', ['srcset' => $src, 'alt' => $alt]);

        return "<picture>{$html}</picture>";
    }
}
