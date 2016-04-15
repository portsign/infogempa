<?php
/*
    Theme Name: Counterpoint
    Author: Evan Henley
    Author URL: http://henleyedition.com/
    
    Contents
    ----------------------
    * Setup Function
    * Small Customizations
    * Fonts
    * Scripts and Styles
    * Remove Admin Bar
    * Widgets
    * Thumbnail-related Functions
    * Comment Layout
    * Adjacent Post Navigation
    * Categories
    * Timestamp (posted_on)
    * Numeric Page Navigation
    * Custom Link Pages
    * Index/Archive Loop Functions

 */


    /*
     * Counterpoint Setup
    */
    
    if ( ! function_exists('counterpoint_setup') ) :
    function counterpoint_setup() {
    
        load_theme_textdomain('counterpoint', get_template_directory_uri() . '/languages');
        
        $locale = get_locale();
        $locale_file = get_template_directory_uri() . "/languages/$locale.php";
        if ( is_readable($locale_file) )
            require_once($locale_file);
            
        
        // Theme Support //
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'automatic-feed-links' );

        
        // Sidebar Menu //
        register_nav_menu('sidebar', __('Sidebar', 'counterpoint'));
        register_nav_menu('footer', __('Footer', 'counterpoint'));
        
        // Content Width Setup //
        global $content_width;
        if ( ! isset( $content_width ) ) $content_width = 1080;
    
    }
    endif; // End Counterpoint Setup
    add_action('after_setup_theme', 'counterpoint_setup');

    add_filter('wp_title', 'counterpoint_title', 10, 3); 
    function counterpoint_title( $title, $sep, $seplocation ) {
        global $page, $paged;
    
        // Don't affect in feeds.
        if ( is_feed() ) return $title;
    
        // Add the blog's name
        if ( 'right' == $seplocation )
            $title .= get_bloginfo( 'name' );
        else
            $title = get_bloginfo( 'name' ) . $title;
    
        // Add the blog description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
    
        if ( $site_description && ( is_home() || is_front_page() ) )
            $title .= " {$sep} {$site_description}";
    
        // Add a page number if necessary:
        if ( $paged >= 2 || $page >= 2 )
            $title .= " {$sep} " . sprintf( __( 'Page %s', 'counterpoint' ), max( $paged, $page ) );
    
        return $title;
    }
    
    // remove WP version from RSS
    function counterpoint_rss_version() { return ''; }
    
    // remove WP version from scripts
    function counterpoint_remove_wp_ver_css_js( $src ) {
        if ( strpos( $src, 'ver=' ) )
            $src = remove_query_arg( 'ver', $src );
        return $src;
    }
    
    
    /**********************
     * Small Customizations
     **********************/
    
    // Removes [...] from Excerpt
    function counterpoint_excerpt_more() {
        return '';
    }
    add_filter( 'excerpt_more', 'counterpoint_excerpt_more' );
    
    // Removes junk from around images
    function counterpoint_filter_ptags_on_images($content){
        return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
    }
    add_filter( 'the_content', 'counterpoint_filter_ptags_on_images' );

    // Excerpt Length
    function counterpoint_excerpt_length($length) { return 60; }
    add_filter('excerpt_length', 'counterpoint_excerpt_length');
    
    // Remove Caption Padding
    function counterpoint_caption_padding($width) { return $width - 10; }
    add_filter( 'img_caption_shortcode_width', 'counterpoint_caption_padding' );
    
    // Default Title
    function counterpoint_default_title($title) {
        $title = __('Untitled', 'counterpoint');
        return $title;
    }
    add_filter( 'default_title', 'counterpoint_default_title' );
    
    // If title field is left blank
    function counterpoint_no_title($title) {
        if ( $title == '' ) $title = __('Untitled', 'counterpoint');
        return $title;
    }
    add_filter( 'the_title', 'counterpoint_no_title' );
    
    
    // Return Font URL (called via enqueue)
    
    function counterpoint_font_url() {
        $font_url = '';
        /*
         * Translators: If there are characters in your language that are not supported
         * by the current font, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Droid Serif font: on or off', 'counterpoint' ) )
            $font_url = add_query_arg( 'family', urlencode( 'Roboto Slab:300|Open Sans:300,400,300italic' ), '//fonts.googleapis.com/css' );
        
        return $font_url;
    }

    
    // Enqueue Scripts, Fonts, and Styles. //
    add_action('wp_enqueue_scripts', 'counterpoint_scripts', 11);
    function counterpoint_scripts() {
    
        // CSS //
        wp_enqueue_style( 'counterpoint-fonts', counterpoint_font_url(), array(), null );
        wp_enqueue_style('counterpoint-style', get_template_directory_uri() . '/library/css/style.css');
            
        // Javascript //
        wp_enqueue_script('counterpoint-scripts', get_template_directory_uri() . '/library/js/scripts-min.js',array('jquery'),'',true);

        if ( is_singular() && comments_open() && get_option('thread_comments') )
            wp_enqueue_script( 'comment-reply' );
    }
    
    
    // Register Widget Space //
    
    function counterpoint_create_widget($name, $id, $description) {
        register_sidebar(array(
            'name' => __($name, 'counterpoint'),
            'id'     => $id,
            'description'     => __($description, 'counterpoint'),
            'before_widget' => '<div class="' . $id . ' widget %2$s">',
            'after_widget'    => '</div>',
            'before_title'    => '<h4>',
            'after_title'     => '</h4>'
        ));
    }

    counterpoint_create_widget('Footer Widget', 'footer-widget', 'Area in the Footer.');
    counterpoint_create_widget('Header Right', 'header-widget', 'Area at the right side of the header. Holds a single widget. Perfect for social icons, search bar, or a site tagline.');


    /*
     * Catch That Image. Returns the first image in a post (in lieu of Featured Image)
     * http://css-tricks.com/snippets/wordpress/get-the-first-image-from-a-post/
    */
    
    function counterpoint_catch_image($post_id) {
        $first_img = '';
        ob_start();
        ob_end_clean();
        $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', get_post($post_id)->post_content, $matches);
        if ( empty($output) ) return false;
        $first_img = $matches[1][0];
        return $first_img;
    }
    
    
    // Post Header Function Call
    // Checks for post thumbnail. If none, gets first image. Else, default class 'no-featured-image'
    
    function counterpoint_thumbnail_style($post_id, $img_size = 'full') {

        if ( has_post_thumbnail($post_id) ) {
        
            $img_id = get_post_thumbnail_id($post_id);
            $img_src = wp_get_attachment_image_src($img_id, $img_size);
            $img_url = $img_src[0];
            $alt_text = get_post_meta($img_id, '_wp_attachment_image_alt', true);
            if ( !$alt_text ) {
                $alt_text = get_the_title($post_id);
            }
                 
        } else {
            
            // grab the first image from the post
            $img_url = counterpoint_catch_image($post_id);
            $alt_text = get_the_title($post_id);
            
        }
        
        if ( $img_url ) {
            return '" style="background: #fff url(' . esc_attr( $img_url ) .
                   '); background-position: center; background-size: cover" title="Image of: ' . esc_attr( $alt_text );
        }
        // if no image, apply class no-featured-image
        return ' no-featured-image" title="' . esc_attr( $alt_text );
        
    };


    // Comment Layout
    
    function counterpoint_comments( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment; ?>
        <li <?php comment_class(); ?>>
            <div id="comment-<?php comment_ID(); ?>">
                <header class="comment-author vcard cf">
                    <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( get_comment_author_email() ); ?>?s=64" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.png" />
                    <div class="comment-author-info"><?php printf('<cite class="fn">%s</cite>', get_comment_author_link()); ?>
                    <?php edit_comment_link(__('Edit', 'counterpoint'), ' &#183; ', ''); ?>
                    <?php comment_reply_link(array_merge($args, array('before' => ' &#183; ','depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                    </div>
                    <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo esc_html( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time('F jS, Y'); ?></a></time>
                </header>
                <?php if ($comment->comment_approved == '0') : ?>
                    <p class="alert-blue"><?php _e( 'Your comment is awaiting moderation.', 'counterpoint' ) ?></p>
                <?php endif; ?>
                <section class="comment-content">
                    <?php comment_text(); ?>
                </section>
            </div>
        <?php // </li> is added by WordPress automatically
    } // don't remove this bracket!
    
    
    // Next and Previous Post Navigation
    
    function counterpoint_adjacent_posts_display($nextorprev, $post_id) { 
        $np_url = get_permalink($post_id);
        $np_title = get_the_title($post_id);
        if ($nextorprev === 'next') {
            $capitalized = 'Next';
        } else {
            $capitalized = 'Previous';
        }
        ?>
    
        <div class="<?php echo $nextorprev; ?>-post">
            <a href="<?php echo esc_url($np_url); ?>" title="<?php echo $capitalized; ?> Post: <?php echo esc_attr($np_title); ?>" class="cf">
                <div class="<?php echo $nextorprev; ?>-post-thumb<?php echo counterpoint_thumbnail_style($post_id); ?>"></div>
                <h3><?php echo esc_html($np_title); ?></h3>
            </a>
        </div>
        
    <?php
    };
    
    function counterpoint_adjacent_posts() {
        $next_post = get_next_post();
        $prev_post = get_previous_post();
        $is_next = is_object($next_post);
        $is_prev = is_object($prev_post); ?>
        <nav class="post-nav cf">
            <?php
            
            if ( $is_next && $is_prev ) {
                counterpoint_adjacent_posts_display('next', $next_post->ID);
                counterpoint_adjacent_posts_display('prev', $prev_post->ID);
            } else if ( $is_next ) {    // if first post //
                counterpoint_adjacent_posts_display('next', $next_post->ID);
            } else if ( $is_prev ) { // if last post //
                counterpoint_adjacent_posts_display('prev', $prev_post->ID);
            } ?>
        </nav>
    <?php
    }
    
    
    // Display Categories
    
    function counterpoint_categories() {
        $categories = get_the_category();
        $separator = ', ';
        $output = _n('Topic', 'Topics', count($categories), 'counterpoint') . ': ';
        if($categories) {
            foreach($categories as $category) {
                $output .= '<a href="' . get_category_link( $category->term_id ) . '"';
                $output .= ' title="' . esc_attr( sprintf( __( 'View all posts in %s', 'counterpoint' ), $category->name ) ) . '">' . $category->cat_name . '</a>' . $separator;
            }
            echo trim($output, $separator);
        }
    }
    
    
    // Display Timestamp
    
    function counterpoint_posted_on() {
        printf('<time datetime="%1$s" class="timestamp">%2$s</time>',
        esc_attr( get_the_date('c') ),
        esc_html( get_the_date() )
        );
    }
    
    // Improved version of wp_link_pages_args
    
    add_filter('wp_link_pages_args','counterpoint_link_pages_args');
    function counterpoint_link_pages_args($args){
        $cp_defaults = array(
            'next_or_number'   => 'next_and_number',
            'before'           => '<nav class="post-pagination">',
            'after'            => '</nav>',
            'pagelink'         => '<span>%</span>',
            'nextpagelink'     => '<span>' . __('Next', 'counterpoint') . '</span>',
            'previouspagelink' => '<span>' . __('Prev', 'counterpoint') . '</span>'
        );
        $args = wp_parse_args( $cp_defaults, $args ); // overwrites $args with $cp_defaults //
        
        if($args['next_or_number'] == 'next_and_number') {
            global $page, $numpages, $multipage, $more;
            $args['next_or_number'] = 'number';
            $prev = '';
            $next = '';
            if ( $multipage && $more ) {
                $i = $page - 1;
                if ( $i && $more ) {
                    $prev .= _wp_link_page($i);
                    $prev .= $args['link_before'] . $args['previouspagelink'] . $args['link_after'] . '</a>';
                }
                $i = $page + 1;
                if ( $i <= $numpages && $more ) {
                    $next .= _wp_link_page($i);
                    $next .= $args['link_before'] . $args['nextpagelink'] . $args['link_after'] . '</a>';
                }
            }
            $args['before'] = $args['before'] . $prev;
            $args['after'] = $next . $args['after'];        
        }
        return $args;
    }
    
    
    // Numeric Page Navigation //
    
    function counterpoint_page_nav() {
        global $wp_query;
        $bignum = 999999999;
        if ( $wp_query->max_num_pages <= 1 )
            return;
        $paginate_links = paginate_links( array(
            'base'      => str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
            'format'    => '',
            'current'   => max( 1, get_query_var('paged') ),
            'total'     => $wp_query->max_num_pages,
            'prev_text' => __('Newer', 'counterpoint'),
            'next_text' => __('Older', 'counterpoint'),
            'type'      => 'array',
            'end_size'  => 1,
            'mid_size'  => 2
        ) );
        
        if ( $paginate_links ) {
            echo '<nav class="pagination cf">';
            foreach($paginate_links as $key=>$value) {
                echo $value;
            };
            echo '</nav>';
        }
    }
    
    
    // Displays the loop
    
    function counterpoint_archive_layout($post_id, $even_or_odd, $sticky = false) {
    
        if ($sticky) {
             echo '<header class="archive-header">' .
                      '<h2>' . __( 'Featured', 'counterpoint' ) . '</h2>' .
                  '</header>';
        } ?>
        
        <li <?php post_class($even_or_odd); ?>>
            <div class="archive-thumbnail<?php echo counterpoint_thumbnail_style($post_id); ?>" >
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="thumbnail-link"></a>
                <div class="post-info">
                    <div class="cp-cats"><?php counterpoint_categories(); ?></div>
                    <?php counterpoint_posted_on(); ?>
                </div>
            </div>
            <article class="excerpt cf">
                <h3 class="archive-post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                <?php
                
                    // gets content/excerpt based on whether more tag is present
                    $post = get_post($post_id);
                    $ismore = @strpos( $post->post_content, '<!--more-->');
                    if ($ismore) {
                        echo get_the_content('');
                    } else {
                        echo get_the_excerpt();
                    }
                    echo ' &hellip; <a class="more-link button" href="' . get_the_permalink() .
                         '" title="Keep reading ' . get_the_title() . '">' . __('Keep reading', 'counterpoint') . '</a>';
                    
                ?>
            </article>
            <footer class="cp-tags"><?php the_tags(); ?></footer>
        </li>
        
        <?php
        if ($sticky) {
             echo '<header class="archive-header">' .
                      '<h2>' . __( 'Recent Posts', 'counterpoint' ) . '</h2>' .
                  '</header>';
        }
    }
    

    // Main Index/Archive Loop Function (index.php, archive.php, search.php, tag.php, category.php)
    
    function counterpoint_archive_loop() { ?>
        <ul id="archive">
        <?php
        
            global $wp_query, $post;
            // first post of $main_query will be odd
            $even = false;
            
            // only do this crazy double-loop business on the home page of your blog
            if ( is_home() ) {
            
                /* Loop #1 - for stickies
                ========================== */
            
                // get an array of stickies
                $stickies = get_option('sticky_posts');
                // get the first one, or set it to false if none
                $first_sticky = $stickies ? end($stickies) : false;
                // get the posts_per_page variable (set by user)
                $ppp = get_option('posts_per_page');
                // used later to determine position of sticky
                $front_page_sticky = false;
                
                
                //    if a sticky exists...
                if ( $first_sticky && is_front_page() && !is_paged() ) {
                        
                    // query the most recent sticky post
                    $most_recent_sticky = new WP_Query( 'p=' . $first_sticky );
                    
                    // and display it
                    while ($most_recent_sticky->have_posts()) : $most_recent_sticky->the_post();
                        counterpoint_archive_layout($post->ID, '', true);
                    endwhile;
                        
                }
                wp_reset_postdata();
                
                
                /* Loop #2 - for the rest
                ========================== */
                
                /*
                    Goal: always even number of posts per page, NOT including sticky
                    
                    So, I need to determine where the sticky came from. Best I could come up with was to do
                    another query and look for the sticky in the first $ppp posts, where $ppp is the
                    user-defined posts-per-page.
                    
                    I know that this is convoluted, and I'm sure there's a better solution out there,
                    probably using pre_get_posts()...?
                    
                */
                
                
                // determine whether the sticky is from the front page or not
                if ( $first_sticky ) {

                    // so, this is the junk query
                    $junk_query = new WP_Query(array(
                        // do not prepend stickies to query
                        'ignore_sticky_posts' => 1
                    ));
                
                    // loop through the posts in $junk_query
                    foreach($junk_query->posts as $post_num=>$junk_post) {
                        
                        // if it comes across the $first_sticky within the first $ppp posts...
                        if ($post_num < $ppp && $junk_post->ID === $first_sticky) {
                            // set this to true, then quit
                            $front_page_sticky = true;
                            break;
                            
                        // if there's no match, leave $front_page_sticky false...
                        } elseif ($post_num >= $ppp) {
                            break;
                        }
                    }
                    wp_reset_postdata();
                }
                
                
                // okay, now we have all the variables we need to set up the query

                $cp_args = array(
                    'ignore_sticky_posts' => 1
                );
                
                if ( $front_page_sticky )
                    $cp_args['post__not_in'] = array($first_sticky);
                
                if ( is_paged() )
                    $cp_args['offset'] = ($wp_query->query_vars['paged'] - 1) * $ppp;
                
                
                // now for the main query
                $main_query = new WP_Query($cp_args);
                
                while ($main_query->have_posts()) : $main_query->the_post();
                    $even_or_odd = $even ? 'even-post' : 'odd-post';
                    $even = !$even;
                    counterpoint_archive_layout($post->ID, $even_or_odd);
                endwhile;
                wp_reset_postdata();
            
            } else {
            
                // do basic query on any page that isn't is_home()
                // i.e. archive and search pages
                
                while (have_posts()) : the_post();
                    $even_or_odd = $even ? 'even-post' : 'odd-post';
                    $even = !$even;
                    counterpoint_archive_layout($post->ID, $even_or_odd);
                endwhile;
                
            } // end if (is_home())
            ?>
        </ul>
    <?php
    }
    
?>