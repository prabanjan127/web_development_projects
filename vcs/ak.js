function reveal(){
    var reveals = document.querySelectorAll(".reveal");
    reveals.forEach((reveal) =>{
        var windowHeight = window.innerHeight;
        var elementTop = reveal.getBoundingClientRect().top;
        var elementVisile = 100;

        if(elementTop< windowHeight -elementVisile){
            reveal.classList.add("active");}
            else{
                reveaal.classList.remove("active");
            }
        });
    }

    window.addEventListener("scroll",reveal);