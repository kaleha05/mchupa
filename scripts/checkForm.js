function checkForm(form) { 
    pwd = form.pwd.value; 
    pwd1 = form.pwd1.value;
    email = form.email.value; 

    var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
    var chars=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

   if(chars.test(email) = false)
   {
       alert("Please enter a valid email");
   }
   
    if (pwd != pwd1) { 
        alert ("Your passwords do not match"); 
        return false; 
    } 
    else{ 
        if(re.test(pwd) = false){
            alert ("Password does not match the required format");
            return false;
        }
        else{
            return true;
        }
    } 
} 