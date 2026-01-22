/* -------------------------------------------------------------------------------- /

	Magentech jQuery
	Created by Magentech
	v1.0 - 20.9.2016
	All rights reserved.

/ -------------------------------------------------------------------------------- */


	// Cart add remove functions
	var cart = {
		'add': function(product_id, quantity) {
            $(".add-to-cart").click(function(e){
                e.preventDefault();
                var url = $(this).data('url');
                $(".spinner-border", this).css("display","flex");
                $.ajax({
                    url: url,
                    type: 'GET',
                    async: true,
                    dataType: 'json',
                    cache: false,
                })
                .done(function(data){
                    var image = data['image'];
                    var name = data['name'];
                    var slung = data['slung'];
                    var host = window.location.host;
                    var image_url = "/uploads/products/"+image
                    var cart = "/e-commerce/shopping-cart/"
                    var url = "/e-commerce/product/"+slung

                    $("#cart").load(" #cart");

                    addProductNotice('Product added to Cart', '<img src="' +image_url+'">', '<h3><a href="#">'+name+'</a> added to <a href="'+cart+'">shopping cart</a>!</h3>', 'success');
                })
                .fail(function(){
                    alert('Error Occured')
                });
                //Firing Twice - Hapana Jaribu!!!
                e.stopImmediatePropagation();
                return false;
            });

		}
	}

	var wishlist = {
		'add': function(product_id) {
            $(".add-to-wishlist").click(function(e){
                e.preventDefault();
                var url = $(this).data('product');
                $(".spinner-border", this).css("display","flex");
                $.ajax({
                    url: url,
                    type: 'GET',
                    async: true,
                    dataType: 'json',
                    cache: false,
                })
                .done(function(data){
                    var image = data['image'];
                    var name = data['name'];
                    var slung = data['slung'];
                    var host = window.location.host;
                    var image_url = "/uploads/products/"+image
                    var cart = "/e-commerce/shopping-cart/"
                    var url = "/e-commerce/product/"+slung

                    addProductNotice('Product added to Wishlist', '<img src="' +image_url+'">', '<h3>You must <a href="#">login</a>  to save <a href="#">'+name+'</a> to your <a href="#">wish list</a>!</h3>', 'success');
                })
                .fail(function(){
                    alert('Error Occured')
                });
                //Prevent Firing Twice
                e.stopImmediatePropagation();
                return false;
            });

		}
	}
	var compare = {
		'add': function(product_id) {
			addProductNotice('Product added to compare', '<img src="image/demo/shop/product/e11.jpg" alt="">', '<h3>Success: You have added <a href="#">Apple Cinema 30"</a> to your <a href="#">product comparison</a>!</h3>', 'success');
		}
	}

	/* ---------------------------------------------------
		jGrowl – jQuery alerts and message box
	-------------------------------------------------- */
	function addProductNotice(title, thumb, text, type) {
		$.jGrowl.defaults.closer = false;
		//Stop jGrowl
		//$.jGrowl.defaults.sticky = true;
		var tpl = thumb + '<h3>'+text+'</h3>';
		$.jGrowl(tpl, {
			life: 4000,
			header: title,
			speed: 'slow',
			theme: type
		});
	}

