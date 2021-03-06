<?php
/**
 * Your Inspiration Themes
 * 
 * @package WordPress
 * @subpackage Your Inspiration Themes
 * @author Your Inspiration Themes Team <info@yithemes.com>
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

/**
 * YIT Support submenu page
 * 
 * 
 * @since 1.0.0
 */
class YIT_Submenu_Support extends YIT_Submenu_Abstract {
    
    /**
     * Menu items
     * 
     * @var array
     * @since 1.0.0
     */
    public $_menu = array();
    
    /**
     * Submenu items
     * 
     * @var array
     * @since 1.0.0
     */
    public $_submenu = array();
    
    /**
	 * Support forum url
	 * 
	 * @var string
	 */
	protected $_url = 'http://support.yithemes.com/';
    
	/**
	 * Constructor
	 * 
	 */
	public function __construct($tabPath, $tabName) {
		$this->init();
		parent::__construct($tabPath, $tabName);
	}

    /**
	 * Init helper method
     * 
	 */
	public function init() {
	    $this->_menu = apply_filters( 'yit_admin_menu_support', array() );

        if( isset( $_GET['page'] ) && $_GET['page'] == 'yit_panel_support') {
        	add_filter( 'admin_body_class', array($this,'admin_body_class') );
        }
	}

    
    /**
     * Should print the menu but here it's not needed.
     * 
     * @return bool
     * @since 1.0.0
     */
    public function get_menu($id) {
        return false;
    }
	
	
	/**
	 * Print an iframe for the support
	 * 
	 * @return void
     * @since 1.0.0
	 */
	public function display_page() {
		//echo "<iframe id='yit_iframe' src='{$this->_url}' width='100%' height='100%'></iframe>";
		echo "<iframe id='yit_iframe' src='" . YIT_SUPPORT_URL . "' width='100%' height='100%'></iframe>";
	}
	
}
