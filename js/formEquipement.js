let addEquipement = document.getElementById('addEquipement');

addEquipement.addEventListener("click",function(){
    document.getElementById("addEquipementForm").classList.remove("hidden");
    console.log("is clicked")
})
document.getElementById("subEquipement").addEventListener('click',function(){
    document.getElementById("addEquipementForm").classList.add("hidden");
})