// Get id form queryString
const postQueryString = window.location.search;
const postParams = new URLSearchParams(postQueryString);

if (postParams.has('id')){
    getPostData(postParams.get('id'));
}

document.forms['editPost'].addEventListener('submit', modifyPost);


// get postdata from database
function getPostData(id){
    console.log(id);
    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        data = JSON.parse(this.responseText);
        console.log(data);
        postForm(data);
    }
    ajax.open("GET", "backend/getPost.php?id=" + id);
    ajax.send();
    
}


function postForm(data){
    document.forms['editPost']['id'].value = data.id;
    document.forms['editPost']['name'].value = data.name;
    document.forms['editPost']['title'].value = data.title;
    document.forms['editPost']['text'].value = data.text;
}

function modifyPost(event){
    event.preventDefault();
    console.log('Save changes');

    // Collect postdata from form
    // let postData = {};
    // postData.id = document.forms['editPost']['id'].value;
    // postData.name = document.forms['editPost']['name'].value;
    // postData.title = document.forms['editPost']['title'].value;
    // postData.text = document.forms['editPost']['text'].value;
    // postData.file = document.forms['editPost']['file'].value;
 
    let formData = new FormData(document.forms["editPost"]);
    
    formData.append("file", document.forms["editPost"]["file"].files[0])

    console.log(formData);

    // Send data to backend
    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        data = JSON.parse(this.responseText);
        console.log(data);
        if (data.hasOwnProperty('success')){
            window.location.href = "admin.php?type=success&msg=Postedited"
        } else {
            showMessage('error', data.error);
        }
    }

    
    ajax.open("POST", "backend/editPost.php", true);
    ajax.send(formData);
}
