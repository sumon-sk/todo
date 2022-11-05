    $( document ).ready(function() {
    
    "use strict";
    
    var todo = function() { 
        $('.todo-list .todo-item input').click(function() {
        if($(this).is(':checked')) {
            $(this).parent().parent().parent().toggleClass('complete');
        } else {
            $(this).parent().parent().parent().toggleClass('complete');
        }
    });
    
    $('.todo-nav .all-task').click(function() {
        $('.todo-list').removeClass('only-active');
        $('.todo-list').removeClass('only-complete');
        $('.todo-nav li.active').removeClass('active');
        $(this).addClass('active');
    });
    
    $('.todo-nav .active-task').click(function() {
        $('.todo-list').removeClass('only-complete');
        $('.todo-list').addClass('only-active');
        $('.todo-nav li.active').removeClass('active');
        $(this).addClass('active');
    });
    
    $('.todo-nav .completed-task').click(function() {
        $('.todo-list').removeClass('only-active');
        $('.todo-list').addClass('only-complete');
        $('.todo-nav li.active').removeClass('active');
        $(this).addClass('active');
    });
    
    $('#uniform-all-complete input').click(function() {
        if($(this).is(':checked')) {
            $('.todo-item .checker span:not(.checked) input').click();
        } else {
            $('.todo-item .checker span.checked input').click();
        }
    });
    
    $('.remove-todo-item').click(function(e) {
        e.preventDefault();  
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var todo_id=$(this).attr('accesskey');
        var formcData = {
            cat_id: jQuery('.category-list .category-id').val(),
        };
        var type = "POST";
        var ajaxurl = 'todos/delete/'+todo_id;
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formcData,
            dataType: 'json',
            success: function (data) {
                
            },
            error: function (data) {
                console.log(data);
            }
        });
        $(this).parent().remove();
    });
    };
    
    todo();
    
    $(".addcategory").click(function (e) {
        
          e.preventDefault();  
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var formData = {
            name: jQuery('.category').val(),
        };
        var state = jQuery('#categorysave').val();
        var type = "POST";
        var ajaxurl = 'categories';
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var cid=data.id;
                $(' <li class="list-group-item"><span class="remove-cat-item mr-4" onmessage="'+cid+'"><a onclick="catdel('+cid+')"><i class="fa fa-times" aria-hidden="true"></i></a></span> '+$('.category').val()+'</li>').insertAfter('.category-list .list-group-item:last-child');
               location.reload();
            },
            error: function (data) {
                console.log(data);
            }
        });
            
            
        
        
       
    });
    $('.category-list .list-group-item .remove-cat-item').click(function(e) {
         e.preventDefault();  
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var cat_id=$(this).attr('onmessage');
        var formcData = {
            cat_id: jQuery('.category-list .category-id').val(),
        };
        var type = "POST";
        var ajaxurl = 'categories/delete/'+cat_id;
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formcData,
            dataType: 'json',
            success: function (data) {
                
            },
            error: function (data) {
                console.log(data);
            }
        });
        $(this).parent().remove();
    });
    
});
