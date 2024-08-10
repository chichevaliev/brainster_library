const deleteBTN = document.getElementsByClassName('delete');

for(let i =0;i<deleteBTN.length;i++){

deleteBTN[i].addEventListener('click',function(e){
    e.preventDefault();
    
  console.log(deleteBTN[i]);
    
    const href = deleteBTN[i].getAttribute('href');
  
    Swal.fire({
      title : 'Are you sure ?',
      text: 'Book will be deleted',
      type: 'warning',
      showCancelButton:'true',
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText:'Delete Book',
    }).then((result)=>{
      if(result.value){
        document.location.href = href;
      }
    })
  })}


  let cards = document.querySelectorAll('.card')
  let checkbox = document.querySelectorAll('.checkbox')

  
  

 checkbox.forEach(function(element){
  element.addEventListener('click',function(){
    if(element.checked){
      cards.forEach(function(card){
        card.style.display='none';
        let category = element.getAttribute('data-id');
        let displayCards = document.querySelectorAll(`.${category}`)
       displayCards.forEach(function(singleCard){
        singleCard.style.display = ''
       }) 
       
      })
    } else {cards.forEach(function(card){
      card.style.display='';})}
  })
 })
    
    
 



  document.addEventListener("DOMContentLoaded", function () {
    function fetchRandomQuote() {
      fetch("http://api.quotable.io/random")
        .then((response) => response.json())
        .then((data) => {
          document.getElementById("quote").textContent =
            data.content + " - " + data.author;
        })
        .catch((error) => {
          console.error("Error fetching quote:", error);
        });
    }
    fetchRandomQuote();
  });
  
  
