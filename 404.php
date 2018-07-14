<?php
/**
 * @package topmebel
 * created by akweb
 */

get_header(); ?>

    <div class="wrap">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

                <section class="error-404 not-found uk-margin uk-margin-top">
                    <header class="page-header">
                        <h1 class="page-title uk-text-center">Такой страницы не существует.</h1>
                    </header><!-- .page-header -->
                    <div class="uk-text-center uk-margin uk-text-danger">
                        <span uk-icon="icon: ban; ratio: 15"></span>
                    </div>
                    <div class="page-content uk-text-center">
                        <div>
                            <a href="<?php echo site_url(); ?>" class="uk-button uk-button-primary">Вернуться на главную
                                страницу</a>
                        </div>
                    </div><!-- .page-content -->
                </section><!-- .error-404 -->
            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .wrap -->

<?php get_footer();
