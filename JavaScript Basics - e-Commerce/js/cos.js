// const cos = document.getElementById("coselem");
// // let total = 0.0;
// let cant1 = 0;
// let cant2 = 0;
// let cant3 = 0;

// const bcercei = document.getElementById("bcercei");
// let bcerceiClick = 0;
// bcercei.addEventListener("click", function handleClick() {
//   if (bcerceiClick == 0) {
//     //creez doar elementul pus in cos si apoi il adaug;
//     const produs = document.createElement("div");
//     produs.className = "produselem";
//     produs.id = "produs1";
//     cant1++;

//     //construim imaginea
//     const produspic = document.createElement("img");
//     produspic.src = document.getElementById("pcercei").src;
//     produspic.className = "produspic";

//     //construim textul
//     const produstext = document.createElement("p");
//     produstext.appendChild(document.createTextNode("Cercei din aur 14k"));
//     produstext.className = "produstext";

//     //construim pretul
//     const produspret = document.createElement("p");
//     produspret.appendChild(document.createTextNode("50.0"));
//     produspret.className = "produspret";

//     //adaugam pretul la total
//     total = cant1 * 50.0 + cant2 * 100.0 + cant3 * 60.0;
//     document.getElementById("total").innerHTML = "Total:              " + total;
//     if (total > 100) {
//       document.getElementById("plaseaza").disabled = false;
//       document.getElementById("plaseaza").style.background = "lightgray";
//     }

//     const produscant = document.createElement("input");
//     produscant.type = "number";
//     produscant.id = "quantity1";
//     produscant.className = "quantity";
//     produscant.min = "1";
//     produscant.onchange = function () {
//       cant1 = document.getElementById("quantity1").value;
//       total = cant1 * 50.0 + cant2 * 100.0 + cant3 * 60.0;
//       document.getElementById("total").innerHTML = "Total: " + total;
//       if (total > 100) {
//         document.getElementById("plaseaza").disabled = false;
//         document.getElementById("plaseaza").style.background = "lightgray";
//       } else {
//         document.getElementById("plaseaza").disabled = true;
//         document.getElementById("plaseaza").style.background = "white";
//       }
//     };
//     produscant.defaultValue = "1";

//     const produsremove = document.createElement("button");
//     const removeicon = document.createElement("img");
//     produsremove.appendChild(removeicon);
//     produsremove.className = "remove";
//     removeicon.className = "gunoi";
//     removeicon.src = "https://cdn-icons-png.flaticon.com/512/1843/1843344.png";
//     produsremove.onclick = function () {
//       produs.remove();
//       cant1 = 0;
//       bcerceiClick = 0;
//       if (bcerceiClick == 0 && bbrataraClick == 0 && binelClick == 0) {
//         document.getElementById("total").innerHTML =
//           "Nu este niciun produs in cos";
//         document.getElementById("plaseaza").disabled = true;
//         document.getElementById("plaseaza").style.background = "white";
//       } else {
//         total = cant1 * 50.0 + cant2 * 100.0 + cant3 * 60.0;
//         document.getElementById("total").innerHTML = "Total: " + total;
//         if (total > 100) {
//           document.getElementById("plaseaza").disabled = false;
//           document.getElementById("plaseaza").style.background = "lightgray";
//         } else {
//           document.getElementById("plaseaza").disabled = true;
//           document.getElementById("plaseaza").style.background = "white";
//         }
//       }
//     };

//     //afisam produsul in cos
//     produs.appendChild(produspic);
//     produs.appendChild(produstext);
//     produs.appendChild(produscant);
//     produs.appendChild(produspret);
//     produs.appendChild(produsremove);
//     cos.appendChild(produs);
//     console.log("elementul a fost adaugat");
//     bcerceiClick = 1;
//   } else {
//     const cantitate = document.getElementById("quantity1");
//     cant1++;
//     total = cant1 * 50.0 + cant2 * 100.0 + cant3 * 60.0;
//     document.getElementById("total").innerHTML = "Total:              " + total;
//     if (total > 100) {
//       document.getElementById("plaseaza").disabled = false;
//       document.getElementById("plaseaza").style.background = "lightgray";
//     } else {
//       document.getElementById("plaseaza").disabled = true;
//       document.getElementById("plaseaza").style.background = "white";
//     }
//     cantitate.stepUp();
//   }
// });

