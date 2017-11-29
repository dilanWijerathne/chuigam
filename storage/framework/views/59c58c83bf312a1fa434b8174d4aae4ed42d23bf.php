<html>
    <?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    
    <script>
        $(document).ready(function(){
            
            $('#btn').click(function(){
                
                 $.ajax({
                  url: 'ajax_new',
                  type: "post",
                  data: "hello world !",
                  success: function(data){
                    alert(data);
                  }
                });  
                
            });
            
        });
    </script>
    
    <body>
    <?php echo e(csrf_field()); ?>

        <button id="btn">Click me</button>
        
    </body>
</html>