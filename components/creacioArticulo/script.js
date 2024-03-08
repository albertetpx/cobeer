window.onload = function () {
  window.addEventListener("scroll", reveal);
  tinymce.init({
    selector: 'textarea#mytextarea',
    width: '100%',
    plugins: ["lists"],
    menubar: '',
    toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist',
    elementpath: false,
    init_instance_callback: function (editor) {
      editor.on('input', validateForm);
    }
  });

  let button = document.getElementById('submit');
  // button.setAttribute("disabled",true);
  button.disabled = true;
  button.classList.add("disabled");

  document.querySelector('input.name').addEventListener('input', checkValue);
  document.querySelector('input.autor').addEventListener('input', checkValue);
  document.querySelector('select.departamento').addEventListener('input', checkValue);
  document.querySelector('#mytextarea').addEventListener('input', checkValue); //TOFIX
  document.querySelector('textarea.resumen').addEventListener('input', checkValue);
  document.querySelector('input.tag').addEventListener('input', checkValue);
  document.querySelector('#inputImagen').addEventListener('input', checkSize);
}

function checkValue(e) {
  e.preventDefault();
  if (e.target.value == '') {
    e.target.setAttribute('placeholder', 'Aquest camp no pot romandre buit');
    e.target.classList.add('invalid-input');
  }
  else {
    e.target.setAttribute('placeholder', '');
    e.target.classList.remove('invalid-input');
  }
  validateForm();
}

function checkSize(e) {
  e.preventDefault();
  files = document.getElementById('inputImagen').files.length;
  if(files != 0){
    if(document.getElementById('inputImagen').files[0].size > 2000000){  //TOFIX 
      alert("File size must be less than 2 MB");
      document.getElementById('inputImagen').value="";
    }
  }    
  validateForm();
}

function reveal() {
  // console.log("reveal");
  var reveals = document.querySelectorAll(".reveal");
  for (var i = 0; i < reveals.length; i++) {
    var windowheight = window.innerHeight;
    var revealTop = reveals[i].getBoundingClientRect().top;
    var revealpoint = 150;

    if (revealTop < windowheight - revealpoint) {
      reveals[i].classList.add("active");
    } else {
      reveals[i].classList.remove("active");
    }
  }
}

function validateForm() {
  // Valido campos requeridos
  if (document.querySelector('input.name').value == "") {
    document.getElementById('submit').classList.add('disabled');
    console.log("Títol requerit");
    return;
  }
  else if (document.querySelector('input.autor').value == "") {
    document.getElementById('submit').classList.add('disabled');
    console.log("Autor requerit");
    return;
  }
  else if (document.querySelector('select.departamento').value == "") {
    document.getElementById('submit').classList.add('disabled');
    console.log("Departament requerit");
    return;
  }
  else if (tinymce.get("mytextarea").getContent() == "") {
    document.getElementById('submit').classList.add('disabled');
    console.log("Cos requerit");
    return;
  }
  else if (document.querySelector('textarea.resumen').value == "") {
    document.getElementById('submit').classList.add('disabled');
    console.log("Resum requerit");
    return;
  }
  else if (document.querySelector('input.tag').value == "") {
    document.getElementById('submit').classList.add('disabled');
    console.log("Tags requerits");
    return;
  }
  // else if (document.getElementById('inputImagen').files.length != 0){
  //   if(document.getElementById('inputImagen').files[0].size > 2000000){
  //     document.getElementById('submit').classList.add('disabled');
  //     alert("File size must be less than 2 MB");
  //     return;
  //   }
  // }
  else {
    document.getElementById('submit').classList.remove('disabled');
    document.getElementById('submit').disabled = false;
    return;
  }
}