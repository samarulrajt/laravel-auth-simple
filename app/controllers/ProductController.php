<?php
use MrJuliuss\Syntara\Controllers\BaseController;

/**
 * 
 */
class ProductController extends BaseController {
	
	function __construct() {
		
	}
	
	public function getIndex()
    {
        $this->layout = View::make('products.index');
        $this->layout->title = 'My Products';

        // add breadcrumb to current page
        $this->layout->breadcrumb = array(
            array(
                'title' => 'Dashboard',
                'link' => 'dashboard',
                'icon' => 'glyphicon-home'
            ),
            array(
                'title' => 'My Products',
                'link' => 'dashboard/product',
                'icon' => 'glyphicon-plus'
            ),
        );
    }
}


?>