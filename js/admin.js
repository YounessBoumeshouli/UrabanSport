let addActivity = document.getElementById('addActivity');


addActivity.addEventListener("click",function(){
    document.getElementById("addActivityForm").classList.remove("hidden");
})
document.getElementById("subActivity").addEventListener('click',function(){
    document.getElementById("addActivityForm").classList.add("hidden");
})
let addEquipement = document.getElementById('addEquipement');

addEquipement.addEventListener("click",function(){
    document.getElementById("addEquipementForm").classList.remove("hidden");
})
document.getElementById("subEquipement").addEventListener('click',function(){
    document.getElementById("addEquipementForm").classList.add("hidden");
})