const formfield = document.getElementById('formfield');

function add(){
    let newfield = document.createElement('input');
    newfield.setAttribute('type', 'text');
    newfield.setAttribute('class', 'form-control');
    newfield.setAttribute('id', 'add');
    newfield.setAttribute('name', 'matieres');
    formfield.appendChild(newfield);
}