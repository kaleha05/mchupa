function checkPassword(str)
{
  var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
  return re.test(str);
}

function checkForm(form)
{
  if(form.fname.value == "" || form.lname.value == "") {
    alert("Error: Name cannot be blank!");
    form.cname.focus();
    return false;
  }

  if(form.telephone.value < 700000000 || form.telephone.value >799999999) {
    alert("Error: Invalid telephone");
    form.telephone.focus();
    return false;
  }
  
  if(form.pwd.value != "" && form.pwd.value == form.pwd1.value) {
    if(!checkPassword(form.pwd.value)) {
      alert("The password you have entered is not strong enough!");
      form.pwd.focus();
      return false;
    }
  } else {
    alert("Your passwords do not match");
    form.pwd.focus();
    return false;
  }
  return true;
}