<?php

if (!function_exists("_genNoIndex")) {
    function _genNoIndex($prefixed = "", $number = "")
    {
        $response = $prefixed . sprintf("%04d", $number);

        return $response;
    }
}

if (!function_exists('strip_tags')) {
    function strip_tags($text = '')
    {
        $data = strip_tags(preg_replace("/<img[^>]+\>/i", '', stripcslashes($text)), '');

        return $data;
    }
}

if (!function_exists('site_asset_common_img_url')) {
    function site_asset_common_img_url($uri = '')
    {
        return asset('assets/images/' . $uri);
    }
}

if (!function_exists('site_string_url')) {
    function site_string_url($string = '')
    {
        $string = preg_replace("`\[.*\]`U", "", $string);
        $string = preg_replace('`&(amp;)?#?[a-z0-9]+;`i', '-', $string);
        $string = str_replace('%', '-percent', $string);
        $string = htmlentities($string, ENT_COMPAT, 'utf-8');
        $string = preg_replace("`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i", "\\1", $string);
        $string = preg_replace(["`[^a-z0-9ก-๙เ-า]`i", "`[-]+`"], "-", $string);
        $response = strtolower(trim($string, '-'));

        return $response;
    }
}

if (!function_exists('breadcrumb')) {
    function breadcrumb($data = [], $dir = 'ltr')
    {
        $result = '';
        $count = count($data);
        if ($count > 0) :
            $i = 1;
            $active = '';
            $result .= '<ol dir="' . $dir . '" class="app-breadcrumb breadcrumb">';
            foreach ($data as $key => $val) :
                if ($i == $count) {
                    $result .= '<li class="breadcrumb-item active">' . $val['label'] . '</li>';
                } else {
                    $result .= '<li class="breadcrumb-item"><a href="' . $val['link'] . '">' . $val['label'] . '</a></li>';
                }
                ++$i;
            endforeach;
            $result .= '</ol>';
        endif;

        return $result;
    }
}

if (!function_exists('ckeditor_advanced_url')) {
    function ckeditor_advanced_url($element = '', $quantity = 1)
    {
        $content = '';
        if ($quantity == 1) {
            $content = '
				<script src="' . asset('assets/ckfile/ckeditor/ckeditor.js') . '"></script>
				<script src="' . asset('assets/ckfile/ckfinder/ckfinder.js') . '"></script>
			';
        }

        $content .= '
			<script>
				CKEDITOR.replace(\'' . $element . '\',{
					toolbar : [
						{
                            name: "document",
                            items: [ "Source", "Undo", "Redo"]
                        },
                        {
                            name: "styles",
                            items: [ "Styles", "Format"]
                        },
                        {
                            name: "colors",
                            items: [ "TextColor", "BGColor" ]
                        },
						{
                            name: "basicstyles",
                            items: [ "Bold", "Italic", "Underline", "Strike", "Subscript", "Superscript", "-", "CopyFormatting", "RemoveFormat" ]
                        },
						{
                            name: "paragraph",
                            items: [ "NumberedList", "BulletedList", "-", "Outdent", "Indent", "-", "Blockquote", "-", "JustifyLeft", "JustifyCenter", "JustifyRight", "JustifyBlock", "-", "BidiLtr", "BidiRtl" ]
                        },
						{
                            name: "links",
                            items: [ "Link", "Unlink" ]
                        },
						{
                            name: "insert",
                            items: [ "Image", "Table", "Iframe", "Youtube" ]
                        },
						{
                            name: "tools",
                            items: [ "Maximize" ]
                        },
                    ],
                    removeDialogTabs: \'image:advanced;image:Link;image:Upload;link:advanced;link:upload;\',
				});
			</script>
		';

        return $content;
    }
}

if (!function_exists('__file_exists')) {
    function __file_exists($folder = '', $string = '')
    {
        return (($string != "") && Storage::disk('public')->exists("/$folder/$string"));
    }
}

if (!function_exists('__avatar')) {
    function __avatar()
    {
        return asset('assets/images/user.png');
    }
}

if (!function_exists('__via_placeholder')) {
    function __via_placeholder($width, $height)
    {
        return "https://via.placeholder.com/$width.x.$height";
    }
}

// if (!function_exists('site_wpsize_url')) {
//     function site_wpsize_url($folder = '', $string = '', $event = "w800")
//     {
//         $response = site_url("uploads/$folder/" . $string);
//         if (ENVIRONMENT == "production") {
//             $response = site_url("wp-size/$event/uploads/$folder/" . $string);
//         }

