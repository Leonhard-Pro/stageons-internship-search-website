
function verifpc() {

    let objPC = document.getElementById("pc");
    if (objPC.value.length !== 5) return;

    let url = "https://apicarto.ign.fr/api/codes-postaux/communes/";
    let xhr = new XMLHttpRequest();

    xhr.open("GET", url + objPC.value);
    //xhr.setRequestHeader("Accept", "application/json");
    xhr.responseType = "json";

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            //console.log(xhr.status);
            let jsonObj = xhr.response;
            let cityList = [];
            let objCity = document.getElementById("city");
            for (let i = 0; i < jsonObj.length; i++) {
                cityList.push(jsonObj[i].nomCommune)
            }
            //console.log(cityList);

            if (cityList.length === 1) {
                if (objCity.tagName == "input") {
                    objCity.value = cityList[0];
                } else {
                    let newObjCity = createTextInput(cityList[0]);
                    objCity.parentNode.replaceChild(newObjCity, objCity);
                }
                return;
            }

            let newObjCity = createSelect(cityList);
            objCity.parentNode.replaceChild(newObjCity, objCity);
        }
    };
    xhr.send();
};

document.getElementById("city").addEventListener("input", function () {

});

function createTextInput(value) {
    let obj = document.createElement("input");
    obj.id = "city";
    obj.type = "text";
    obj.value = value;
    return obj;
};

function createSelect(valueList) {
    let obj = document.createElement("select");
    obj.id = "city";
    obj.onblur = selectToTextInput;
    for (var i = 0; i < valueList.length; i++) {
        var option = document.createElement("option");
        option.value = valueList[i];
        option.text = valueList[i];
        obj.appendChild(option);
    }
    return obj;
};

function selectToTextInput() {
    objSelect = document.getElementById("city");
    objText = createTextInput(objSelect.value);
    objSelect.parentNode.replaceChild(objText, objSelect);
}