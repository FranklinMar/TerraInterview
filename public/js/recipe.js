document.querySelectorAll("textarea").forEach(element => {
  element.oninput = function() {
    this.style.height = "";
    this.style.height = this.scrollHeight + 5 + "px"
  }
  element.oninput();
});

let img_inp = document.querySelector('input[type="file"]');
let img = document.querySelector('#img');
img_inp.onchange = function() {
  const [file] = img_inp.files
  if (file) {
    img.src = URL.createObjectURL(file)
  }
}

function loadURLToInputFiled(url, fileName){
  getImgURL(url, (imgBlob)=>{
    // Load img blob to input
    // WIP: UTF8 character error
    let file = new File([imgBlob], fileName,{type:"image/jpeg", lastModified:new Date().getTime()}, 'utf-8');
    let container = new DataTransfer();
    container.items.add(file);
    document.querySelector('input[type="file"]').files = container.files;

  })
}
// xmlHTTP return blob respond
function getImgURL(url, callback){
  var xhr = new XMLHttpRequest();
  xhr.onload = function() {
      callback(xhr.response);
  };
  xhr.open('GET', url);
  xhr.responseType = 'blob';
  xhr.send();
}

var i = 0;
var ingredients = [];
let ingredients_node = document.querySelector('#ingredients');
let add = document.querySelector('#add');

function RemoveIngredient() {
    this.parentElement.remove();
}

add.onclick = function() {
    ++i;
    let group = document.createElement('div');
    group.setAttribute('class', 'input-group mb-2');
    let input_number = document.createElement('input');
    input_number.type = 'number';
    input_number.name = `quantity[${i}]`;
    input_number.setAttribute('class', 'col-12 col-md-4 bg-dark text-white form-control form-control-sm');
    input_number.min = 0;
    input_number.value = 0;
    input_number.required = true;
    let select = document.createElement('select');
    select.name = `quantity_ingredient_id[${i}]`;
    select.setAttribute('class', "col-12 col-md-4 form-select");
    select.required = true;
    let option;
    for (let j = 0; j < ingredients.length; j++) {
        option = document.createElement('option');
        option.value = ingredients[j]['id'];
        option.innerText = `${ingredients[j]['name']} ${ingredients[j]['measure'] !== '' ? `(${ingredients[j]['measure']})` : ''})`;
        select.appendChild(option);
    }
    let button = document.createElement('a');
    button.setAttribute('class', 'btn btn-danger remove col-12 col-md-4');
    button.innerText = "Remove";
    button.onclick = RemoveIngredient;
    group.appendChild(input_number);
    group.appendChild(select);
    group.appendChild(button);
    ingredients_node.appendChild(group);
}
ingredients_node.querySelectorAll('a.remove').forEach(button => button.onclick = RemoveIngredient);
