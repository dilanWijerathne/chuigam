<html>
    @include('header')
    
    
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
    {{ csrf_field() }}
        <button id="btn">Click me</button>
        
    </body>
</html>