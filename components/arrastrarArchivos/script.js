const areaArrastre = document.querySelector("#areaArrastre");
const h2Arrastre = areaArrastre.querySelector("#tituloArrastrar");
const button = areaArrastre.querySelector("#buttonArrastrar");
const input = areaArrastre.querySelector("#inputImagen");
const filename = areaArrastre.querySelector("#viewCarpeta");
let files;
// Agrego eventos

// Al hacer click, activamos el input que habiamos hecho invisible
button.addEventListener("click", (e) => {
  input.click();
});
// Cuando seleccionamos desde carpeta
input.addEventListener("change", (e) => {
  files = e.target.files;
  // Cada vez que cambie de archivo cambiara el color, que especifique en el css (line 25). ClassList permite acceder al css.
  areaArrastre.classList.add("active");
  removeFiles();
  showFiles(files);
  
  areaArrastre.classList.remove("active");
});

function removeFiles(){
  document.querySelector("#viewArrastre").innerHTML = "";
}

// Con esta funcion averiguo si solo subo una imagen o varias
function showFiles(files) {
  if (files.length === undefined) {
    processFile(files);
  } else {
    for (const file of files) {
      processFile(file);
    }
  }
  // document.getElementById("buttonArrastrar").classList.add("disabled");
}
function processFile(file) {
  const docType = file.type;
  // Validamos las extensiones permitidas
  const validExtensions = ["image/jpeg", "image/jpg", "image/png", "image/gif"];

  if(file.size <= 2000000){
    if (validExtensions.includes(docType)) {
      console.log("Added file");
      // Archivo valido, con este objeto extraeremos las propiedades del archivo
      // como su nombre, extension, imagen, etc.
      const fileReader = new FileReader();
      // A continuacion generamos un id aleatorio para caa img que se suba, este id tendra un
      // rango maximo de 7 caracteres. Así tengo un id unico para cada archivo que intento subir, ira bien de cara a la BDD.
      const id = `file-${Math.random().toString(32).substring(7)}`;
      fileReader.addEventListener("load", (e) => {
        const fileUrl = fileReader.result;
        // const image = `
        //           <div id="${id}" class="file-container">
        //               <img src="${fileUrl}" alt="${file.name}" width="50px">
        //               <div class="status">
        //                   <span>${file.name}</span>
        //               </div>
        //           </div>
        //       `;
        const image = `
                  <div id="${id}" class="file-container">
                      <img src="${fileUrl}" alt="${file.name}" width="50px">
                  </div>
              `;
        const html = document.querySelector("#viewArrastre").innerHTML;
        document.querySelector("#viewArrastre").innerHTML = image + html;
      });
      // EL siguiente metodo me permite crear una vista previa de la imagen.
      fileReader.readAsDataURL(file);
    } else {
      alert("Formato de archivo no valido");
    }
  }
  else{
    alert("La imagen no puede ser mayor de 2 MB");
  }
  
}

// arrastrar y soltar
// Elementos que arrastramos se activa este
// areaArrastre.addEventListener("dragover", (e) => {
//   // Evita que abra la imagen, desactiva el modo predeterminado, es decir que cuando arrastre la imagen, si suelto la
//   // imagen no me abrira esta misma en otra ventana diferente.
//   e.preventDefault();
//   areaArrastre.classList.add("active");
//   h2Arrastre.textContent = "SUELTA PARA SUBIR IMAGENES";
// });
// Elementos arrastras que no esta dentro del elemento
// areaArrastre.addEventListener("dragleave", (e) => {
//   e.preventDefault();
//   areaArrastre.classList.remove("active");
//   h2Arrastre.textContent = "Selecciona tus archivos";
// });
// Al soltar el archivo dentro del elemento (zona)
// areaArrastre.addEventListener("drop", (e) => {
//   e.preventDefault();
//   // Obtiene referencia de las imagenes
//   files = e.dataTransfer.files;
//   showFiles(files);
//   areaArrastre.classList.remove("active");
//   h2Arrastre.textContent = "Selecciona tus archivos";
//   }
// });