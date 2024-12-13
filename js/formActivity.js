let addActivity = document.getElementById('addActivity');


addActivity.addEventListener("click",function(){
    document.getElementById("addActivityForm").classList.remove("hidden");
})
document.getElementById("subActivity").addEventListener('click',function(){
    document.getElementById("addActivityForm").classList.add("hidden");
})
