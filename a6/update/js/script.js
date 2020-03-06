/*
 * Code for HtmlAssignment6.html
 *  Vishal Thumar 000765604, 09 december 2018
 * # I, Vishal Thumar, student number 000765604, certify that all code submitted is my own work; that I have not copied it from any other source.  I also certify that I have not allowed my work to be copied by others. 
 */
/*
 * invokes when webpage loads 
 * @type type
 */
 $(document).ready(function () {
                $( window ).on( "load", function()  
                {
             $.get(
				"https://csunix.mohawkcollege.ca/~000765604/private/10065/a6/check.php",
                {
                    request: "x"    //send as parameter for checking request comming from right source
                   
                },
                function (Message)   //Responce of xmlhttprequest  
                {
                    $("#new").html(Message.length);
                
                }
                        
        );
            });
    function launch()   //invokes when user hits get notification button
    {
       
        $.get(
				"https://csunix.mohawkcollege.ca/~000765604/private/10065/a6/read.php",
                {
                    request: "x"    //send as parameter for checking request comming from right source
                   
                },
                function (Message)   //Responce of xmlhttprequest  
                {
                    $("#new").html(0);
                    for(var i = 0;i<Message.length;i++){
                    $("#output").append( "<div>"+Message[i].Notification );
                    $("#output").append("</div>");
                }
                }  
        );
    }
    function insert()   //invokes when user hits get insert button
    {
        if($("input[name=notification]").val() != ""){
        $.get(
                "https://csunix.mohawkcollege.ca/~000765604/private/10065/a6/insert.php",
                {
                    notification: $("input[name=notification]").val(),
                    request: "x"    //send as parameter for checking request comming from right source
                   
                },
                function (Message)//Responce of xmlhttprequest 
                {
                    
                    $("#new").html(Message.length);
                    $("input[name=notification]").val(""); 
                
                }
                        
        );
        } 
    }
    /*
     * even handlers
     */
    $("#submit").click(launch);
    $("#insert").click(insert);
});

            