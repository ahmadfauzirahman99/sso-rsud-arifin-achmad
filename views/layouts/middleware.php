<?php
/* @var $this \yii\web\View */
/* @var $content string */
?>
<?php $this->beginPage() ?>

<!DOCTYPE HTML>

<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1"/>
    <meta name="robots" content="noindex, nofollow"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta http-equiv="refresh" content="12">
    <title>Hai Tunggu Bentar </title>
    <style type="text/css">
        html, body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #ffffff;
            color: #000000;
            font-family: -apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, "Helvetica Neue", Arial, sans-serif;
            font-size: 16px;
            line-height: 1.7em;
            -webkit-font-smoothing: antialiased;
        }

        h1 {
            text-align: center;
            font-weight: 700;
            margin: 16px 0;
            font-size: 32px;
            color: #000000;
            line-height: 1.25;
        }

        p {
            font-size: 20px;
            font-weight: 400;
            margin: 8px 0;
        }

        p, .attribution, {
            text-align: center;
        }

        #spinner {
            margin: 0 auto 30px auto;
            display: block;
        }

        .attribution {
            margin-top: 32px;
        }

        @keyframes fader {
            0% {
                opacity: 0.2;
            }
            50% {
                opacity: 1.0;
            }
            100% {
                opacity: 0.2;
            }
        }

        @-webkit-keyframes fader {
            0% {
                opacity: 0.2;
            }
            50% {
                opacity: 1.0;
            }
            100% {
                opacity: 0.2;
            }
        }

        #cf-bubbles > .bubbles {
            animation: fader 1.6s infinite;
        }

        #cf-bubbles > .bubbles:nth-child(2) {
            animation-delay: .2s;
        }

        #cf-bubbles > .bubbles:nth-child(3) {
            animation-delay: .4s;
        }

        .bubbles {
            background-color: #f58220;
            width: 20px;
            height: 20px;
            margin: 2px;
            border-radius: 100%;
            display: inline-block;
        }

        a {
            color: #2c7cb0;
            text-decoration: none;
            -moz-transition: color 0.15s ease;
            -o-transition: color 0.15s ease;
            -webkit-transition: color 0.15s ease;
            transition: color 0.15s ease;
        }

        a:hover {
            color: #f4a15d
        }

        .attribution {
            font-size: 16px;
            line-height: 1.5;
        }

        .ray_id {
            display: block;
            margin-top: 8px;
        }
    </style>

    <script type="text/javascript">
        //<![CDATA[
        (function () {

            var a = function () {
                    try {
                        return !!window.addEventListener
                    } catch (e) {
                        return !1
                    }
                },
                b = function (b, c) {
                    a() ? document.addEventListener("DOMContentLoaded", b, c) : document.attachEvent("onreadystatechange", b)
                };
            b(function () {
                var a = document.getElementById('cf-content');
                a.style.display = 'block';
                var isIE = /(MSIE|Trident\/|Edge\/)/i.test(window.navigator.userAgent);
                var trkjs = isIE ? new Image() : document.createElement('img');
                trkjs.setAttribute("src", "/cdn-cgi/images/trace/jschal/js/transparent.gif?ray=58d9e5e1d919c336");
                trkjs.id = "trk_jschal_js";
                trkjs.setAttribute("alt", "");
                document.body.appendChild(trkjs);

                setTimeout(function () {
                    var s, t, o, p, b, r, e, a, k, i, n, g, f,
                        jlmulrF = {"GRmOP": +((!+[] + (!![]) + !![] + !![] + !![] + !![] + !![] + !![] + []) + (!+[] + (!![]) + !![] + !![] + !![]) + (!+[] + (!![]) + !![] + !![] + !![] + !![] + !![] + !![]) + (!+[] + (!![]) + !![] + !![] + !![]) + (!+[] + (!![]) + !![] + !![] + !![] + !![] + !![] + !![] + !![]) + (!+[] + (!![]) + !![] + !![] + !![] + !![] + !![] + !![] + !![]) + (!+[] + (!![]) + !![] + !![] + !![]) + (!+[] - (!![])) + (!+[] + (!![]) + !![])) / +((!+[] + (!![]) - [] + []) + (!+[] + (!![]) + !![] + !![] + !![] + !![] + !![] + !![]) + (!+[] + (!![]) + !![] + !![] + !![] + !![] + !![] + !![]) + (+!![]) + (!+[] + (!![]) - []) + (!+[] + (!![]) + !![] + !![]) + (!+[] + (!![]) + !![] + !![] + !![] + !![] + !![]) + (!+[] + (!![]) + !![] + !![] + !![] + !![] + !![] + !![]) + (!+[] + (!![]) + !![] + !![] + !![] + !![] + !![] + !![] + !![]))};
                    g = String.fromCharCode;
                    o = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
                    e = function (s) {
                        s += "==".slice(2 - (s.length & 3));
                        var bm, r = "", r1, r2, i = 0, r3 = '<span class="cf-error-code">1020</span>';
                        for (; i < s.length;) {
                            bm = o.indexOf(s.charAt(i++)) << 18 | o.indexOf(s.charAt(i++)) << 12
                                | (r1 = o.indexOf(s.charAt(i++))) << 6 | (r2 = o.indexOf(s.charAt(i++)));
                            r += r1 === 64 ? g(bm >> 16 & 255)
                                : r2 === 64 ? g(bm >> 16 & 255, bm >> 8 & 255)
                                    : g(bm >> 16 & 255, bm >> 8 & 255, bm & 255);
                        }
                        return r;
                    };
                    t = document.createElement('div');
                    t.innerHTML = "<a href='/'>x</a>";
                    t = t.firstChild.href;
                    r = t.match(/https?:\/\//)[0];
                    t = t.substr(r.length);
                    t = t.substr(0, t.length - 1);
                    k = 'cf-dn-ESNpW';
                    a = document.getElementById('jschl+answer'.replace('+', '-'));
                    f = document.getElementById('challenge-form');
                    ;jlmulrF.GRmOP += +((!+[] + (!![]) + !![] + !![] + !![] + !![] + !![] + !![] + []) + (!+[] + (!![]) + !![]) + (!+[] + (!![]) + !![] + !![] + !![] + !![] + !![] + !![]) + (!+[] - (!![])) + (!+[] + (!![]) + !![] + !![]) + (+!![]) + (!+[] + (!![]) + !![] + !![] + !![] + !![]) + (!+[] + (!![]) + !![] + !![]) + (+!![])) / +((!+[] + (!![]) + !![] + !![] + !![] + !![] + []) + (!+[] + (!![]) + !![] + !![] + !![] + !![]) + (!+[] + (!![]) + !![] + !![] + !![] + !![]) + (!+[] - (!![])) + (+!![]) + (+!![]) + (!+[] + (!![]) + !![] + !![]) + (!+[] + (!![]) + !![] + !![] + !![] + !![] + !![] + !![]) + (!+[] + (!![]) - []));
                    jlmulrF.GRmOP -= +((!+[] + (!![]) + !![] + !![] + !![] + !![] + !![] + !![] + []) + (!+[] + (!![]) + !![]) + (!+[] + (!![]) + !![] + !![] + !![] + !![] + !![] + !![]) + (!+[] - (!![])) + (!+[] + (!![]) + !![] + !![]) + (+!![]) + (!+[] + (!![]) + !![] + !![] + !![] + !![]) + (!+[] + (!![]) + !![] + !![]) + (!+[] + (!![]) + !![] + !![] + !![] + !![] + !![])) / +((!+[] + (!![]) + !![] + !![] + !![] + !![] + !![] + !![] + []) + (!+[] + (!![]) + !![] + !![]) + (!+[] + (!![]) + !![] + !![] + !![] + !![] + !![]) + (!+[] + (!![]) + !![] + !![] + !![] + !![] + !![] + !![] + !![]) + (!+[] + (!![]) - []) + (+!![]) + (!+[] + (!![]) + !![] + !![] + !![] + !![] + !![] + !![]) + (!+[] + (!![]) + !![] + !![] + !![] + !![] + !![] + !![]) + (!+[] + (!![]) + !![] + !![]));
                    jlmulrF.GRmOP += function (p) {
                        var p = eval(eval(e("ZG9jdW1l") + (undefined + "")[1] + (true + "")[0] + (+(+!+[] + [+!+[]] + (!![] + [])[!+[] + !+[] + !+[]] + [!+[] + !+[]] + [+[]]) + [])[+!+[]] + g(103) + (true + "")[3] + (true + "")[0] + "Element" + g(66) + (NaN + [Infinity])[10] + "Id(" + g(107) + ")." + e("aW5uZXJIVE1M")));
                        return +(p)
                    }();
                    jlmulrF.GRmOP *= +((!+[] + (!![]) + !![] + !![] + !![] + !![] + !![] + !![] + []) + (!+[] + (!![]) + !![]) + (!+[] + (!![]) + !![] + !![] + !![] + !![] + !![] + !![]) + (!+[] - (!![])) + (!+[] + (!![]) + !![] + !![]) + (+!![]) + (!+[] + (!![]) + !![] + !![] + !![] + !![]) + (!+[] + (!![]) + !![] + !![]) + (!+[] + (!![]) + !![] + !![] + !![] + !![] + !![])) / +((+!![] + []) + (!+[] + (!![]) + !![] + !![] + !![] + !![]) + (!+[] + (!![]) - []) + (!+[] + (!![]) + !![] + !![] + !![] + !![] + !![]) + (!+[] + (!![]) - []) + (!+[] + (!![]) - []) + (!+[] + (!![]) + !![] + !![] + !![]) + (!+[] + (!![]) + !![] + !![]) + (!+[] + (!![]) - []));
                    jlmulrF.GRmOP += +((!+[] + (!![]) + !![] + !![] + !![] + !![] + !![] + []) + (!+[] + (!![]) + !![] + !![] + !![] + !![] + !![] + !![] + !![]) + (!+[] + (!![]) + !![] + !![] + !![] + !![] + !![]) + (!+[] - (!![])) + (!+[] - (!![])) + (!+[] + (!![]) + !![]) + (!+[] + (!![]) + !![] + !![]) + (!+[] + (!![]) + !![]) + (!+[] + (!![]) + !![] + !![] + !![] + !![] + !![])) / +((!+[] + (!![]) + !![] + !![] + !![] + !![] + !![] + []) + (!+[] + (!![]) + !![] + !![] + !![] + !![]) + (!+[] + (!![]) + !![] + !![] + !![] + !![] + !![] + !![] + !![]) + (!+[] + (!![]) + !![] + !![] + !![] + !![] + !![] + !![]) + (!+[] + (!![]) + !![] + !![]) + (+!![]) + (!+[] + (!![]) + !![] + !![] + !![] + !![]) + (!+[] + (!![]) + !![] + !![] + !![] + !![] + !![]) + (!+[] + (!![]) + !![] + !![] + !![] + !![] + !![]));
                    jlmulrF.GRmOP += +((!+[] + (!![]) + !![] + !![] + !![] + !![] + !![] + !![] + !![] + []) + (!+[] + (!![]) - []) + (!+[] - (!![])) + (!+[] + (!![]) + !![] + !![]) + (+!![]) + (!+[] + (!![]) + !![] + !![] + !![] + !![] + !![] + !![] + !![]) + (!+[] + (!![]) + !![] + !![] + !![] + !![] + !![] + !![]) + (!+[] + (!![]) - []) + (!+[] + (!![]) + !![])) / +((!+[] + (!![]) + !![] + !![] + !![] + !![] + !![] + !![] + []) + (!+[] + (!![]) - []) + (!+[] - (!![])) + (!+[] - (!![])) + (!+[] + (!![]) + !![] + !![] + !![] + !![] + !![] + !![]) + (!+[] + (!![]) + !![] + !![] + !![] + !![]) + (+!![]) + (!+[] + (!![]) + !![] + !![]) + (!+[] + (!![]) + !![] + !![] + !![] + !![]));
                    a.value = (+jlmulrF.GRmOP).toFixed(10);
                    '; 121'
                    // f.action += location.hash;
                    // f.submit();
                }, 4000); /*eoc*/

            }, false);
        })();
        //]]>
    </script>

    <?php $this->head() ?>

</head>
<body>
<?php $this->beginBody() ?>
<?= $content ?>
<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
