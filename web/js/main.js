$(document).ready(function(){

//показ виджета корзины
       function showCart(cart){
           $('#cart .modal-body').html(cart);
           $('#cart').modal();
       }


//delete 1 product
       $('#cart .modal-body').on('click', '.del-item', function(){
           var id = $(this).data('id');
           $.ajax({
               url: '/cart/del-item',
               data: {id: id},
               type: 'GET',
               success: function(res){
                   if(!res) alert('Ошибка!');
                   //console.log(res);
                   showCart(res);
               },
               error: function(){
                  alert('ERROR');
               }
           });
       });



//корзина для вью карт
       $('.cart_item_delete .cart_info').on('click', '.del-item', function(){

           var id = $(this).data('id');
           $.ajax({
               url: '/cart/del-item',
               data: {id: id},
               type: 'GET',
               success: function(res){
                   if(!res) alert('Ошибка!');
                   showCart(res);
               },
               error: function(){
                  alert('ERROR');
               }
           });
       });




//добавить в корзину
       $('.add-to-cart').on('click', function(e){
           e.preventDefault();
           var id = $(this).data('id');
           var qty = $('#qty').val();
           $.ajax({
               url: '/cart/add',
               data: {id: id, qty: qty},
               type: 'GET',
               success: function(res){
                   if(!res) alert('Ошибка!');
                   // console.log(res);
                   //готовый вид для вставки в модальное окно
                   showCart(res);
               },
               error: function(){
                  alert('ERROR');
               }
           });
       });

       $('.add-to-favorite').on('click', function(e){
           e.preventDefault();
           var id = $(this).data('id');
           $.ajax({
               url: '/favorite/add',
               data: {id: id},
               type: 'GET',
               success: function(res){
                   if(!res) alert('Ошибка!');
                   // console.log(res);
                   //готовый вид для вставки в модальное окно
                   // showCart(res);
               },
               error: function(){
                  alert('ERROR');
               }
           });
       });



//Cart on ViewPage
       //delete 1 product
              $('#cartView').on('click', '.del-item', function(){
                  var id = $(this).data('id');
                  $.ajax({
                      url: '/cart/del-item',
                      data: {id: id},
                      type: 'GET',
                      success: function(res){
                          if(!res) alert('Ошибка!');
                          //console.log(res);
                          showCart1(res);
                      },
                      error: function(){
                         alert('ERROR');
                      }
                  });
              });



//корзина для вью карт
              $('.cart_item_delete .cart_info').on('click', '.del-item', function(){

                  var id = $(this).data('id');
                  $.ajax({
                      url: '/cart/del-item',
                      data: {id: id},
                      type: 'GET',
                      success: function(res){
                          if(!res) alert('Ошибка!');
                          // console.log(id);
                          showCart(res);
                      },
                      error: function(){
                         alert('ERROR');
                      }
                  });
              });

//
              function showCart1(cart){
                  $('#cartView').html(cart);

              }


});