// const binel = document.getElementById("binel");
// let binelClick = 0;
// binel.addEventListener("click", function handleClick() {
//   if (binelClick == 0) {
//     cant2++;
//     //creez doar elementul pus in cos si apoi il adaug;
//     const produs = document.createElement("div");
//     produs.className = "produselem";
//     const produspic = document.createElement("img");
//     produspic.src = document.getElementById("pinel").src;
//     produspic.className = "produspic";
//     const produstext = document.createElement("p");
//     produstext.appendChild(document.createTextNode("Inel din aur 14k"));
//     produstext.className = "produstext";

//     //construim pretul
//     const produspret = document.createElement("p");
//     produspret.appendChild(document.createTextNode("100.0"));
//     produspret.className = "produspret";

//     //adaugam pretul la total
//     total = cant1 * 50.0 + cant2 * 100.0 + cant3 * 60.0;
//     document.getElementById("total").innerHTML = "Total:              " + total;
//     if (total > 100) {
//       document.getElementById("plaseaza").disabled = false;
//       document.getElementById("plaseaza").style.background = "lightgray";
//     } else {
//       document.getElementById("plaseaza").disabled = true;
//       document.getElementById("plaseaza").style.background = "white";
//     }

//     const produsremove = document.createElement("button");
//     const removeicon = document.createElement("img");
//     produsremove.appendChild(removeicon);
//     produsremove.className = "remove";
//     removeicon.className = "gunoi";
//     removeicon.src = "https://cdn-icons-png.flaticon.com/512/1843/1843344.png";
//     produsremove.onclick = function () {
//       produs.remove();
//       cant2 = 0;
//       binelClick = 0;
//       if (bcerceiClick == 0 && bbrataraClick == 0 && binelClick == 0) {
//         document.getElementById("total").innerHTML =
//           "Nu este niciun produs in cos";
//         document.getElementById("plaseaza").disabled = true;
//         document.getElementById("plaseaza").style.background = "white";
//       } else {
//         total = cant1 * 50.0 + cant2 * 100.0 + cant3 * 60.0;
//         document.getElementById("total").innerHTML = "Total: " + total;
//         if (total > 100) {
//           document.getElementById("plaseaza").disabled = false;
//           document.getElementById("plaseaza").style.background = "lightgray";
//         } else {
//           document.getElementById("plaseaza").disabled = true;
//           document.getElementById("plaseaza").style.background = "white";
//         }
//       }
//     };

//     const produscant = document.createElement("input");
//     produscant.type = "number";
//     produscant.id = "quantity2";
//     produscant.className = "quantity";
//     produscant.min = "1";
//     produscant.onchange = function () {
//       cant2 = document.getElementById("quantity2").value;
//       total = cant1 * 50.0 + cant2 * 100.0 + cant3 * 60.0;
//       document.getElementById("total").innerHTML = "Total: " + total;
//       if (total > 100) {
//         document.getElementById("plaseaza").disabled = false;
//         document.getElementById("plaseaza").style.background = "lightgray";
//       } else {
//         document.getElementById("plaseaza").disabled = true;
//         document.getElementById("plaseaza").style.background = "white";
//       }
//     };
//     produscant.defaultValue = "1";

//     //afisam produsul in cos
//     produs.appendChild(produspic);
//     produs.appendChild(produstext);
//     produs.appendChild(produscant);
//     produs.appendChild(produspret);
//     produs.appendChild(produsremove);
//     cos.appendChild(produs);
//     console.log("elementul a fost adaugat");

//     binelClick = 1;
//   } else {
//     cant2++;
//     const cantitate = document.getElementById("quantity2");
//     total = cant1 * 50.0 + cant2 * 100.0 + cant3 * 60.0;
//     document.getElementById("total").innerHTML = "Total:              " + total;
//     if (total > 100) {
//       document.getElementById("plaseaza").disabled = false;
//       document.getElementById("plaseaza").style.background = "lightgray";
//     } else {
//       document.getElementById("plaseaza").disabled = true;
//       document.getElementById("plaseaza").style.background = "white";
//     }
//     cantitate.stepUp();
//   }
// });

// const bbratara = document.getElementById("bbratara");
// let bbrataraClick = 0;
// bbratara.addEventListener("click", function handleClick() {
//   if (bbrataraClick == 0) {
//     cant3++;
//     //creez doar elementul pus in cos si apoi il adaug;
//     const produs = document.createElement("div");
//     produs.className = "produselem";
//     const produspic = document.createElement("img");
//     produspic.src = document.getElementById("pbratara").src;
//     produspic.className = "produspic";
//     const produstext = document.createElement("p");
//     produstext.appendChild(document.createTextNode("Bratara din aur 14k"));
//     produstext.className = "produstext";

