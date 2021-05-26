window.addEventListener('load', getAllPosts);

function getAllPosts(){
    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
      data = JSON.parse(this.responseText);
      console.log(data);
      showPosts(data);
    }
  
    ajax.open("GET", "backend/getAllPostsAdmin.php");
    ajax.send();
  }

  function showPosts(data){
    data.forEach(post => {
      let postHtml = `
      <strong><div class="card border-primary mb-3" style="max-width: 20rem;">${post.created_at}</strong>
        <div class="card-header">${post.id}: ${post.name}</div>
        <div class="card-body">
          <h4 class="card-title">${post.title}</h4>
          <p class="card-text">${post.text}</p>
          <img src="uploads/${post.file}" width="200px;"/>
          <br><br>
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
    function deletePost(id) {
      let ajax = new XMLHttpRequest();
      ajax.onload = function(){
        data = JSON.parse(this.responseText);
        console.log(data);
      }
      ajax.open("GET", "backend/deletePost.php?id=" + id);
      ajax.send();
    
    }
  }