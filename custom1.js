$(document).ready(function() 
{
	showTable();
	getSubcategoryId();
	cartnoti();

	function getSubcategoryId()
	{
		var subcategoryid=$('#subcategoryid').val();

		getItem(subcategoryid);

		$('.listgroup_'+subcategoryid).toggleClass('active');
	}

	$('.list-group #subcategoryList').click(function(){
		var id = $(this).data('id');

		getItem(id);

		$('.list-group-item.active').removeClass('active');
		$('.listgroup_'+id).toggleClass('active');

	});

		

	function getItem(subcategoryid)
	{
		if (subcategoryid) 
		{
			$.ajax({ 
				type: "GET",                                     
      			url: 'getItem?id='+subcategoryid,
      			success: function(response)
      			{                    
		            // $("#responsecontainer").html(response); 
		            // console.log(response);
			        var html ='';

					var itemObjArray = JSON.parse(response); 

					console.log(itemObjArray);

					if(itemObjArray.length > 0)
					{
			            $.each(itemObjArray,function (i,v) 
						{
							html += `<div class="col-lg-4 col-md-4 col-sm-6 portfolio-item">
										<div class="card h-100">
										<a href="#">
						                	<img class="card-img-top" src="${v.photo}" alt="" style="height: 200px;object-fit:cover;">
						                </a>
									
										<div class="card-body">
					                		<h6 class="card-title">
					                    		<a href="#" class="secondary"> ${v.codeno} </a>
					                  		</h6>`;

					                  		

					        if(v.discount)
					        {
					        	html += `<p class="font-weight-lighter d-inline"> <del>  ${v.price} Ks </del>  </p>
					                	<h4 class="text-danger d-inline">  ${v.discount} Ks </h4>`;

					        }
					         
					        else
					        {
					        	html += `<h4 class="text-danger"> ${v.price} Ks </h4>`;
					        }
					                  
					        html += `</div>

									<div class="card-footer bg-transparent">
			                  			<a href="javascript:void(0)" class="btn btn-secondary btn-block addtocart" data-id="${v.id}" data-codeno="${v.codeno}" data-name="${v.name}" data-photo="${v.photo}" data-price="${v.price}"  data-discount="${v.discount}"style="background-color: #673AB7; border-color: #673AB7"> 
			                    			<i class="fas fa-shopping-cart pr-3"></i> Add To Cart 
			                  			</a> 
			               			</div> </div> </div>`; 


						});
			        }

			        else
			        {
			        	html += `<h3> There is no item in our database. </h3>`;
			        }

					console.log(html);

					$('#itemDiv').html(html);

		        } 
      		});  
		}



	}

	$('.addtocart').on('click', function(){
		var id = $(this).data('id');
		var codeno = $(this).data('codeno');
		var name = $(this).data('name');
		var photo = $(this).data('photo');
		var price = $(this).data('price');
		var discount = $(this).data('discount');
		 
		console.log(id);
		console.log(codeno);
		console.log(name);
		console.log(photo);
		console.log(price);
		console.log(discount);

		storeData(id, codeno, name, photo, price, discount);

	});
	$('#itemDiv').on('click','.addtocart', function(){
		var id = $(this).data('id');
		var codeno = $(this).data('codeno');
		var name = $(this).data('name');
		var photo = $(this).data('photo');
		var price = $(this).data('price');
		var discount = $(this).data('discount');
		 
		console.log(id);
		console.log(codeno);
		console.log(name);
		console.log(photo);
		console.log(price);
		console.log(discount);

        		storeData(id, codeno, name, photo, price, discount);

	});

function storeData(id, codeno, name, photo, price, discount)
{
	var qty = 1;
	var mylist = {id: id, codeno:codeno, name:name, photo:photo, price:price, discount:discount, qty:qty};
	var cart = localStorage.getItem('cart');

	if (!cart)
	{
		var cart = '{"mycart":[]}';
	}

	cart = JSON.parse(cart);

	var mycart = cart.mycart;
	var length = mycart.length;

	for (var i =0;i<length; i++) 
	{
	  if (id == mycart[i].id)
	  {
	  	var exit = 1;
	  	mycart[i].qty +=1;
	  }
	}

	if(!exit)
	{
		cart.mycart.push(mylist);
	}
	cart = JSON.stringify(cart);
	localStorage.setItem('cart', cart);

	cartnoti();
}

   function cartnoti()
   {
   	  var cart = localStorage.getItem('cart');
   	  if (cart)
   	  {
   	  	var cartobj = JSON.parse(cart);
   	  	var noti = cartobj.mycart.length;
   	  }

   	  $('.cartnoti').html(noti);

   	  
   }

   function	showTable()
   {
   	var localStorageitem = localStorage.getItem('cart');
   	if (localStorageitem)
   	{
   		var localStorageitem = JSON.parse(localStorageitem);
   		var mycart = localStorageitem.mycart;

   		var mytable=''; var total =0; 

   		$.each(mycart, function(i,v){
   			if(v)
   			{
   				var id = v.id;
   				var codeno = v.codeno;
   				var name = v.name;
   				var price = v.price;
   				var discount = v.discount;
   				var photo = v.photo;
   				var qty = v.qty;

   				if (discount > 0) 
   				{
                    var unit = discount;
   				}
   				else
   				{
   					var unit = price;
   				}

   				var subtotal = unit * qty;

   				mytable += `<tr>
                       <td><button class="btn btn-warning" data-id="${i}" id="deletebtn"><i class="fas fa-times"></i></button></td>
                       	<td><img src="${photo}" class="img-fluid" style="width:50px; height:50px;"></td>
                        <td>
                           <p>${name}</p>
                           <p>${codeno}</p>
                        </td>
                        <td>
                           <button class="btn btn-outline-danger" data-id="${i}" id="increasebtn" ><i class="fas fa-plus"></i></button></td>
                           <td><p>${qty}</p></td>
                          <td> <button class="btn btn-outline-danger" data-id="${i}" id="decreasebtn"><i class="fas fa-minus"></i></button>

                        </td>
                        <td>`;

                        if(discount >0)
                        {
                        	mytable += `<p class="font-weight-lighter"><del> ${price} Ks</del></p>
                                 <h4 class="text-danger">${discount} Ks</h4>
                        	`;
                        }

                        else
                        {
                        	mytable += `<h4 class="text-danger">${price}</h4>`;
                        }
                         
                   mytable +=`</td>
                        <td><p>${subtotal}</p></td>
                        }
                        }
   				</tr>`;
   			}

   			total += subtotal++;
   		});

   		myfoot = `<tr>
                     <td colspan="8">
                    <h3 class="text-right"> Total : ${total}Ks</h3></td>

   		</tr>


   		<tr>
                     <td colspan="4">
                      <textarea class="form-control" id ="notes"></textarea></td>
                      <td colspan="3">
                      <button class="btn btn-secondary btn-block checkoutbtn" data-total=${total}  style="background-color:#673AB7; border-color:#673AB7;">
                      Check Out</button></td>
   		</tr>`





   		$('#shoppingcart_table').html(mytable);
   		$('#shoppingcart_tfoot').html(myfoot);
   	}
   }

   $("#shoppingcart_table").on('click', "#deletebtn", function () {
   	var id = $(this).data('id');
   	var ans = confirm("Are you sure want to delete?");

   	if (ans) {
   		var cart = localStorage.getItem('cart');
   		var cartObj = JSON.parse(cart);
   		cartObj.mycart.splice(id,1);
   		var cartObj = JSON.stringify(cartObj);
   		localStorage.setItem('cart',cartObj);

   		showTable();
   	}

   });
   	
   $("#shoppingcart_table").on('click', "#increasebtn", function () {
   	
   	var id = $(this).data('id');
   	// console.log(id);
   	var cart = localStorage.getItem('cart');
   	var cartobj = JSON.parse(cart);

   	// console.log(cartobj.mycart);
   	// console.log(cartobj.mycart[id]);
   	cartobj.mycart[id].qty +=1 ;
   	cartobj = JSON.stringify(cartobj);

   	// console.log(cartobj);
   	localStorage.setItem('cart',cartobj);
   		
   		showTable();
   });

   $("#shoppingcart_table").on('click', "#decreasebtn", function () {
   	
   	var id = $(this).data('id');
   	var cart = localStorage.getItem('cart');
   	var cartObj= JSON.parse(cart);
   	cartObj.mycart[id].qty -= 1;

   	if (cartObj.mycart[id].qty == 0){
   		cartObj.mycart.splice(id,1);
   	}

   	cartObj = JSON.stringify(cartObj);
   	localStorage.setItem('cart',cartObj);

   	showTable();
   	cartnoti();
   });

   $



   $('#shoppingcart_tfoot').on('click', '.checkoutbtn', function(){

     var note =$('#notes').val();
     var total =$(this).data('total');
     var cart = localStorage.getItem('cart');
     var cartobj = JSON.parse(cart);

     var cartarr = cartobj.mycart;

     // $.post('url','data',function(response){
     // 	console.log(response);
     // })
    	$.post('storeorder.php',{cart:cartarr,total:total,note:note},function(response){
    		// console.log(response);
    	})
     });

});




//  {id: 10, codeno: "ZB_521565", name: "Chocolate", photo: "image/item/349784.jpeg", price: 30,…}
// id: 10
// codeno: "ZB_521565"
// name: "Chocolate"
// photo: "image/item/349784.jpeg"
// price: 30
// discount: 5
// qty: 1

