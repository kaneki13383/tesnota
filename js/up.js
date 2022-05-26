window.addEventListener('scroll', function(){
  if(this.pageYOffset > 200){
    this.document.getElementById("btt").style.transitionDuration = 1 + "s";
    this.document.getElementById("btt").style.right = 30 + "px";
  }else{
    this.document.getElementById("btt").style.transitionDuration = 1 + "s";
    this.document.getElementById("btt").style.right = -100 + "px";
  }
})