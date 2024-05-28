const changeNumber = (city) => {
    let elements = document.querySelectorAll('.phone');
    console.log(elements);
    elements.forEach((element) => {
        switch (city) {
            case 'Syktyvkar':
                element.textContent = '88005553535'
                break;
            case 'Moscow':
                element.textContent = '88008888888'
                break;
        }
    });
}

/* это тривиальный вариант решения данного кейса. В реальности гораздо лучше было бы пробрасывать координаты на свой бэк,
 где либо с помощью геокодера, либо какой другой логики можно резолвить полученные координаты в наименование города.
 А по наименованию города вытаскивать номер телефона из заранее готового справочника
 **/

const successGeo = (position) => {
    let lat = position.coords.latitude;
    let lng = position.coords.longitude;
    let address = `https://geocode.maps.co/reverse?lat=${lat}&lon=${lng}&api_key=66566093294ce224704489vjc8ddd58`
    fetch(address).then(
        response => response.json()
    ).then(
        json => changeNumber(json.address.city)
    );
};

navigator.geolocation.getCurrentPosition(successGeo);