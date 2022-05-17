function edit (){
    document.getElementById('biograph').style.display = 'none';
    document.getElementById('profile').classList.remove('active');
    document.getElementById('ed_prof').classList.add('active');
    document.getElementById('edit_prof').style.display = 'block';
}

function profile(){
    document.getElementById('biograph').style.display = 'block';
    document.getElementById('profile').classList.add('active');
    document.getElementById('ed_prof').classList.remove('active');
    document.getElementById('edit_prof').style.display = 'none';
}