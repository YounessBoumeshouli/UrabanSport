<?php
$title = "Equipements List";
ob_start();
?>
<div class="flex justify-center items-center text-white mt-10 h-16"><button id="addEquipement">Add Equipement</button></div>
        <form action="index.php?action=addEquipement" id="addEquipementForm" method="post" class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5 w-[50%] text-white hidden">
              <div class="md:col-span-5">
                <label for="equipement_name">Equipement Name</label>
                <input type="text" name="equipement_name"  class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 text-black"  />
              </div>
              

              <div class="md:col-span-5">
                <label for="Description">Description</label>
                <input type="text" name="Description"  class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 text-black" placeholder="decription for this Equipement" />
              </div>

              <div class="md:col-span-3">
                <label for="imageEquipement">Image of the Equipement</label>
                <input type="text" name="imageEquipement"  class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 text-black"   />
              </div>
              <div class="md:col-span-3">
                <label for="capaciteEquipement">Quantity of the Equipement</label>
                <input type="number" name="capaciteEquipement"  class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 text-black"  max=100  />
              </div>
              <div class="md:col-span-3">
                <label for="prixEquipement">price of the Equipement</label>
                <input type="number" name="prixEquipement"  class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 text-black"  max=100  />
                <div class="inline-flex items-end">
                  <input type="submit" value="add Equipement" id="subEquipement"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-black">
                </div>
                
              </div>

           
          
          </form>
    <div class="mt-8">
    <div class="mt-8">
       
        
        <div class="flex flex-col mt-6">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Equipement Name</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">is Available</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-100"></th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            <?php
                            while($row = $result->fetch_assoc()){
                            ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                                        </div>

                                        <div class="ml-4">
                                            <div class="text-sm leading-5 font-medium text-gray-900"><?=$row["Nom_Equipement"]?></div>
                                            
                                        </div>
                                    </div>
                                </td>
                                
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900"><?=$row["Description"]?></div>

                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"><?=$row["Quantite"]?></span>
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500"><a href="" class="text-indigo-600 hover:text-indigo-900"><?=$row["Disponibilite"]?></a></td>

                                <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>
                                
                            </tr>
                            <?php
                          }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php
$content = ob_get_clean();
require_once("views/layout.php");