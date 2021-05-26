window.addEventListener('load', getUserPosts);
document.getElementById('posts-container').addEventListener('click', postAction);


/* 
Toggle new post -form 
*/
function postInfo() {
  var x = document.getElementById("post");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function getUserPosts(){
  let ajax = new XMLHttpRequest();
  ajax.onload = function(){
    data = JSON.parse(this.responseText);
    console.log(data);
    showPosts(data);
  }
  ajax.open("GET", "backend/getUserPosts.php");
  ajax.send();
}


function showPosts(data){
  data.forEach(post => {
    let postHtml = `
    <div data-postid=${post.id} class="card border-primary mb-3" style="max-width: 20rem;">
    <div class="card-header">${post.id}: ${post.name}</div>
    <div class="card-body">
      <h4 class="card-title">${post.title}</h4>
      <p class="card-text">${post.text}</p>
      <img src="uploads/${post.file}" width="200px;"/>
        <br><br>
        <button type="button" class="btn btn-primary edit">Edit</button>
        <button type="button" class="btn btn-danger delete">Delete</button>
    </div>`;
    document.getElementById("posts-container").innerHTML += postHtml
  });
}

function postAction(event){
  console.log(event.target);
  const postId = event.target.parentElement.parentElement.dataset.postid;
  
  // Delete
  if (event.target.classList.contains('delete')){
    alert("You deleted post succesful!");  
    deletePost(postId);
    location.reload();
  }

  // Edit
  if (event.target.classList.contains('edit')) {
    alert('Edit ' + postId);
    window.location.href = "edit.php?id=" + postId;
  }
}


function deletePost(id) {
  let ajax = new XMLHttpRequest();
  ajax.onload = function(){
    data = JSON.parse(this.responseText);
    console.log(data);
  }
  ajax.open("GET", "backend/deletePost.php?id=" + id);
  ajax.send();

}

function editPost(id) {
  let ajax = new XMLHttpRequest();
  ajax.onload = function(){
    data = JSON.parse(this.responseText);
    console.log(data);
  }
  ajax.open("GET", "backend/editPost.php?id=" + id);
  ajax.send();

}