//         return $response;
//     }
// }

// if (!function_exists('site_wpsize_subfolder_url')) {
//     function site_wpsize_subfolder_url($folder = '', $id = '', $url = '', $event = "w800")
//     {
//         $subfolder = gen_folder($id);

//         $response = site_url("uploads/$folder/$subfolder/$url");
//         if (ENVIRONMENT == "production") {
//             $response = site_url("wp-size/$event/uploads/$folder/$subfolder/$url");
//         }

//         return $response;
//     }
// }

if (!function_exists('gen_folder')) {
    function gen_folder($id, $string = '')
    {
        $response = $id . '-' . md5($id);
        if ($string != "") {
            $response = $string;
        }

        return $response;
    }
}

// if (!function_exists('_file_exists')) {
//     function _file_exists($folder = '', $string = '')
//     {
//         if (($string != "") && (file_exists(FCPATH . "uploads/$folder/$string"))) {
//             return true;
//         } else {
//             return false;
//         }
//     }
// }

// if (!function_exists('_file_exists_subfolder')) {
//     function _file_exists_subfolder($folder = '', $id, $string = '')
//     {
//         $subfolder = gen_folder($id);
//         if (($string != "") && (file_exists(FCPATH . "uploads/$folder/$subfolder/$string"))) {
//             return true;
//         } else {
//             return false;
//         }
//     }
// }

// if (!function_exists('icn_internet_banking')) {
//     function icn_internet_banking($name = "")
//     {
//         $response = "";
//         if ($name == "krungsri") {
//             $response = '<img width="20" height="20" src="' . asset('assets/images/ic-krungsri.png') . '"/>';
//         } elseif ($name == "bualuang") {
//             $response = '<img width="20" height="20" src="' . asset('assets/images/ic-bualuang.png') . '"/>';
//         } elseif ($name == "ktb") {
//             $response = '<img width="20" height="20" src="' . asset('assets/images/ic-ktb.png') . '"/>';
//         } elseif ($name == "scb") {
//             $response = '<img width="20" height="20" src="' . asset('assets/images/ic-scb.png') . '"/>';
//         }

//         return $response;
//     }
// }

if (!function_exists('ic_image')) {
    function ic_image($name = "", $width = "", $height = "")
    {
        if ($width != "" && $height == "") {
            $response = '<img width="' . $width . '" src="' . asset('assets/images/' . $name) . '"/>';
        } elseif ($width == "" && $height != "") {
            $response = '<img height="' . $height . '" src="' . asset('assets/images/' . $name) . '"/>';
        } elseif ($width != "" && $height != "") {
            $response = '<img width="' . $width . '" height="' . $height . '" src="' . asset('assets/images/' . $name) . '"/>';
        } else {
            $response = '<img width="20" height="20" src="' . asset('assets/images/' . $name) . '"/>';
        }

        return $response;
    }
}

if (!function_exists('is_serialized')) {
    function is_serialized($data, $strict = true)
    {
        // If it isn't a string, it isn't serialized.
        if (!is_string($data)) {
            return false;
        }
        $data = trim($data);
        if ('N;' === $data) {
            return true;
        }
        if (strlen($data) < 4) {
            return false;
        }
        if (':' !== $data[1]) {
            return false;
        }
        if ($strict) {
            $lastc = substr($data, -1);
            if (';' !== $lastc && '}' !== $lastc) {
                return false;
            }
        } else {
            $semicolon = strpos($data, ';');
            $brace     = strpos($data, '}');
            // Either ; or } must exist.
            if (false === $semicolon && false === $brace) {
                return false;
            }
            // But neither must be in the first X characters.
            if (false !== $semicolon && $semicolon < 3) {
                return false;
            }
            if (false !== $brace && $brace < 4) {
                return false;
            }
        }
        $token = $data[0];
        switch ($token) {
            case 's':
                if ($strict) {
                    if ('"' !== substr($data, -2, 1)) {
                        return false;
                    }
                } elseif (false === strpos($data, '"')) {
                    return false;
                }
                // Or else fall through.
            case 'a':
            case 'O':
                return (bool) preg_match("/^{$token}:[0-9]+:/s", $data);
            case 'b':
            case 'i':
            case 'd':
                $end = $strict ? '$' : '';
                return (bool) preg_match("/^{$token}:[0-9.E+-]+;$end/", $data);
        }
        return false;
    }
}
