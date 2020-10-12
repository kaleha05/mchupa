function validateRequiredFields(this_form)
{
    var name=this_form.bname.value;
    var pword=this_pwd.value;
    var pword1=this_pwd1.value;
    if(name==null || name=="")
    {
        alert("Please enter your first name");
        this_form.bname.focus();
        return false;
    }
    if(pword==null || pword=="")
    {
        alert("Please enter your password");
        this_form.pwd.focus();
        return false;
    }
    if(pword1==null || pword1=="")
    {
        alert("Please enter your password again");
        this_form.pwd1.focus();
        return false;
    }
    if(pword1!=pword)
    {
        alert("Passwords do not match");
        this_form.pwd1.focus();
        return false;
    }
    return true;
}