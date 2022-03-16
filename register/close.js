function closing(){
  let path = document.querySelectorAll('script')[1].getAttribute('data-url').split('./').join('');
   $.post('./index.php',
  {
    close: 'yes',
    path: path
  },
  function(data, status){
  });
}
window.onclose = closing();