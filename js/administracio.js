


function cambiapagina(dia){

    console.log(dia);

    window.location = "mostracomanda.php";
    (dia);

}


function buscajson(){

    var result = doesFileExist("/comandesjson/22-10-2021.json");
    if(result == true){
        console.log('The file exists');



    }else{
        console.log('The file does not exist');
    }




}

function doesFileExist(urlToFile) {
    var xhr = new XMLHttpRequest();
    xhr.open('HEAD', urlToFile, false);
    xhr.send();

    if (xhr.status == "404") {
        return false;
    } else {
        return true;
    }
}