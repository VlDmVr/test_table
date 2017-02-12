$(document).ready(function(){
    
    var id;
    var name;
    var price;
    var status;
    var description;
    var name_cat;
    var cat_id;
    
    var intervalId;

        //обработчик события click по а.link
        $('.link').click(function(event){

            if(intervalId){
                clearInterval(intervalId);
            }
            event.preventDefault();
            
            $('#update_block').show();
            
            id = '';
            name = '';
            price = '';
            status = '';
            description = '';
            name_cat = '';
            cat_id = '';

            id = $(this).attr('data-item');
            
            $.ajax({
                type : 'POST',
                url : '/handlers/select_handler.php',
                data : {'id' : id},
                cache: false,
                dataType: 'json',
                success : function(data){

                    $.each(data, function(){
                
                        id = this.id_g;
                        name = this.name;
                        price = this.price;
                        description = this.description;
                        name_cat = this.name_cat;
                        cat_id = this.id;
                        

                        $('#update_block input[name = id]').val(this.id_g);
                        $('#update_block input[name = name]').val(this.name);
                        $('#update_block input[name = price]').val(this.price);
                        $('#update_block textarea').val(this.description);

                        $('#update_block select option').removeAttr('selected');
                        $('#update_block select option[value='+this.id+']').attr('selected', 'selected');
                    });
                }
            });
            
        }); 
        //end обработчик события click по а.link ------------------------------------------------------
        
        //update block --------------------------------------------------------------------------------
        $('.update_form').focus(function(){
            
            intervalId = setInterval(updateData, 1000);
          
        });
        
        function updateData(){
            
            id = '';
            name = '';
            price = '';
            status = '';
            description = '';
            name_cat = '';
            cat_id = '';
            
            id = $('#update_block input[name = id]').val();
            name = $('#update_block input[name = name]').val();
            price = $('#update_block input[name = price]').val();
            status = $('#update_block select[name = status]').val();
            cat_id = $('#update_block select[name = name_cat]').val();
            description = $('#update_block textarea').val();

            $.ajax({
                type : 'POST',
                url : '/handlers/update_handler.php',
                cache: false,
                data : {'id' : id, 'name' : name, 'price' : price, 'status' : status, 'description' : description, 'cat_id' : cat_id},
                dataType: 'json',
                success : function(data){
                    
                    console.log('ok');
                    
                    $.each(data, function(){
                      
                        id = this.id_g;
                        name = this.name;
                        price = this.price;
                        description = this.description;
                        name_cat = this.name_cat;
                        cat_id = this.id;
                       
                      $('.link[data-item='+id+'][data-ind = name]').text(this.name);
                      $('.link[data-item='+id+'][data-ind = price]').text(this.price);
                      $('.link[data-item='+id+'][data-ind = description]').text(this.description);
                      $('.link[data-item='+id+'][data-ind = name_cat]').text(this.name_cat);
                  });

                }
            });
        }
        //end update block -------------------------------------------------------------------------------
        
        
        // Удаление setInterval, скрытие всплывающего блока update --------------------------------------
        $('#send').click(function(event){
            
            if(intervalId){
                clearInterval(intervalId);
            }
            
            event.preventDefault(); 
            
            $('#update_block').hide();
        });
        //end -------------------------------------------------------------------------------------
        
        //показать форму добавления товара
        $('#add').click(function(event){
            
            event.preventDefault(); 
            
            $('#add_goods').show();
        });
        
        
        //скрыть форму добавления товара и очистить данные
        $('.exit').click(function(){
            
            $('.add_form[name=name]').val('');
            $('.add_form[name=price]').val('');
            $('.add_form[name=description]').val('');
            $('.add_form[name=name_cat]').val('');
            
            $('#add_goods').hide();
        });
});


