window.onload = function(){
    addEvent();
    addEventImg();
}
function printPhotos(data){
    let str = "";
    data.forEach(e => {
        str += `
        <div class="card" style="width: 10rem;">
        <img class="card-img-top" src="${e.small}" alt="Article photo">
        <div class="card-body text-center">
          <a href="#" class="btn btn-primary">Delete</a>
        </div>
      </div>
        `;
    });
    return str;
}

function formCheck(){
    let heading = document.querySelector("#heading").value;
    let desc = document.querySelector("#description").value;
    let errors = [];
    let pregHeading = /[\w]+(\s[\w\.\,]+)*/;
    let pregDesc = /[\w]+(\n*\s[\w\.\,]+)*/;
    if(!pregHeading.test(heading)){
        errors.push("Invalide hading!");
    }
    if(!pregDesc.test(desc)){
        errors.push("Invalide description!");
    }
    if(document.getElementById("file") != null){
    if( document.getElementById("file").files.length == 0 ){
        errors.push("You must select a photo!");
    }
}
    
    if(errors.length){
        let str="";
        errors.forEach(e => {
            str+=e+"\n";
        });
        document.querySelector("#mainErr").innerHTML = `<div class='alert alert-danger' role='alert'>
        ${str}
      </div>`;
        return false;
    }
    else{
        return true;
    }
    
}
function addEvent(){
    $('#formaAdd').on('submit',(function(e) {  
        e.preventDefault();
        var formData = new FormData(this);
        if(!formCheck()){
            return false;
        }
        $.ajax({
            type:'POST',
            url: $(this).attr('action'),
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                $("#formAdd").hide();
                document.querySelector("#cont").innerHTML = `
                <div class="alert alert-success">
                <strong>Success!</strong> Article uploaded!
              </div>
                `;
                
                
            },
            error: function(e , ex){
                console.log(e);
            }
        });
    
    
    }));
}   
function addEventImg(){
    $('#form').on('submit',(function(e) {  
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: $(this).attr('action'),
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                console.log(data);
                document.querySelector("#uploaded").innerHTML = printPhotos(data);   
                
            },
            error: function(e , ex){
                console.log(e);
            }
        });
    
    
    }));
} 
function printPhotos(data){
    let str = "";
    data.forEach(e => {
        str += `
        <div class="card" style="width: 10rem;">
                <img class="card-img-top" src="${e.big}" alt="Article photo">
                <div class="card-body">
                  <a href="#" data-id="${e.idImg}" class="btn btn-primary">Delete</a>
                </div>
              </div>
        `;
    });
    return str;
}
