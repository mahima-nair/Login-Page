function validateForm(){
    let name=document.getElementById("name").value;
    let email=document.getElementById("email").value;
    let phone=document.getElementById("phone").value;
    let pass=document.getElementById("password").value;
    let cpass=document.getElementById("cpassword").value;
    let nameRegex=/^[a-zA-Z\s]+$/;
    let emailRegex=/^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    let phoneRegex=/^\d{10}$/;

    if(!nameRegex.test(name)){
        alert("Enter valid name");
        return false;
    }
    else if(!emailRegex.test(email)){
        alert("Enter valid email");
        return false;
    }
    else if(!phoneRegex.test(phone)){
        alert("Enter valid phone number");
        return false;
    }
    else if(pass.length<4){
        alert("Enter 4 character long password");
        return false;
        
    }
    else if(pass!=cpass){
        alert("Passwords don't match");
        return false;
        
    }
    
    alert("Thank you for submitting the form!");
    return true;
}