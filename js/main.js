function getVaccineData(stateID){
    var req = new XMLHttpRequest();
    req.open('GET','getdata.php?state_id='+stateID,true);
    req.send();

    req.onreadystatechange = function (){
        if(req.readyState == 4 && req.status == 200){
            // console.log(req.responseText);
            let vaccineData = JSON.parse(req.responseText);
            // console.log(vaccineData);
            // for(var i=0; i<vaccineData.length; i++){
            //     // alert(vaccineData[i]);
            // }
            document.getElementById("st_name").innerHTML =  vaccineData["st_name"];
            document.getElementById("st_dose1").innerHTML = vaccineData["dose1"];
            document.getElementById("st_dose2").innerHTML = vaccineData["dose2"];
            document.getElementById("st_total_doses").innerHTML = vaccineData["total_doses"];
           
        }
    }
}

function showVaccineData(stateID){
    var req = new XMLHttpRequest();
    req.open('GET','getdata.php?state_id='+stateID,true);
    req.send();

    req.onreadystatechange = function (){
        if(req.readyState == 4 && req.status == 200){
            // console.log(req.responseText);
            let vaccineData = JSON.parse(req.responseText);
            // console.log(vaccineData);
            // for(var i=0; i<vaccineData.length; i++){
            //     // alert(vaccineData[i]);
            // }
            document.getElementById("state_data").innerHTML+= `
            <tbody>
                
                
                    
                    <tr>
                        <td>${vaccineData["st_name"]}</td>
                        <td>${vaccineData["dose1"]}</td>
                        <td>${vaccineData["dose2"]}</td>
                        <td>${vaccineData["total_doses"]}</td>
                    </tr>
            </tbody>
            `
            
        }
    }
}
function showData(){
for (let i = 1; i <=36; i++) {
    showVaccineData(i);
}
}
function getIndiaData(){
    var req = new XMLHttpRequest();
    req.open('GET','getindia.php',true);
    req.send();
    
    req.onreadystatechange = function (){
        if(req.readyState == 4 && req.status == 200){
            console.log(req.responseText);
            let vaccineData = JSON.parse(req.responseText);
            document.getElementById("totaltoday").innerHTML = vaccineData["india_total_doses"];
           document.getElementById("dose1").innerHTML = vaccineData["india_dose1"];
           document.getElementById("dose2").innerHTML = vaccineData["india_dose2"];
           document.getElementById("todaydose1").innerHTML = vaccineData["india_dose1"]-vaccineData["india_last_dose1"];
           document.getElementById("todaydose2").innerHTML = vaccineData["india_dose2"]-vaccineData["india_last_dose2"];
           document.getElementById("todaydoses").innerHTML = vaccineData["india_total_doses"]-vaccineData["india_last_total_doses"];
        }
    }
}

window.onload = function() {
    showData();
    getIndiaData();
};

