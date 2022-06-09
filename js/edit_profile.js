function edit (){
    document.getElementById('biograph').style.display = 'none';
    document.getElementById('profile').classList.remove('active');
    document.getElementById('ed_prof').classList.add('active');
    document.getElementById('edit_prof').style.display = 'block';
    document.getElementById('zakaz').style.display = 'none';
}

function profile(){
    document.getElementById('biograph').style.display = 'block';
    document.getElementById('profile').classList.add('active');
    document.getElementById('ed_prof').classList.remove('active');
    document.getElementById('edit_prof').style.display = 'none';
    document.getElementById('zakaz').style.display = 'block';
}

function profile_admin(){
    document.getElementById('biograph').style.display = 'block';
    document.getElementById('users').style.display = 'none';
    document.getElementById('order').style.display = 'block';
    document.getElementById('profile').classList.add('active');
    document.getElementById('ed_prof').classList.remove('active');
    document.getElementById('menu_add').classList.remove('active');
    document.getElementById('form_menu').style.display = ('none');
}

function users(){
    document.getElementById('biograph').style.display = 'none';
    document.getElementById('profile').classList.remove('active');
    document.getElementById('ed_prof').classList.add('active');
    document.getElementById('menu_add').classList.remove('active');
    document.getElementById('order').style.display = 'none';
    document.getElementById('users').style.display = 'block';
    document.getElementById('form_menu').style.display = ('none');
}

function menu_add() {
    document.getElementById('biograph').style.display = 'none';
    document.getElementById('users').style.display = 'none';
    document.getElementById('order').style.display = 'none';
    document.getElementById('profile').classList.remove('active');
    document.getElementById('ed_prof').classList.remove('active');
    document.getElementById('menu_add').classList.add('active');
    document.getElementById('form_menu').style.display = ('block');
}