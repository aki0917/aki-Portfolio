<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="日笠晃宏（Akihiro Higasa）のポートフォリオサイト。HTML/CSS・JavaScript・WordPress・SEOに対応したフロントエンド開発者です。" />

    <!-- OGP -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Portfolio | Akihiro Higasa" />
    <meta property="og:description" content="HTML/CSS・JavaScript・WordPress・SEOに対応したフロントエンド開発者のポートフォリオ。" />
    <meta property="og:url" content="<?php echo esc_url( home_url('/') ); ?>" />
    <meta property="og:image" content="<?php echo esc_url( get_template_directory_uri() . '/img/top.webp' ); ?>" />
    <meta property="og:site_name" content="Akihiro Higasa Portfolio" />
    <meta property="og:locale" content="ja_JP" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Portfolio | Akihiro Higasa" />
    <meta name="twitter:description" content="HTML/CSS・JavaScript・WordPress・SEOに対応したフロントエンド開発者のポートフォリオ。" />
    <meta name="twitter:image" content="<?php echo esc_url( get_template_directory_uri() . '/img/top.webp' ); ?>" />

    <!-- Structured Data: Website -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "name": "Akihiro Higasa Portfolio",
      "url": "<?php echo esc_url( home_url('/') ); ?>",
      "description": "フロントエンド開発者 日笠晃宏のポートフォリオサイト"
    }
    </script>

    <!-- Structured Data: Person -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Person",
      "name": "日笠晃宏",
      "alternateName": "Akihiro Higasa",
      "url": "<?php echo esc_url( home_url('/') ); ?>",
      "jobTitle": "Frontend Developer / Designer",
      "knowsAbout": ["HTML", "CSS", "JavaScript", "SCSS", "WordPress", "GSAP", "SEO", "Figma"],
      "sameAs": [
        "https://github.com/aki0917"
      ]
    }
    </script>

    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- ========== Loading ========== -->
    <div class="p-loading" id="js-loading">
      <div class="p-loading__counter" id="js-loading-counter">0</div>
    </div>

    <!-- ========== Header ========== -->
    <header class="l-header" id="js-header">
      <a href="<?php echo esc_url( home_url('/') ); ?>" class="l-header__logo">Portfolio</a>
      <nav class="l-header__nav u-pc-only">
        <ul class="l-header__nav-list">
          <li><a href="#about" class="l-header__nav-link">About</a></li>
          <li><a href="#work" class="l-header__nav-link">Work</a></li>
          <li><a href="#contact" class="l-header__nav-link">Contact</a></li>
        </ul>
      </nav>
      <button class="l-header__hamburger u-sp-only" id="js-hamburger" aria-label="メニュー">
        <span class="l-header__hamburger-line"></span>
        <span class="l-header__hamburger-line"></span>
        <span class="l-header__hamburger-line"></span>
      </button>
      <div class="l-header__sp-menu" id="js-sp-menu">
        <ul class="l-header__sp-nav-list">
          <li><a href="#about" class="l-header__sp-nav-link">About</a></li>
          <li><a href="#work" class="l-header__sp-nav-link">Work</a></li>
          <li><a href="#contact" class="l-header__sp-nav-link">Contact</a></li>
        </ul>
      </div>
    </header>

    <!-- ========== Main Visual ========== -->
    <section class="p-mv" id="mv">
      <div class="p-mv__bg" id="js-mv-bg">
        <div class="p-mv__bg-line p-mv__bg-line--h" style="top: 25%"></div>
        <div class="p-mv__bg-line p-mv__bg-line--h" style="top: 50%"></div>
        <div class="p-mv__bg-line p-mv__bg-line--h" style="top: 75%"></div>
        <div class="p-mv__bg-line p-mv__bg-line--v" style="left: 25%"></div>
        <div class="p-mv__bg-line p-mv__bg-line--v" style="left: 50%"></div>
        <div class="p-mv__bg-line p-mv__bg-line--v" style="left: 75%"></div>
      </div>
      <div class="p-mv__content">
        <h1 class="p-mv__title">
          <span class="p-mv__title-line">
            <span class="p-mv__title-text">AKIHIRO</span>
          </span>
          <span class="p-mv__title-line">
            <span class="p-mv__title-text">HIGASA</span>
          </span>
        </h1>
        <p class="p-mv__subtitle">Design &amp; Code &amp; Experience</p>
      </div>
      <div class="p-mv__scroll" id="js-scroll-indicator">
        <span class="p-mv__scroll-text">Scroll</span>
        <span class="p-mv__scroll-line"></span>
      </div>
    </section>

    <main>
      <!-- ========== About ========== -->
      <section class="l-section l-section--light" id="about">
        <div class="l-inner">
          <h2 class="c-heading">About</h2>
          <div class="p-about__grid">
            <div class="p-about__image c-fade-up" id="js-about-image">
              <div class="p-about__image-inner">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/img/top.webp' ); ?>" alt="AKIHIRO HIGASA" class="p-about__image-media" />
                <video
                  src="<?php echo esc_url( get_template_directory_uri() . '/img/movie/top.mp4' ); ?>"
                  class="p-about__image-media p-about__video"
                  muted
                  playsinline
                  preload="auto"
                ></video>
              </div>
              <div class="p-about__image-overlay" id="js-about-overlay"></div>
            </div>
            <div class="p-about__text c-fade-up">
              <h3 class="p-about__text-name">AKIHIRO HIGASA</h3>
              <p class="p-about__text-role">Frontend Developer / Designer</p>
              <p class="p-about__text-desc">
                1987年栃木県出身。30代からWeb制作を始め、現在は会社員でありながらフロントエンドエンジニアとしても活動しています。
                企業サイトの制作・運用を中心に、デザインからコーディング、SEO対策まで一貫して対応しています。
                WordPressを使った構築やパフォーマンス改善の実績があります。
              </p>
              <div class="p-about__skills">
                <span class="p-about__skill-tag">HTML / CSS</span>
                <span class="p-about__skill-tag">JavaScript</span>
                <span class="p-about__skill-tag">SCSS</span>
                <span class="p-about__skill-tag">WordPress</span>
                <span class="p-about__skill-tag">GSAP</span>
                <span class="p-about__skill-tag">SEO</span>
                <span class="p-about__skill-tag">Figma</span>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- ========== Work ========== -->
      <section class="l-section l-section--dark" id="work">
        <div class="l-inner">
          <h2 class="c-heading">Work</h2>
          <div class="p-work__list">
            <?php
            $work_query = new WP_Query([
                'post_type'      => 'work',
                'posts_per_page' => -1,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            ]);

            if ( $work_query->have_posts() ) :
                while ( $work_query->have_posts() ) : $work_query->the_post();
                    $work_url      = get_field('work_url') ?: '#';
                    $work_category = get_field('work_category');
                    $work_number   = get_field('work_number');
                    $work_blur     = get_field('work_blur');
                    $work_auth     = get_field('work_auth_memo');
                    $thumb_class   = 'p-work__thumbnail-img' . ( $work_blur ? ' p-work__thumbnail-img--blur' : '' );
                    $target_attr   = ( $work_url !== '#' ) ? ' target="_blank" rel="noopener noreferrer"' : '';
            ?>
            <div class="p-work__item c-fade-up">
              <a href="<?php echo esc_url( $work_url ); ?>"<?php echo $target_attr; ?> class="p-work__link">
                <div class="p-work__thumbnail">
                  <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail('large', ['class' => $thumb_class, 'alt' => esc_attr( get_the_title() )]); ?>
                  <?php endif; ?>
                  <div class="p-work__thumbnail-overlay"></div>
                  <?php if ( $work_auth ) : ?>
                    <span class="p-work__auth-memo"><?php echo esc_html( $work_auth ); ?></span>
                  <?php endif; ?>
                </div>
                <div class="p-work__info">
                  <div>
                    <h3 class="p-work__item-title"><?php the_title(); ?></h3>
                    <?php if ( $work_category ) : ?>
                      <p class="p-work__item-category"><?php echo esc_html( $work_category ); ?></p>
                    <?php endif; ?>
                  </div>
                  <?php if ( $work_number ) : ?>
                    <span class="p-work__item-number"><?php echo esc_html( $work_number ); ?></span>
                  <?php endif; ?>
                </div>
              </a>
            </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
          </div>
        </div>
      </section>

      <!-- ========== Contact ========== -->
      <section class="l-section l-section--light" id="contact">
        <div class="l-inner">
          <div class="p-contact">
            <h2 class="c-heading c-heading--center">Contact</h2>
            <h3 class="p-contact__title c-fade-up">Let's Talk</h3>
            <p class="p-contact__desc c-fade-up">
              お仕事のご依頼やご相談など、<br class="u-sp-only" />お気軽にお問い合わせください。
            </p>
            <div class="p-contact__form c-fade-up">
              <?php pf2_render_contact_form(); ?>
            </div>
            <div class="p-contact__social c-fade-up">
              <a href="https://github.com/aki0917" class="p-contact__social-link" target="_blank" rel="noopener noreferrer">GitHub</a>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- ========== Footer ========== -->
    <footer class="l-footer">
      <p class="l-footer__copy">&copy; <?php echo date('Y'); ?> Akihiro Higasa. All Rights Reserved.</p>
    </footer>

    <?php wp_footer(); ?>
  </body>
</html>
