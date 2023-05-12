function edit()
{
document.getElementById('fname').removeAttribute("disabled");
document.getElementById('age').removeAttribute("disabled");
document.getElementById('bd').removeAttribute("disabled");
document.getElementById('address').removeAttribute("disabled");
document.getElementById('gender').removeAttribute("disabled");
document.getElementById('conum').removeAttribute("disabled");
document.getElementById('emails').removeAttribute("disabled");
document.getElementById('edit').setAttribute("hidden",true);
document.getElementById('back').setAttribute("hidden",true);
document.getElementById('save').removeAttribute("hidden");
document.getElementById('cancel').removeAttribute("hidden");
}


document.getElementById('cancel').addEventListener("click", cancel)

function cancel()
{
document.getElementById('fname').setAttribute("disabled",true);
document.getElementById('age').setAttribute("disabled",true);
document.getElementById('bd').setAttribute("disabled",true);
document.getElementById('address').setAttribute("disabled",true);
document.getElementById('gender').setAttribute("disabled",true);
document.getElementById('conum').setAttribute("disabled",true);
document.getElementById('emails').setAttribute("disabled",true);
document.getElementById('edit').removeAttribute("hidden");
document.getElementById('back').removeAttribute("hidden");
document.getElementById('save').setAttribute("hidden",true);
document.getElementById('cancel').setAttribute("hidden",true);
document.getElementById("form").reset();
}
