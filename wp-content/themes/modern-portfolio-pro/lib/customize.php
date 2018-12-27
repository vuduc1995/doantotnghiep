<?php
/**
 * Customize Text Control Class
 *
 * @package WordPress
 * @subpackage Customize
 * @since 3.4.0
 */
class Child_MPP_Text_Control extends WP_Customize_Control {

    public $type = 'text'; 
	
	public function render_content() {
		$val = $this->value();
        ?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<input class="allow-one-character" type="text" value="<?php echo esc_attr( $val[0] ); ?>" <?php $this->link(); ?> />
		</label>
		<script type="text/javascript">
			jQuery('body').on( 'change', '.allow-one-character', function(){
				var fullString = jQuery(this).val();
				
				jQuery(this).val(fullString.substring(0, 1).toUpperCase());
			});
		</script>
        <?php
    }
	
}

function mpp_sanitize_initial( $value ){
	if( $value ){
		$value = esc_attr( $value[0] );
	}
	
	return $value;
}

	global $wp_customize;

	$wp_customize->add_section( 
		'modern-portfolio-icon', array(
			'title'       => __( 'Modern Portfolio Icon', 'mpp' ),
			'description' => __( 'This will be displayed beside the site title and is limited to 1 character', 'mpp' ),
			'priority'    => 35,
	) );

	$wp_customize->add_setting( 'mpp_custom_initial', array(
		'default'           => 'M',
		'sanitize_callback' => 'mpp_sanitize_initial',
		'type'              => 'option',
	) );

	$wp_customize->add_control(	new Child_MPP_Text_Control(	$wp_customize, 'icon_textbox', array(
        'label'    => __( 'Enter custom site initial:', 'mpp' ),
        'section'  => 'modern-portfolio-icon',
		'settings' => 'mpp_custom_initial'        
    ) ) );