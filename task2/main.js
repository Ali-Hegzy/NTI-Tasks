const themeBtn = document.getElementById(`theme`);

themeBtn.addEventListener('click', function () {
    
    const ele = document.getElementsByClassName(`bg-dark`);
    newEle = [...ele];

    if(newEle.length === 0){
        const ele = document.getElementsByClassName(`bg-secondary`);
        newEle = [...ele];    
    }

    for (let index = 0; index < newEle.length; index++) {
        newEle[index].classList.toggle(`bg-dark`);
        newEle[index].classList.toggle(`bg-secondary`);
    }

});
