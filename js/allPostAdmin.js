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
      </div>`;
      document.getElementById("posts-container").innerHTML += postHtml
    });
  }

  
  