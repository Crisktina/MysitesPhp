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
  productes.forEach((product) => {
    theTable +=
      "<tr><td>" +
      product.name +
      "</td><td>" +
      product.category +
      "</td><td>" +
      product.price +
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
document.addEventListener("DOMContentLoaded", function () {
  let productes = getProducts();
  escriureTaula(productes);
  //url
  document.getElementById("URL").innerHTML = "URL: " + document.URL;

  // Cuantos Links Hay
  let linkTag = document.getElementsByTagName("a");
  console.log(linkTag);
  document.getElementById("LinksNum").innerHTML =
    "Total de links en la página: " + linkTag.length;

  for (let i = 0; i < linkTag.length; i++) {
    let div = document.getElementById("Links");
    div.innerHTML +=
      "<p>" +
      i +
      linkTag[i].getAttribute("href") +
      " => " +
      linkTag[i].outerText +
      "</p>";
  }

  // Cuantos formularios hay
});

//Editar productos

//Eliminar productos

// Añadir productos
