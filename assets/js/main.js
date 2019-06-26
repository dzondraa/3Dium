function changeUser(){
    
    $("#userChange").change(function(){
        let id = document.querySelector("#userChange").options[document.querySelector("#userChange").selectedIndex].value;
        ajaxIt(id , 1);
    });
}
function printArticle(article){
    return `
    <div class="card moja" style="width: 18rem;">
    <img src="${article.big}" class="card-img-top" alt="${article.heading}">
    <div class="card-body">
        <h5 class="card-title">${article.heading}</h5>
        <p class="card-text">${article.text}</p>
        <a href="index.php?page=singleArticle&id=${article.idArticle}" class="btn btn-primary">Read more</a>
    </div>
    </div>
    `;
}
function printAllArticles(data){
    let str='';
    data.forEach(element => {
        str += printArticle(element);
    });
    return str;
}
function displayPaginator(x){
    document.querySelector("#pagin").innerHTML ="";
    let broj = Math.ceil(x / 3);
    for(let i = 1; i <= broj; i++){
        document.querySelector("#pagin").innerHTML += `
        <li class="page-item"><a class="page-link pagini" data-pag=${i} href="#">${i}</a></li>
        `;
    }
    $(".pagini").click(function(){
        let limit = $(this).data("pag");
        let id = document.querySelector("#userChange").options[document.querySelector("#userChange").selectedIndex].value;
        ajaxIt(id , limit);
    
    });
}

    
function ajaxIt(id , limit){
        
        $.ajax({
            url : "models/articles/getById.php",
            dataType : "json",
            data : {id : id , limit : limit},
            method : "post" , 
            success : function(data){
                console.log(data);
                document.querySelector("#articles").innerHTML = printAllArticles(data);
            },
            error : function(e , ex){
                console.log(e);
            }
        });
        $.ajax({
            url : "models/articles/getLength.php",
            dataType : "json",
            data : {id : id},
            method : "post" , 
            success : function(data){
                displayPaginator(data.len);
                
            },
            error : function(e , ex){
                console.log(e);
            }
        });
    }
function brisanje(){
    $(".brisanjeAdmin").click(function(){
        let id = $(this).data("id");
        $.ajax({
            url : "models/articles/delete.php",
            dataType : "json",
            data : {id : id},
            method : "post" , 
            success : function(data){
                console.log(data);
                document.querySelector("#bod").innerHTML = showTable(data);
                brisanje();
                
            },
            error : function(e , ex){
                console.log(e);
            }
        });
    });
}
function showTable(data){
    document.querySelector("#suc").innerHTML = "";
    document.querySelector("#suc").innerHTML = `<div class="alert alert-success" role="alert">
    Article deleted successful!
  </div>`;

    let br = 1;
    let str = "";
    data.forEach(e => {
        str += `
        <tr>
            <td>${br}</td>
            <td>${e.heading}</td>
            <td>${e.text}</td>
            <td><img src="${e.big}" alt="${e.heading}"></td>
            <td><a class='btn btn-info' href='index.php?page=addNew&id=${e.idArticle}' data-id="<?=$article->idArticle?>" role='button'>Update</a></td>
            <td><a class='btn btn-danger brisanjeAdmin' href='#' data-id="${e.idArticle}" role='button'>Remove</a></td>
        </tr>
        `;
        br++;
    });
    
    return str;
}