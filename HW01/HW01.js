var car_button = document.getElementById("icon");
car_button.addEventListener("click", showWindow);
var submit = document.getElementById("submit");
submit.addEventListener("click", cheackForm);
// set raido value
var methodGeneral = document.getElementById("methodGeneral");
methodGeneral.addEventListener("click", General);
var methodDawn = document.getElementById("methodDawn");
methodDawn.addEventListener("click", Dawn);
var method = "";
function General() {
    method = "General";
}
function Dawn() {
    method = "Dawn"
}

function showWindow() {
    document.getElementById("inputWindow").style.display="block";
}

function cheackForm() {
    //  call form values
    var productImage = document.getElementById("productImage").value;
    var productName = document.getElementById("productName").value;
    var productPrice = document.getElementById("productPrice").value;
    var productNumber = document.getElementById("productNumber").value;
    //  확장자 뒤에서 부터
    var productImageExtension = productImage.slice(productImage.lastIndexOf(".") + 1);
    var letters = /^[A-Za-z]+$/;
    var cheack = 0;

    if (productImage == ""){
      alert("상품 이미지를 추가하시오");
      cheack++;
    } else if(productImageExtension != "jpg" && productImageExtension != "png" 
    && productImageExtensione != "gif" && productImageExtension != "bmp") {
      alert("이미지 화일이 아닙니다.'jpg',jpeg'또는 'png'을 확장자로 가진 화일을 추가하시오");
      cheack++;
    }
    if (productName == "") {
    alert("상품 이름을 입력하시오");
    cheack++;
    } else if(!productName.match(letters)) {
    alert("문자로된 상품 이름을 입력하시오");
    cheack++;
    }

    if(productPrice == "") {
    alert("상품 가격을 입력하시오");
    cheack++;
    } else if(isNaN(productPrice)) {
    alert("상품 가격에 숫자를 입력하시오");
    cheack++;
    } else if(productPrice < 1000) {
    alert("상품 가격을 1000원 이상으로 입력하시오");
    cheack++;
    }

    if(productNumber == "") {
    alert("상품 개수를 입력하시오");
    cheack++;
    } else if(isNaN(productNumber)) {
    alert("상품 개수에 숫자를 입력하시오");
    cheack++;
    } else if(productNumber > 50) {
    alert("상품 갯수 최대 50개 이하로 선택하시오");
    cheack++;
    }
    if(method == "") {
    alert("배송방법을 선택하세요");
    cheack++;
    }
    //  form has no error
    if (cheack == 0) inputCart();
}
//  make new table 
function inputCart() {
       //  call form values
    var productImage = document.getElementById("productImage").value;
    var imagePath = "images/" + productImage.slice(productImage.indexOf("h") + 2);
    var productName = document.getElementById("productName").value;
    var productPrice = document.getElementById("productPrice").value;
    var productNumber = document.getElementById("productNumber").value;
    var generalcart = document.getElementById("generalcart");
    var dawncart = document.getElementById("dawncart");



    var line = document.createElement("tr");
    // insert checkbox
    var select = document.createElement("td");
    var selectBox = document.createElement("input");
    selectBox.setAttribute("type","checkbox");
    selectBox.setAttribute("name","");
    //  insert image
    var image = document.createElement("td");
    var imagetag = document.createElement("img");
    imagetag.setAttribute("src", imagePath);
    imagetag.setAttribute("width", "80px");
    imagetag.setAttribute("height", "80px");
    imagetag.setAttribute("class", "nameforsize");
    //  insert name
    var name = document.createElement("td");
    var nametxt = document.createTextNode(productName);
    //  insert price
    
    var price = document.createElement("td");
    var pricetxt = document.createTextNode(productPrice);
    //  instert number of product
    var number = document.createElement("td");
    var numbertxt = document.createTextNode(productNumber);
    // carculate   
    var pay = document.createElement("td");
    var carculate = productPrice * productNumber;
    var paytxt = document.createTextNode(carculate);
   
    
    //  link Dom node
    select.appendChild(selectBox);
    image.appendChild(imagetag);
    name.appendChild(nametxt);
    price.appendChild(pricetxt);
    number.appendChild(numbertxt);
    pay.appendChild(paytxt);

    line.appendChild(select);
    line.appendChild(image);
    line.appendChild(name);
    line.appendChild(price);
    line.appendChild(number);
    line.appendChild(pay);
    
  
  
  if(method == "General") {
    var generalF = document.getElementById("generalF");
    generalcart.insertBefore(line,generalF);
  } else if (method == "Dawn") {
    var dawnF = document.getElementById("dawnF");
    dawncart.insertBefore(line,dawnF);
  }
}

function moveToDawn(node) {
  var clone = node.cloneNode(true);
  var dawnF = document.getElementById("dawnF");
  var dawncart = document.getElementById("dawncart");
  dawncart.insertBefore(clone,dawnF);
  node.remove();
}
function moveToGeneral(node) {
  var clone = node.cloneNode(true);
  var generalF = document.getElementById("generalF");
  var generalcart = document.getElementById("generalcart");
  generalcart.insertBefore(clone,generalF);
  node.remove();
}