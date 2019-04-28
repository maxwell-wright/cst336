<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>
        /*global $*/
        
            $(document).ready(function(){
                
                //alert("first");
                 function showFavorites(keyword) {
                    
                    //alert(keyword);
                
                    $.ajax({
                        
                        type: "get",
                        url: "api/showFavoritesAPI.php",
                        dataType: "json",
                        data: {'keyword': keyword},
                        success: function(data) {
                            alert("did it ");
                        },
                        
                        complete: function(data) { //optional, used for debugging purposes
                          //alert(status);
                        }
                        
                        
                    }); // ajax
                
                
                }; // showFavorites
                
                $.ajax({
                    
                    type: "get",
                    url: "api/viewFavoritesAPI.php",
                    dataType: "json",
                    success: function(data, status) {
                        //alert("hi");
                        
                        data.forEach(function(something){
                            let temp = something.keyword;
                            $("#keywords").append("<a href='#' onclick='showFavorites(this)'>" + temp + "</href> ");
                            
                        });
                        
                    },
                    complete: function(data, status) { //optional, used for debugging purposes
                      //alert(status);
                    }
                    
                }); // ajax
                
            //     function showFavorites(keyword) {
                    
            //         alert(keyword);
                
            //         $.ajax({
                        
            //             type: "get",
            //             url: "api/showFavoritesAPI.php",
            //             dataType: "json",
            //             data: {'keyword': keyword},
            //             success: function(data) {
            //                 alert("did it ");
            //             },
                        
            //             complete: function(data) { //optional, used for debugging purposes
            //               //alert(status);
            //             }
                        
                        
            //         }); // ajax
                
                
            //  }; // showFavorites
                
        }); // document ready
            
        </script>
    </head>
    <body>
        <h1>Favorites</h1>
        
        
        
        <nav id="keywords"></nav>
        <div id="images"></div>
    </body>
</html>