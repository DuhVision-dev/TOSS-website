// forms.js — simple form handling

(function(){
  document.addEventListener('submit', function(e){
    var form = e.target;
    if(form.matches('.ajax-form')){
      e.preventDefault();
      // TODO: implement AJAX submit
      console.log('Submitting', form);
    }
  });
})();
