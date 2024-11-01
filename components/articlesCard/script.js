window.onload = function () {
    console.log("wewewe");
    let prevButton = document.getElementsByClassName('prevButton')[0];
    prevButton.addEventListener('click', previousArticle);
    let nextButton = document.getElementsByClassName('nextButton')[0];
    nextButton.addEventListener('click', nextArticle);
  }

function previousArticle(){
    let page = parseInt(document.getElementById("page").value);
    if (page <= 2 ){
        window.location.href = `../../../view/pages/home#articleContainer`;
    }
    else{
        window.location.href = `../../../view/pages/home?page=${page-1}#articleContainer`;
    }
}

function nextArticle(){
    let page = parseInt(document.getElementById("page").value);
    window.location.href = `../../../view/pages/home?page=${page+1}#articleContainer`;
}