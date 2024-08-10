$(document).ready(function(){
$("#private-note-form").submit(function(e){
    e.preventDefault()

    $.ajax({
        url: 'add-note.php',
        data: $(this).serialize(),
        method: 'POST',
        success : function(response){
            $('#success').html(response);
        }
    })
})
    
    
})



$(document).ready(function(){
    $("#delete-note").click(function(e){
        e.preventDefault();

      let data = {id : $('#delete-note').attr('data-value')  }
      
    
        $.ajax({
            url: 'delete-note.php',
            data: data,
            method: 'POST',
            success : function(response){
                $('#note-success').html(response);
            }
        
           
        })
    })
        
        
    })


    $(document).ready(function(){
        $("#edit-note").click( async function(e){
            e.preventDefault(); 

            const { value: text } = await Swal.fire({
                input: "textarea",
                inputLabel: "Edit Private Note",
                inputPlaceholder: "Type your private note here...",
                inputAttributes: {
                  "aria-label": "Type your message here"
                },
                showCancelButton: true
              });
            

              if (text) {
                let id =  $('#edit-note').attr('data-id') 
                $.ajax({
                    url: 'edit-note.php',
                    data: { 'note' : text,'id':id},
                   
                    method: 'POST',
                    success : function(response){
                        $('#note-success').html(response);
                    }
                
                   
                })

        
    }
        
}
    )}) 

  