function getSourceDest(){
    var main=document.getElementById("mySelect").value;
    var source=document.getElementById("mySelect2").value;
    var destination=document.getElementById("mySelect3").value;
    var adults=document.getElementById("adults").value;
    var children=document.getElementById("children").value;
    //var x=document.getElementById("demo").value;
    var adultCost;
    var childrenCost;
    var totalStops;
    var pricePerStop=10;
    var totalCost;
    switch(main){
        case "Kadapa-Pulivendula":
            const stops = ["kadapa","Rampathadu","pendlimarri","nandimandalam","vempalli","vemula","pulivendula"];
            var sourceIdx=stops.indexOf(source);
            var destIdx=stops.indexOf(destination);
            if(destIdx<sourceIdx || sourceIdx==destIdx){
                alert("Select valid source & destination");
                //document.getElementById("form").action="/MainRoutes.html";
                //document.getElementById("form").submit();
            }
            var NoOfStops=destIdx-sourceIdx;
            adultCost=adults*NoOfStops*pricePerStop;
            childrenCost=children*NoOfStops*(pricePerStop/2);
            totalCost=adultCost+childrenCost;
            break;
        case "Kadapa-Rayachoty":
            const stops1 = ["kadapa","buggaletipalle","kolumulapalle","guvvalacheruve","samvepalli","chitlur","rayachoty"];
            var sourceIdx=stops1.indexOf(source);
            var destIdx=stops1.indexOf(destination);
            if(destIdx<sourceIdx || sourceIdx==destIdx){
                alert("Select valid source & destination");   
            }
            var NoOfStops=destIdx-sourceIdx;
            adultCost=adults*NoOfStops*pricePerStop;
            childrenCost=children*NoOfStops*(pricePerStop/2);
            totalCost=adultCost+childrenCost;
            break;
        case "Kadapa-Kurnool":
            const stops2 = ["kadapa","chennur","mydukur","duvvuru","chagalamarri","allagadda","nandyala","orvakal","kurnool"];
            var sourceIdx=stops2.indexOf(source);
            var destIdx=stops2.indexOf(destination);
            if(destIdx<sourceIdx || sourceIdx==destIdx){
                alert("Select valid source & destination");   
            }
            var NoOfStops=destIdx-sourceIdx;
            adultCost=adults*NoOfStops*pricePerStop;
            childrenCost=children*NoOfStops*(pricePerStop/2);
            totalCost=adultCost+childrenCost;
            break;
    }
   /* var inp=document.getElementById("TotalCost");
    inp.setAttribute("value",totalCost);
    /*document.forms['myform']['TotalCost'].value = totalCost;
    alert(totalCost);*/
    
    let num = totalCost;
    let text = num.toString();
    var input = document.getElementById("TotalCost");
    input.value = text;
}


var x;
function myFunction() {
  removeItems();
  x = document.getElementById("mySelect").value;
  document.getElementById("demo").innerHTML = "You selected: " + x;
  document.getElementById("demo").value=x;
  switch(x){
    case "Kadapa-Pulivendula":
        var myobject = {
            kadapa : 'Kadapa',
            Rampathadu : 'Rampathadu',
            pendlimarri : 'Pendlimarri',
            nandimandalam : 'nandimandalam',
            vempalli :'Vempalli',
            vemula : 'Vemula',
            pulivendula : 'Pulivendula'
        };
        var select = document.getElementById("mySelect2");
        for(index in myobject) {
            select.options[select.options.length] = new Option(myobject[index], index);
        }
        var select1 = document.getElementById("mySelect3");
        for(index in myobject) {
            select1.options[select1.options.length] = new Option(myobject[index], index);
        }
        break;
    case "Kadapa-Rayachoty":
        var myobject = {
            kadapa : 'Kadapa',
            buggaletipalle : 'Buggaletipalle',
            kolumulapalle : 'Kolumulapalle',
            guvvalacheruve : 'Guvvalacheruve',
            samvepalli : 'Samvepalli',
            chitlur : 'Chitlur',
            rayachoty : 'Rayachoty'
        };
        var select = document.getElementById("mySelect2");
        for(index in myobject) {
            select.options[select.options.length] = new Option(myobject[index], index);
        }
        var select1 = document.getElementById("mySelect3");
        for(index in myobject) {
            select1.options[select1.options.length] = new Option(myobject[index], index);
        }
        break;
    case "Kadapa-Kurnool":
        var myobject = {
            kadapa : 'Kadapa',
            chennur : 'Chennur',
            mydukur : 'Mydukur',
            duvvuru : 'Duvvuru',
            chagalamarri :'Chagalamarri',
            allagadda : 'Allagadda',
            nandyala : 'Nandyala',
            orvakal : 'Orvakal',
            kurnool : 'Kurnool'
        };
        var select = document.getElementById("mySelect2");
        for(index in myobject) {
            select.options[select.options.length] = new Option(myobject[index], index);
        }
        var select1 = document.getElementById("mySelect3");
        for(index in myobject) {
            select1.options[select1.options.length] = new Option(myobject[index], index);
        }
        break;
  }
}
function removeItems(select){
    var select = document.getElementById("mySelect2");
    var length = select.options.length;
    for (i = length-1; i >= 0; i--) {
        select.options[i] = null;
    }
    var select = document.getElementById("mySelect3");
    var length = select.options.length;
    for (i = length-1; i >= 0; i--) {
        select.options[i] = null;
    }
}

