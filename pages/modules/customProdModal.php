<!-- Modal content -->
<div id="<?= $customProdId ?>-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal container -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 id="modal-title" class="text-xl font-semibold text-gray-900 dark:text-white">
                    
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="product-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4" id="modal-body">
            <?php switch ($customProdId):
                    case 'customCharacter': ?>
                        <p>Instructions for Custom Character:</p>
                        <!-- Add your additional fields here -->
                        <?php break;
                    case 'nameChange': ?>
                        <p>Instructions for Name Change:</p>
                        <!-- Add your additional fields here -->
                        <?php break;
                    case 'customCars': ?>
                        <p>Instructions for Custom Cars:</p>
                        <!-- Add your additional fields here -->
                        <?php break;
                    case 'priorityQueue': ?>
                        <p>Instructions for Priority Queue:</p>
                        <!-- Add your additional fields here -->
                        <?php break;
                    case 'customFurniture': ?>
                        <p>Instructions for Custom Furniture:</p>
                        <!-- Add your additional fields here -->
                        <?php break;
                    case 'customVehiclePlate': ?>
                        <p>Instructions for Custom Vehicle Plate:</p>
                        <!-- Add your additional fields here -->
                        <?php break;
                    default: ?>
                        <p>No additional fields specified for this product.</p>
                <?php endswitch; ?>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="<?= $customProdId ?>-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                <button data-modal-hide="<?= $customProdId ?>-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Get all buttons that should trigger the modal
    var triggerButtons = document.querySelectorAll("[data-trigger-modal='<?= $customProdId ?>-modal']");

    // Add click event listener to each trigger button
    triggerButtons.forEach(function(button) {
        button.addEventListener("click", function() {
            // Trigger the modal
            showModal();
        });
    });

    // Function to trigger the modal
    function showModal() {
        var modal = document.getElementById("<?= $customProdId ?>-modal");

        // Display the modal
        modal.classList.remove("hidden");
    }
</script>

<!--- 
<form>
                                <div>
                                    <label for="countries_multiple"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                                        option</label>
                                    <select multiple id="countries_multiple"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>Choose countries</option>
                                        <option value="US">United States</option>
                                        <option value="CA">Canada</option>
                                        <option value="FR">France</option>
                                        <option value="DE">Germany</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                        email</label>
                                    <input type="email" name="email" id="email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        placeholder="name@company.com" required />
                                </div>
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                        email</label>
                                    <input type="email" name="email" id="email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        placeholder="name@company.com" required />
                                </div>
                            </form>

--->