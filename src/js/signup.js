const signup = document.querySelector(".signup"),
continueBtn = signup.querySelector(".signup-submit"),
error = signup.querySelector('.error');

signup.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/src/php/signup.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                location.href = "/portal/";
              }
              else{
                error.style.display = "block";
                error.textContent = data;
              }
          }
      }
    }
    let signupdata = new FormData(signup);
    xhr.send(signupdata);
}