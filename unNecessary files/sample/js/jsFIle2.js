function routes(){
    var http = require('http');
    const {x} = require('./jsFile.js');
    document.getElementById("result").innerHTML=x;
    switch(x){
        case "Audi":
            var myobject = {
                ValueA : 'Text A',
                ValueB : 'Text B',
                ValueC : 'Text C'
            };
            var select = document.getElementById("mySelect2");
            for(index in myobject) {
                select.options[select.options.length] = new Option(myobject[index], index);
            }
            break;
        case "BMW":
            console.log("bmw");
            break;
        case "Mercedes":
            console.log("mercedes");
            break;
        case "Volvo":
            console.log("volvo");
            break;
      }
}