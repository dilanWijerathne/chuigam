<html>
    
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/locale/en-gb.js"></script>
    
       
    <script>
         $(document).ready(function(){
                $('ul.tabs').tabs();
                // Initialize collapse button
                $(".button-collapse").sideNav();
                // Initialize collapsible (uncomment the line below if you use the dropdown variation)
                //$('.collapsible').collapsible();
                $('.modal').modal();
             
                $('.datepicker').pickadate({
                    selectMonths: true, // Creates a dropdown to control month
                    selectYears: 15 // Creates a dropdown of 15 years to control year
                });
                
                $('select').material_select();
             
                $('input#input_text, textarea#textarea1').characterCounter();
                
                
//             
//                $('.cbox').change(function(){
//                     if($('.cbox').attr('checked') == true){
//                          $(this).val('true');
//                     }else{
//                          $(this).val('false');
//                     }
//                });
             
          });
        
        
        moment().format();    
        
    </script>
    
</head>    
    

    



    