//     //construim pretul
//     const produspret = document.createElement("p");
//     produspret.appendChild(document.createTextNode("60.0"));
//     produspret.className = "produspret";

//     //adaugam pretul la total
//     total = cant1 * 50.0 + cant2 * 100.0 + cant3 * 60.0;
//     document.getElementById("total").innerHTML = "Total:              " + total;
//     if (total > 100) {
//       document.getElementById("plaseaza").disabled = false;
//       document.getElementById("plaseaza").style.background = "lightgray";
//     }

//     const produscant = document.createElement("input");
//     produscant.type = "number";
//     produscant.id = "quantity3";
//     produscant.className = "quantity";
//     produscant.min = "1";
//     produscant.onchange = function () {
//       cant3 = document.getElementById("quantity3").value;
//       total = cant1 * 50.0 + cant2 * 100.0 + cant3 * 60.0;
//       document.getElementById("total").innerHTML = "Total: " + total;
//       if (total > 100) {
//         document.getElementById("plaseaza").disabled = false;
//         document.getElementById("plaseaza").style.background = "lightgray";
//       } else {
//         document.getElementById("plaseaza").disabled = true;
//         document.getElementById("plaseaza").style.background = "white";
//       }
//     };
//     produscant.defaultValue = "1";

//     const produsremove = document.createElement("button");
//     const removeicon = document.createElement("img");
//     produsremove.appendChild(removeicon);
//     produsremove.className = "remove";
//     removeicon.className = "gunoi";
//     removeicon.src = "https://cdn-icons-png.flaticon.com/512/1843/1843344.png";
//     produsremove.onclick = function () {
//       produs.remove();
//       cant3 = 0;
//       bbrataraClick = 0;
//       if (bcerceiClick == 0 && bbrataraClick == 0 && binelClick == 0) {
//         document.getElementById("total").innerHTML =
//           "Nu este niciun produs in cos";
//         document.getElementById("plaseaza").disabled = true;
//         document.getElementById("plaseaza").style.background = "white";
//       } else {
//         total = cant1 * 50.0 + cant2 * 100.0 + cant3 * 60.0;
//         document.getElementById("total").innerHTML = "Total: " + total;
//         if (total > 100) {
//           document.getElementById("plaseaza").disabled = false;
//           document.getElementById("plaseaza").style.background = "lightgray";
//         } else {
//           document.getElementById("plaseaza").disabled = true;
//           document.getElementById("plaseaza").style.background = "white";
//         }
//       }
//     };

//     //afisam produsul in cos
//     produs.appendChild(produspic);
//     produs.appendChild(produstext);
//     produs.appendChild(produscant);
//     produs.appendChild(produspret);
//     produs.appendChild(produsremove);
//     cos.appendChild(produs);
//     console.log("elementul a fost adaugat");
//     bbrataraClick = 1;
//   } else {
//     cant3++;
//     const cantitate = document.getElementById("quantity3");
//     total = cant1 * 50.0 + cant2 * 100.0 + cant3 * 60.0;
//     document.getElementById("total").innerHTML = "Total:              " + total;
//     if (total > 100) {
//       document.getElementById("plaseaza").disabled = false;
//       document.getElementById("plaseaza").style.background = "lightgray";
//     } else {
//       document.getElementById("plaseaza").disabled = true;
//       document.getElementById("plaseaza").style.background = "white";
//     }
//     cantitate.stepUp();
//   }
// });

// let apas = 0;
// function afisCos() {
//   if (apas == 0) {
//     document.getElementById("cos").style.visibility = "visible";
//     apas = 1;
//   } else {
//     document.getElementById("cos").style.visibility = "hidden";
//     apas = 0;
//   }
// }

//vechiu cod
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//nou cod

let cant1 = 0;
let cant2 = 0;
let cant3 = 0;

