console.clear();

var textPathmobile = document.querySelector('#text-pathmobile');

var textContainermobile = document.querySelector('#text-containermobile');

var path = document.querySelector( textPathmobile.getAttribute('href') );

var pathLength = path.getTotalLength();
console.log(pathLength);

function updateTextPathmobileOffset(offset){
  textPathmobile.setAttribute('startOffset', offset); 
}

updateTextPathmobileOffset(pathLength);

function onScroll(){
  requestAnimationFrame(function(){
    var rect = textContainermobile.getBoundingClientRect();
    var scrollPercent = rect.y / window.innerHeight;
    console.log(scrollPercent);
    updateTextPathmobileOffset( scrollPercent * 0.2 * pathLength );
  });
}

window.addEventListener('scroll',onScroll);