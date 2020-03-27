;(function($){
    $(document).ready(function(){
        alert("hello");  
        
        
        $(document).on('widget-updated',function(event,widget){
            var widget_id = $(widget).attr('id');
            if(widget_id.indexOf('naher_widget')!=-1){
                console.log("Welcome");
                var image_url = $(".img_url").val();
                console.log(image_url);
                if (image_url) {
                    $(".imgpreview").html(`<img src='${image_url}' />`);
                }
            }
        });




         // Wp.media()      
      $(".widgetuploader").on("click", function(){
          var frame;
          frame = wp.media({    // Frame Basic Setup
              title:"Select Image",
              button:{
                  text:"Insert Image",
              },
              multiple: false,
          });

          frame.on("select", function(){ // Image Select After What I do 

            var attachment = frame.state().get("selection").first().toJSON(); // Image info here get img id , url etc
            $(".img_id").val(attachment.id); // image id store 
            $(".img_id").trigger('change'); 
          //  $(".img_url").val(attachment.url); // Default Image Size long
            $(".img_url").val(attachment.sizes.thumbnail.url); // image thumbnail url store 
            $(".imgpreview").html(`<img src="${attachment.sizes.thumbnail.url}"/>`); // Whne insert image then show image in widgets form 
           // console.log(attachment);
          });

          
          frame.open(); // Meida Open Command
         // return false; // Only For Button stop loading

        })// Upload Image Button Event End Here

    });
})(jQuery)