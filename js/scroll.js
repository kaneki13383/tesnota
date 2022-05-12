var doc, bod, htm;
addEventListener('load', function(){
  doc = document; bod = doc.body; htm = doc.documentElement;
  addEventListener('scroll', function(){
    doc.querySelector('nav').style.backgroundColor = htm.scrollTop > 800 ? '#212529' : '';
    this.document.getElementById('navheader').style.transition = 400 + 'ms';
  });
});