const form = document.querySelector("#resume_form"),
sendBtn = form.querySelector("#submitForm"),
resume = document.querySelector(".resume-items");



$(document).ready(function () {
    $("#resume_form").on("submit", function(e) {
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "get_experience.php", true);
        xhr.onload = ()=>{
          if(xhr.readyState === XMLHttpRequest.DONE){
              if(xhr.status === 200){
                  let responseObj = xhr.response;
                  alert(responseObj.message);
              }
          }
        }
        let formData = new FormData(form);
        xhr.send(formData);
        
    });
        
       /* $.ajax({
            url: formURL,
            type: "POST",
            data: postData,
            success: function(data, textStatus, jqXHR) {
                console.log(postData);
                
            },
            error: function(jqXHR, status, error) {
                console.log(status + ": " + error);
            }
        });
    });*/
     
    $("#submitForm").on('click', function() {
        $("#resume_form").submit();
    });
});