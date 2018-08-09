$(document).ready(function(){

//add to cart
       // $('.add-to-cart').on('click', function(e){
       //     e.preventDefault();
       //     var id = $(this).data('id');
           // var qty = $('#qty').val();
       //     $.ajax({
       //         url: '/cart/add',
       //         data: {id: id},
       //         type: 'GET',
       //         success: function(res){
       //             if(!res) alert('Ошибка!');
       //             console.log(res);
       //             // console.log(id);
       //             //готовый вид для вставки в модальное окно
       //             showCart(res);
       //         },
       //         error: function(){
       //            alert('ERROR555');
       //         }
       //     });
       // });

//show modal cart
       // function showCart(cart){
       //     $('#cart .modal-body').html(cart);
       //     $('#cart').modal();
       // }

//clear cart
              // function clearCart(){
              //     $.ajax({
              //         url: '/cart/clear',
              //         type: 'GET',
              //         success: function(res){
              //             if(!res) alert('Ошибка!');
              //             showCart(res);
              //         },
              //         error: function(){
              //            alert('ERROR222');
              //         }
              //     });
              // }



       // function getCart() {
       //     $.ajax({
       //         url: '/cart/show',
       //         type: 'GET',
       //         success: function(res){
       //             if(!res) alert('Ошибка!');
       //             showCart(res);
       //         },
       //         error: function(){
       //            alert('ERROR');
       //         }
       //     });
       //     return false;
       // }
       //
       // $('#cart .modal-body').on('click', '.del-item', function(){
       //     var id = $(this).data('id');
       //     $.ajax({
       //         url: '/cart/del-item',
       //         data: {id: id},
       //         type: 'GET',
       //         success: function(res){
       //             if(!res) alert('Ошибка!');
       //             //console.log(res);
       //             showCart(res);
       //         },
       //         error: function(){
       //            alert('ERROR1');
       //         }
       //     });
       // });

       //показ виджета корзины
       function showCart(cart){
           $('#cart .modal-body').html(cart);
           $('#cart').modal();
       }

       // function getCart() {
       //     $.ajax({
       //         url: '/cart/show',
       //         type: 'GET',
       //         success: function(res){
       //             if(!res) alert('Ошибка!');
       //             showCart(res);
       //         },
       //         error: function(){
       //            alert('ERROR');
       //         }
       //     });
       //     return false;
       // }

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

//очистить корзину
       // function clearCart(){
       //     $.ajax({
       //         url: '/cart/clear',
       //         type: 'GET',
       //         success: function(res){
       //             if(!res) alert('Ошибка!');
       //             showCart(res);
       //         },
       //         error: function(){
       //            alert('ERROR');
       //         }
       //     });
       // }

//добавить в корзину
       $('.add-to-cart').on('click', function(e){
           e.preventDefault();
           var id = $(this).data('id');
           // var qty = $('#qty').val();
           $.ajax({
               url: '/cart/add',
               data: {id: id},
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
});
