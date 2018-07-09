<?php
/**
 * @package topmebel.
 */
?>
<footer class="tm-footer uk-light uk-padding uk-padding-remove-horizontal">
    <div class="uk-container">
		<?php if ( is_active_sidebar( 'footer' ) ) : ?>
            <div class="uk-flex uk-flex-wrap uk-child-width-1-3">
				<?php dynamic_sidebar( 'footer' ); ?>
            </div>
		<?php endif; ?>
        <div class="uk-text-center">
            <!-- Yandex.Metrika informer -->
            <a href="https://metrika.yandex.ru/stat/?id=49513054&amp;from=informer"
               target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/49513054/3_1_FFFFFFFF_EFEFEFFF_0_pageviews"
                                                   style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" class="ym-advanced-informer" data-cid="49513054" data-lang="ru" /></a>
            <!-- /Yandex.Metrika informer -->

            <!-- Yandex.Metrika counter -->
            <script type="text/javascript" >
                (function (d, w, c) {
                    (w[c] = w[c] || []).push(function() {
                        try {
                            w.yaCounter49513054 = new Ya.Metrika2({
                                id:49513054,
                                clickmap:true,
                                trackLinks:true,
                                accurateTrackBounce:true
                            });
                        } catch(e) { }
                    });

                    var n = d.getElementsByTagName("script")[0],
                        s = d.createElement("script"),
                        f = function () { n.parentNode.insertBefore(s, n); };
                    s.type = "text/javascript";
                    s.async = true;
                    s.src = "https://mc.yandex.ru/metrika/tag.js";

                    if (w.opera == "[object Opera]") {
                        d.addEventListener("DOMContentLoaded", f, false);
                    } else { f(); }
                })(document, window, "yandex_metrika_callbacks2");
            </script>
            <noscript><div><img src="https://mc.yandex.ru/watch/49513054" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
            <!-- /Yandex.Metrika counter -->
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-47703042-15"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-47703042-15');
</script>

</body>
</html>