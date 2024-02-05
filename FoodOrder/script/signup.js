function password(){
    var input=document.getElementById("pass")
    var open=document.getElementById("open")
    var close=document.getElementById("close")

    if (input.type=="password") {
        input.type="text"
        open.style.display="block"
        close.style.display="none"
    }else{
        input.type="password"
        open.style.display="none"
        close.style.display="block"

    }
}
function cpassword(){
    var input=document.getElementById("cpass")
    var open=document.getElementById("copen")
    var close=document.getElementById("cclose")

    if (input.type=="password") {
        input.type="text"
        open.style.display="block"
        close.style.display="none"
    }else{
        input.type="password"
        open.style.display="none"
        close.style.display="block"

    }
}