window.onload = function () {
  console.log("wewewe");
  let deleteButton = document.getElementsByClassName('delete')[0];
  deleteButton.addEventListener('click', deleteArticle);
  let editButton = document.getElementsByClassName('edit')[0];
  editButton.addEventListener('click', editArticleModal);
  let pinButton = document.getElementsByClassName('pin')[0];
  pinButton.addEventListener('click', pinArticle);
  let editModalButton = document.getElementById('editModalButton');
  editModalButton.addEventListener('click', editArticle);

  let cancelButtons = document.getElementsByClassName('cancelar');
  Array.from(cancelButtons).forEach((cancelButton) => {
    cancelButton.addEventListener('click', cancelDeletion);
  });
}

function editArticleModal(){
  document.getElementById("editModal").style.display = "block";
}

function editArticle() {
  console.log("editing article...")
  if(document.getElementById("editPassword").value == 'drocacobeer'){
    articleId = document.getElementById("articleId").value;
    window.location.href = `../../../view/pages/editarArticulo?idArticle=${articleId}`;
  }
  else{
    document.getElementById("editModal").style.display = "none";
  }
}

function pinArticle(e) {
  if(e.target.classList.contains("unpinned")){
    document.getElementById("pinModal").style.display = "block";
  }
  else{
    document.getElementById("unpinModal").style.display = "block";
  }
}

function deleteArticle() {
  document.getElementById("deleteModal").style.display = "block";
}

function cancelDeletion(e) {
  e.target.parentElement.parentElement.style.display = "none";
}

// Carrousel
const carousel = document.querySelector("#carousel");
const prevBtn = document.querySelector("#prevBtn");
const nextBtn = document.querySelector("#nextBtn");
let currentPosition = 0;
prevBtn.addEventListener("click", () => {
  currentPosition = currentPosition - 1 < 0 ? carousel.children.length - 1 : currentPosition - 1;
  carousel.style.transform = `translateX(-${currentPosition * 100}%)`;
});

nextBtn.addEventListener("click", () => {
  currentPosition = (currentPosition + 1) % carousel.children.length;
  carousel.style.transform = `translateX(-${currentPosition * 100}%)`;
});

setInterval(() => {
  currentPosition = (currentPosition + 1) % carousel.children.length;
  carousel.style.transform = `translateX(-${currentPosition * 100}%)`;
}, 10000);
$('section.awSlider .carousel').carousel({
  pause: "hover",
  interval: 2000
});

var startImage = $('section.awSlider .item.active > img').attr('src');
$('section.awSlider').append('<img src="' + startImage + '">');

$('section.awSlider .carousel').on('slid.bs.carousel', function () {
  var bscn = $(this).find('.item.active > img').attr('src');
  $('section.awSlider > img').attr('src', bscn);
});

/* etiqueta las imágenes pra poder rastrearlas, solo por conveniencia */
let i = 1;
for (let li of carousel.querySelectorAll('li')) {
  li.style.position = 'relative';
  li.insertAdjacentHTML('beforeend', `<span style="position:absolute;left:0;top:0">${i}</span>`);
  i++;
}

/* configuración */
let width = 400; // ancho de las imágenes
let count = 1; // conteo de las imágenes visibles

let list = carousel.querySelector('ul');
let listElems = carousel.querySelectorAll('li');

let position = 0; // posición del desplazamiento del carrete

carousel.querySelector('.prev').onclick = function () {
  // desplazamiento izquierdo
  position += width * count;
  // no podemos mover demasiado a la izquierda, se acaban las imágenes
  position = Math.min(position, 0)
  list.style.marginLeft = position + 'px';
};

carousel.querySelector('.next').onclick = function () {
  // desplazamiento derecho
  position -= width * count;
  // solo se puede desplazar el carrete de imágenes (longitud total de la cinta - conteo visibles)
  position = Math.max(position, -width * (listElems.length - count));
  list.style.marginLeft = position + 'px';
};