$(document).ready(function () {
  //afisCos
  $("#cos").slideUp();
  $("#afiscos").click(function () {
    $("#cos").css("visibility", "visible");
    $("#cos").slideToggle();
  });

  //adaugare produs1
  $("#bcercei").click(function () {
    if (cant1 == 0) {
      //creare si adaugare div produs
      var produs = $(document.createElement("div"));
      produs.addClass("produselem");
      produs.attr("id", "produs1");
      $("#cos").prepend(produs);

      //creare si adaugare imagine
      var produspic = $(document.createElement("img"));
      produspic.addClass("produspic");
      produspic.attr("src", "./images/cercei_aur.jpg");
      produspic.appendTo("#produs1");

      //creare si adaugare denumrie
      var produstext = $(document.createElement("p"));
      produstext.addClass("produstext");
      produstext.text("Cercei din aur 14k");
      produstext.appendTo(produs);

      //creare si adaugare cantiate
      cant1 = 1;
      var produscant = $(document.createElement("input"));
      produscant.addClass("quantity");
      produscant.attr("id", "quantity1");
      produscant.attr("onchange", "quantity1()");
      produscant.attr("type", "number");
      produscant.attr("min", 1);
      produscant.val(1);
      produscant.appendTo(produs);

      //creare si adaugare pret
      var produspret = $(document.createElement("p"));
      produspret.addClass("produspret");
      produspret.text(cant1 * 50.0 + " lei");
      produspret.appendTo(produs);

      //creare si adaugare cos
      var gunoi = $(document.createElement("img"));
      gunoi.addClass("gunoi");
      gunoi.attr(
        "src",
        "https://cdn-icons-png.flaticon.com/512/1843/1843344.png"
      );
      var produsremove = $(document.createElement("button"));
      produsremove.addClass("remove");
      produsremove.attr("id", "remove1");
      produsremove.attr("onClick", "remove1()");
      gunoi.appendTo(produsremove);
      produsremove.appendTo(produs);

      //verificare si modificare total pentru prima aparitei
      $("#total").text("Total: " + total(cant1, cant2, cant3));
      if (total(cant1, cant2, cant3) > 100)
        $("#plaseaza").attr("disabled", false);
      else $("#plaseaza").attr("disabled", true);
      //
    } else {
      //verificare si modificare total pentru mai multe click-uri pe butonul de adauga produs
      $("#quantity1").val(Number($("#quantity1").val()) + 1);
      cant1 = $("#quantity1").val();
      $("#total").text("Total: " + total(cant1, cant2, cant3));
      if (total(cant1, cant2, cant3) > 100)
        $("#plaseaza").attr("disabled", false);
      else $("#plaseaza").attr("disabled", true);
    }
  });

  //generare obiect2
  $("#binel").click(function () {
    if (cant2 == 0) {
      var produs = $(document.createElement("div"));
      produs.addClass("produselem");
      produs.attr("id", "produs2");
      $("#cos").prepend(produs);

      var produspic = $(document.createElement("img"));
      produspic.addClass("produspic");
      produspic.attr("src", "./images/inel_aur.jpg");
      produspic.appendTo("#produs2");

      var produstext = $(document.createElement("p"));
      produstext.addClass("produstext");
      produstext.text("Inel din aur 14k");
      produstext.appendTo(produs);

      cant2 = 1;
      var produscant = $(document.createElement("input"));
      produscant.addClass("quantity");
      produscant.attr("id", "quantity2");
      produscant.attr("onchange", "quantity2()");
      produscant.attr("type", "number");
      produscant.attr("min", 1);
      produscant.val(1);
      produscant.appendTo(produs);

      var produspret = $(document.createElement("p"));
      produspret.addClass("produspret");
      produspret.text(cant2 * 100.0 + " lei");
      produspret.appendTo(produs);

      var gunoi = $(document.createElement("img"));
      gunoi.addClass("gunoi");
      gunoi.attr(
        "src",
        "https://cdn-icons-png.flaticon.com/512/1843/1843344.png"
      );
      var produsremove = $(document.createElement("button"));
      produsremove.addClass("remove");
      produsremove.attr("id", "remove2");
      produsremove.attr("onClick", "remove2()");
      gunoi.appendTo(produsremove);
      produsremove.appendTo(produs);

      $("#total").text("Total: " + total(cant1, cant2, cant3));
      if (total(cant1, cant2, cant3) > 100)
        $("#plaseaza").attr("disabled", false);
      else $("#plaseaza").attr("disabled", true);
    } else {
      $("#quantity2").val(Number($("#quantity2").val()) + 1);
      cant2 = $("#quantity2").val();
      $("#total").text("Total: " + total(cant1, cant2, cant3));
      if (total(cant1, cant2, cant3) > 100)
        $("#plaseaza").attr("disabled", false);
      else $("#plaseaza").attr("disabled", true);
    }
  });

  //generare obiect3
  $("#bbratara").click(function () {
    if (cant3 == 0) {
      var produs = $(document.createElement("div"));
      produs.addClass("produselem");
      produs.attr("id", "produs3");
      $("#cos").prepend(produs);

      var produspic = $(document.createElement("img"));
      produspic.addClass("produspic");
      produspic.attr("src", "./images/bratara_aur.jpg");
      produspic.appendTo("#produs3");

      var produstext = $(document.createElement("p"));
      produstext.addClass("produstext");
      produstext.text("Bratara din aur 14k");
      produstext.appendTo(produs);

      cant3 = 1;
      var produscant = $(document.createElement("input"));
      produscant.addClass("quantity");
      produscant.attr("id", "quantity3");
      produscant.attr("onchange", "quantity3()");
      produscant.attr("type", "number");
      produscant.attr("min", 1);
      produscant.val(1);
      produscant.appendTo(produs);

      var produspret = $(document.createElement("p"));
      produspret.addClass("produspret");
      produspret.text(cant3 * 60.0 + " lei");
      produspret.appendTo(produs);

      var gunoi = $(document.createElement("img"));
      gunoi.addClass("gunoi");
      gunoi.attr(
        "src",
        "https://cdn-icons-png.flaticon.com/512/1843/1843344.png"
      );
      var produsremove = $(document.createElement("button"));
      produsremove.addClass("remove");
      produsremove.attr("id", "remove3");
      produsremove.attr("onClick", "remove3()");
      gunoi.appendTo(produsremove);
      produsremove.appendTo(produs);

      $("#total").text("Total: " + total(cant1, cant2, cant3));
      if (total(cant1, cant2, cant3) > 100)
        $("#plaseaza").attr("disabled", false);
      else $("#plaseaza").attr("disabled", true);
    } else {
      $("#quantity3").val(Number($("#quantity3").val()) + 1);
      cant3 = $("#quantity3").val();
      $("#total").text("Total: " + total(cant1, cant2, cant3));
      if (total(cant1, cant2, cant3) > 100)
        $("#plaseaza").attr("disabled", false);
      else $("#plaseaza").attr("disabled", true);
    }
  });
});

