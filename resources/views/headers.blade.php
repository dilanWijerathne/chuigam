<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="css/starwars.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
    <!-- <script src="js/starwarsjs.js"></script>
    <script src="js/starwars.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/locale/en-gb.js"></script> -->





    <script>
         $(document).ready(function(){


                $('ul.tabs').tabs();
                // Initialize collapse button
                $(".button-collapse").sideNav();
                // Initialize collapsible (uncomment the line below if you use the dropdown variation)
                //$('.collapsible').collapsible();
                $('.modal').modal();

                $("#notification-btn").click(function(){
                    $(".notifications-wrapper").toggle();
                });

                $('.datepicker').pickadate({
                    selectMonths: true, // Creates a dropdown to control month
                    selectYears: 15 // Creates a dropdown of 15 years to control year
                });

                // $('.timepicker').pickatime({
                //     default: 'now', // Set default time
                //     fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
                //     twelvehour: false, // Use AM/PM or 24-hour format
                //     donetext: 'OK', // text for done-button
                //     cleartext: 'Clear', // text for clear-button
                //     canceltext: 'Cancel', // Text for cancel-button
                //     autoclose: false, // automatic close timepicker
                //     ampmclickable: true, // make AM PM clickable
                //     aftershow: function(){} //Function for after opening timepicker
                // });

                $('select').material_select();

                $('input#input_text, textarea#textarea1').characterCounter();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

//
//                $('.cbox').change(function(){
//                     if($('.cbox').attr('checked') == true){
//                          $(this).val('true');
//                     }else{
//                          $(this).val('false');
//                     }
//                });




                  $('.chips').material_chip();

                  $('.chips-placeholder').material_chip({
                    placeholder: 'Enter a tag',
                    secondaryPlaceholder: '+Tag',
                  });
                  $('.chips-autocomplete').material_chip({
                    autocompleteOptions: {
                      data: {
                        'Apple': null,
                        'Microsoft': null,
                        'Google': null
                      },
                      limit: Infinity,
                      minLength: 1
                    }
                  });

                  $("#skills_save").click(function(){
                        // console.log($('.chips-initial').material_chip('data'));
                  });

                  $('#img-overlay').click(function() {
                      $('#profile-img-upload').click();
                  });

                  // $(' .rate_row ').starwarsjs({
                  //
                  //   target : this.selector,
                  //
                  //   // Set the number of stars per row.
                  //   stars : 1,
                  //
                  //   // By default the values of per star are starting from one and ending with the number of stars.
                  //   // By activating range option it is possible to define different start and end values for rate's range.
                  //   // The first element of array stands for the start value and the last element of array stands for the end value of range.
                  //   range : [],
                  //
                  //   // Initially the values of rate are incrementing by one. In case you want to increment rate values by another number then the choice is yours.
                  //   count : 1,
                  //
                  //   // disable option allows to have inactive star icons which are not clickable.
                  //   // When a number bigger than zero is set for this option then all next values till the end of defined range are becoming disabled.
                  //   // Note: the number of disabled star icons should not exceed the stars or the value of the last element of a range array.
                  //   disable : 0,
                  //
                  //   // In case user wants to have active items by default then default_stars option should be activated.
                  //   // Just set a desired number of stars here.
                  //   // Note: the number of disabled star icons should not exceed the stars or the value of the last element of a range array.
                  //   default_stars : 0,
                  //
                  // });



          });





        // moment().format();

    </script>

</head>
