
document.getElementById('orderLunchBtn').addEventListener('click', 
function() {
    document.querySelector('.modal-bg').style.display = 'flex';

})

document.getElementById('closeBtn').addEventListener('click', 
function() {
    document.querySelector('.modal-bg').style.display = 'none';
});


const staffID = document.getElementById('staffID')
document.getElementById('form').addEventListener('submit', e() =>{
    e.preventDefault();

    const request = new XMLHttpRequest();
    request.open('post', 'OrderLunch/orderLunch.php');
    request.onload = () => {
        console.log(request.responseText)
    }
})
