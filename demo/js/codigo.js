function getProducts() {
  let products = [
    {
      name: "peres",
      category: "fruites",
      price: 1.5,
    },
    {
      name: "Xai",
      category: "carns",
      price: 1.56,
    },
    {
      name: "pomes",
      category: "fruites",
      price: 1.5,
    },
    {
      name: "Pollastre",
      category: "carns",
      price: 1.68,
    },
    {
      name: "Tonyina",
      category: "peixos",
      price: 5.68,
    },

    {
      name: "Conill",
      category: "carns",
      price: 1.68,
    },
    {
      name: "Llobarro",
      category: "peixos",
      price: 5.68,
    },
    {
      name: "kiwi",
      category: "fruites",
      price: 1.25,
    },
    {
      name: "Porc",
      category: "carns",
      price: 3.68,
    },
  ];
  return products;
}
let productes = getProducts();

function ordenaPerNom() {
  /* productes.forEach((product) => {
      product.name.toUpperCase();
      console.log(product.name.toUpperCase());
    }); */

  productes.sort((p1, p2) => {
    if (p1.name.toUpperCase() < p2.name.toUpperCase()) return -1;
    if (p1.name.toUpperCase() > p2.name.toUpperCase()) return 1;
    return 0;
  });
  escriureTaula(productes);
}

function ordenaPerCategoria() {
  productes.sort((p1, p2) => {
    if (p1.category.toUpperCase() < p2.category.toUpperCase()) return -1;
    if (p1.category.toUpperCase() > p2.category.toUpperCase()) return 1;
    return 0;
  });
  escriureTaula(productes);
}

function ordenaPerPreu() {
  productes.sort((p1, p2) => {
    if (p1.price < p2.price) return -1;
    if (p1.price > p2.price) return 1;
    return 0;
  });
  escriureTaula(productes);
}

function filtraPer(elFiltre) {
  let result;
  if (elFiltre === "") {
    result = productes.filter((word) => word.category === word.category);
  } else {
    result = productes.filter((word) => word.category === elFiltre);
  }
  escriureTaula(result);
}

function escriureTaula(productes) {
  //console.log(products);
  let theTable = "";
  let product = null;
  productes.forEach((product, i) => {
    theTable +=
      "<tr><td>" +
      product.name +
      "</td><td>" +
      product.category +
      "</td><td>" +
      product.price +
      "</td><td>" +
      '<a onclick="deleteProducts(' +
      i +
      ')" href="#">(X)</a>' +
      "</td><td>" +
      "Editar" +
      "</td></tr>";
  });

  document.getElementById("tauladeProductes").innerHTML = theTable;
}
/*
              function escriureTaula(products) {
                  console.log(products);
                  let theTable = "";
                  let product = null;
                  for (let i in products) {
                      product = products[i];
                      theTable+="<tr><td>"+product.name+"</td><td>"+product.category+"</td><td>"+product.price+"</td></tr>";
                  }
                  document.getElementById("tauladeProductes").innerHTML=theTable;
              }
  */

//recargar pagina
document.addEventListener("DOMContentLoaded", function () {
  let productes = getProducts();
  escriureTaula(productes);
  //url
  document.getElementById("URL").innerHTML = "URL: " + document.URL;

  // Cuantos Links Hay
  let linkTag = document.getElementsByTagName("a");
  //console.log(linkTag);
  document.getElementById("LinksNum").innerHTML =
    "Total de links en la página: " + linkTag.length;

  for (let i = 0; i < linkTag.length; i++) {
    let div = document.getElementById("Links");
    div.innerHTML +=
      "<p>" +
      (i + 1) +
      ". " +
      linkTag[i].getAttribute("href") +
      " => " +
      linkTag[i].outerText +
      "</p>";
  }

  // Cuantos formularios hay
  let formTag = document.getElementsByTagName("input");
  //console.log(formTag);
  document.getElementById("formNum").innerHTML =
    "Total de inputs en la página: " + formTag.length;

  // Cuantas imagenes hay
  let imgTag = document.getElementsByTagName("img");
  //console.log(imgTag);
  document.getElementById("imgNum").innerHTML =
    "Total de imágenes en la página: " + imgTag.length;

  // const formNewProduct = document.getElementById("altaProducte");
  // formNewProduct.addEventListener("submit", (event) => {
  //   event.preventDefault(); // Evita que el formulario se envíe automáticamente
  //   console.log(event);

  //   const nom = document.getElementById("nom").value;
  //   console.log(`Id: ${nom}`);
  // });
});

// Hacer el fetch de llistatProductes
function getNewProducts() {
  fetch("./php/llistatProductes-data.php")
    .then((res) => res.json())
    .then((data) => {
      console.log(data);
      escriureTaula(data);
    })
    .catch((err) =>
      console.error("Error al devolver la lista de produtos", err)
    );
}
//almacenar data al iniciar página
let newArray = JSON.stringify(productes);
localStorage.setItem("testJSON", newArray);

//introducir productos en localstorage
function insertDataLocalstorage(array) {
  //almacenar data
  let newArray = JSON.stringify(array);
  localStorage.setItem("testJSON", newArray);
}

//obtener datos en localstorage
function getDataLocalstorage() {
  let text = localStorage.getItem("testJSON");
  let obj = JSON.parse(text);
  return obj;
}

//Eliminar productos

function deleteProducts(numIndex) {
  let array = getDataLocalstorage();
  array.splice(numIndex, 1);
  insertDataLocalstorage(array);
  escriureTaula(getDataLocalstorage());
}

// Añadir productos

function addProduct(form) {
  console.log(form);
}

//Editar productos

//Añadir subcategorias al form
const carn = [
  { subcategoria: "1carn" },
  { subcategoria: "2carn" },
  { subcategoria: "3carn" },
];

const peix = [
  { subcategoria: "1peix" },
  { subcategoria: "2peix" },
  { subcategoria: "3peix" },
];

const fruita = [
  { subcategoria: "1fruita" },
  { subcategoria: "2fruita" },
  { subcategoria: "3fruita" },
];

function cambioCategoria(valor) {
  let categoria = valor.value;
  crearOption(categoria);
}

function crearOption(categoria) {
  subcategory.innerHTML = "";

  if (categoria == "carn") {
    carn.forEach((element) => {
      let selectChild = document.createElement("option");
      subcategory.appendChild(selectChild).textContent = element.subcategoria;
    });
  } else if (categoria == "peix") {
    peix.forEach((element) => {
      let selectChild = document.createElement("option");
      subcategory.appendChild(selectChild).textContent = element.subcategoria;
    });
  } else if (categoria == "fruita") {
    fruita.forEach((element) => {
      let selectChild = document.createElement("option");
      subcategory.appendChild(selectChild).textContent = element.subcategoria;
    });
  }
}
