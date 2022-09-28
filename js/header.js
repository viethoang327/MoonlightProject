document.querySelector('.search-btn').addEventListener('click', function () {
	this.parentElement.classList.toggle('open')
	this.previousElementSibling.focus()
})
var navarr=document.querySelectorAll('#nav li');
let checkedindex;
navarr.forEach(function (element,index){
    element.addEventListener('click',function(e){
       e.target.parentElement.classList.add('nav-active');
       console.log(e.target.parentElement);
       checkedindex=index;
       navarr.forEach(function (element,index){
        if (checkedindex!=index){
            element.classList.remove('nav-active');
        }
       });
       console.log(checkedindex);
    });
   
});
const Top = document.querySelector(".header")
window.addEventListener("scroll",function(){
    const x = this.pageYOffset;
    console.log(x);
    if(x>80){
        Top.classList.add("active")
    }else{
        Top.classList.remove("active")
    }
})