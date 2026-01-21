// main.js — global scripts

(function(){
  document.addEventListener('DOMContentLoaded', function(){
    // small helper: toggle mobile nav
    var btn = document.querySelector('.nav-toggle');
    if(btn){
      btn.addEventListener('click', function(){
        document.body.classList.toggle('nav-open');
      });
    }
  });
})();