//functie de return a totalului
function total(cant1, cant2, cant3) {
  return cant1 * 50.0 + cant2 * 100.0 + cant3 * 60.0;
}

//functie de plaseaza comanda
function plaseazaComanda() {
  location.reload();
  alert("Comanda a fost plasata!");
}

//functia de remove pentru fiecare produs
function remove1() {
  $("#produs1").remove();
  cant1 = 0;
  if (cant1 == 0 && cant2 == 0 && cant3 == 0) {
    $("#total").text("Nu este niciun produs in cos");
  } else $("#total").text("Total: " + total(cant1, cant2, cant3));
  if (total(cant1, cant2, cant3) > 100) $("#plaseaza").attr("disabled", false);
  else $("#plaseaza").attr("disabled", true);
}

function remove2() {
  $("#produs2").remove();
  cant2 = 0;
  if (cant1 == 0 && cant2 == 0 && cant3 == 0) {
    $("#total").text("Nu este niciun produs in cos");
  } else $("#total").text("Total: " + total(cant1, cant2, cant3));
  if (total(cant1, cant2, cant3) > 100) $("#plaseaza").attr("disabled", false);
  else $("#plaseaza").attr("disabled", true);
}

function remove3() {
  $("#produs3").remove();
  cant3 = 0;
  if (cant1 == 0 && cant2 == 0 && cant3 == 0) {
    $("#total").text("Nu este niciun produs in cos");
  } else $("#total").text("Total: " + total(cant1, cant2, cant3));
  if (total(cant1, cant2, cant3) > 100) $("#plaseaza").attr("disabled", false);
  else $("#plaseaza").attr("disabled", true);
}

//functii de verificare a cantitatii si totalului
function quantity1() {
  cant1 = $("#quantity1").val();
  $("#total").text("Total: " + total(cant1, cant2, cant3));
  if (total(cant1, cant2, cant3) > 100) $("#plaseaza").attr("disabled", false);
  else $("#plaseaza").attr("disabled", true);
}

function quantity2() {
  cant2 = $("#quantity2").val();
  $("#total").text("Total: " + total(cant1, cant2, cant3));
  if (total(cant1, cant2, cant3) > 100) $("#plaseaza").attr("disabled", false);
  else $("#plaseaza").attr("disabled", true);
}

function quantity3() {
  cant3 = $("#quantity3").val();
  $("#total").text("Total: " + total(cant1, cant2, cant3));
  if (total(cant1, cant2, cant3) > 100) $("#plaseaza").attr("disabled", false);
  else $("#plaseaza").attr("disabled", true);
}

document.addEventListener("click",function (e){
e.target.
})