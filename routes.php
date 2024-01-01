<?php
     
     function call($controller,$action){
          require_once 'controller/'.$controller.'_controller.php';
          
          switch ($controller) {
               case 'pages':
                     require_once 'model/pages.php';
                    $controller = new PagesController();
                    break;
               case 'post':
                    require_once 'model/post.php';
                    $controller = new PostsController();
                    break;
               case 'product':
                    require_once 'model/product.php';
                    $controller = new ProductController();
                    break;
               case 'category':
                    require_once 'model/category.php';
                    $controller = new CategoryController();
                    break;
               case 'order':
                    require_once 'model/order.php';
                    $controller = new OrderController();
                    break;
               case 'customer':
                    require_once 'model/customer.php';
                    $controller = new CustomerController();
                    break;
          }
          $controller->{$action}();
     }
     $controllers = array('pages' => ['home','error','dashboard','login','logout'],
                         'post' => ['index','show'],
                         'category' => ['index','addcate','delcate','viewup','upcategory'],
                         'product' => ['index','viewadd','addproduct',
                         'delproduct','upproduct','viewup'],
                         'order' => ['index','detailOrder','uporder','delorder'],
                         'customer' => ['index']);
     if(array_key_exists($controller,$controllers)){
          if(in_array($action,$controllers[$controller])){//controllers[post]
               call($controller,$action);
          }else{
               call('pages','error');
          }
     }else{
          call('pages','error');
     }
?>