<!-- Modal Structure -->
<div id="<?= $customProdId ?>"
    class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center hidden z-50">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal-container bg-white w-3/4 md:max-w-screen-lg mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div class="modal-content py-4 text-left px-6">
            <!-- Close Modal Button -->
            <form action="#" method="post" class="modal-content text-left">
                <div class="flex justify-between items-center pb-3 border-b mb-4">
                    <h1 class="text-xl font-medium">
                        <?= $customProdTitle ?>
                    </h1>
                    <div class="modal-close cursor-pointer z-50" data-modal="<?= $customProdId ?>">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
                        </svg>
                    </div>
                </div>
                <!-- Modal Content -->
                <div class="flex flex-row">
                    <img src="<?= $customProdPicture ?>" alt="<?= $customProdTitle ?>" class="mb-4 w-64 h-64" />
                    <div class="flex flex-col p-4">
                        <p class="py-4">
                            <?= $customProdDesc ?>
                        </p>
                        <div>
                            <h2>Juhend</h2>
                            <?php switch ($customProdId):
                                case 'customCar': ?>
                                    <input type="text" placeholder="Car Color" class="input-field rounded-md" />
                                    <?php break;
                                case 'customCharacter': ?>
                                    <input type="number" placeholder="Character Level" class="input-field rounded-md" />
                                    <?php break;
                                case 'customFurniture': ?>
                                    <input type="number" placeholder="Character Level" class="input-field rounded-md" />
                                    <?php break;
                                case 'nameChange': ?>
                                    <input type="number" placeholder="Character Level" class="input-field rounded-md" />
                                    <?php break;
                                case 'prioQueue': ?>
                                    <input type="number" placeholder="Character Level" class="input-field rounded-md" />
                                    <?php break;
                                case 'customVehiclePlate': ?>
                                    <input type="number" placeholder="Character Level" class="input-field rounded-md" />
                                    <?php break;

                            endswitch; ?>
                        </div>
                    </div>
                </div>
                <div class="flex justify-start space-x-3 mt-4 border-t">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 mt-4">Submit</button>
                    <button type="button"
                        class="modal-close px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 mt-4"
                        data-modal="<?= $customProdId ?>">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>