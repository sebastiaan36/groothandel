<?php
	if ( $size == 'small' ) $size = 'thumbnail';
    
    $a_attrs = $img_attrs = $div_attrs = array();
    
    $div_attrs['class'][] = "img_frame img_size_$size";
    
    if ( $lightbox == 'true' || $lightbox == 'false' && ! empty( $link ) )
        $is_link = true;
    else
        $is_link = false;
    
    if ( ! empty( $link ) )
        $a_attrs['href'] = $link;
    else {
        $image_id = yit_get_attachment_id($url);        
        if ( $image_id != 0 ) {
            list( $image_url, $image_width, $image_height ) = wp_get_attachment_image_src( $image_id, $size );      
            if ( empty( $width ) )  $width = $image_width;
            if ( empty( $height ) ) $height = $image_height;
            $img_attrs['src'] = $image_url;
            $a_attrs['href'] = $url;
        } else {                                   
            $img_attrs['src'] = $a_attrs['href'] = $url;
        }
    }
    
    if ( ! empty( $target ) )
        $a_attrs['target'] = $target;
    
    if ( ! empty( $lightbox ) && $lightbox == 'true' ) {
        $a_attrs['class'][] = 'thumb img';
        $a_attrs['rel'] = 'prettyphoto';
        if ( ! empty( $group ) )
            $a_attrs['rel'] .= "[$group]";   
    }
    
    if ( ! empty( $title ) )
        $img_attrs['title'] = $a_attrs['title'] = $title;
    
    if ( ! empty( $align ) )
        $div_attrs['class'][] = "align$align";
        
    if ( ! empty( $width ) ) {
        //$div_attrs['style'][] = "width:{$width}px;";
        $img_attrs['width'] = $width;
    }
        
    if ( ! empty( $height ) && $autoheight == 'false' ) {
        //$div_attrs['style'][] = "height:{$height}px;";
        $img_attrs['height'] = $height;
    } else if ( $autoheight == 'true' ) {
        //$div_attrs['style'] = "height:auto;";
    }
	         
    $attrs = array();
    foreach ( $div_attrs as $attr => $value ) {
        if ( is_array( $value ) )    
            $attrs[] = "$attr=\"" . implode( ' ', $value ) . "\"";
        else
            $attrs[] = "$attr=\"$value\"";
    }
    $div_attrs = implode( ' ', $attrs );
              
    $attrs = array();
    foreach ( $img_attrs as $attr => $value ) {
        if ( is_array( $value ) )    
            $attrs[] = "$attr=\"" . implode( ' ', $value ) . "\"";
        else
            $attrs[] = "$attr=\"$value\"";
    }
    $img_attrs = implode( ' ', $attrs );
              
    $attrs = array();
    foreach ( $a_attrs as $attr => $value ) {
        if ( is_array( $value ) )    
            $attrs[] = "$attr=\"" . implode( ' ', $value ) . "\"";
        else
            $attrs[] = "$attr=\"$value\"";
    }
    $a_attrs = implode( ' ', $attrs );

?>
    
<div class="image-styled">
  <div <?php echo $div_attrs ?>>


<div class="<?php if ( !$is_link ) : ?>picture_overlay_empty <?php endif ?>picture_overlay">
	<img <?php echo $img_attrs ?> />

	<?php if ( $is_link ) : ?>   
	<div class="overlay">
		<div>
			
			<p>
				<a <?php echo $a_attrs ?> rel="lightbox" class="ch-info-lightbox"><img src="<?php echo get_template_directory_uri() . '/images/icons/zoom.png' ?>" alt="<?php _e('Open Lightbox', 'yit') ?>" /></a>
			</p>
			
			
		</div>
	</div>
	<?php endif ?>
</div>

</div>
</div>