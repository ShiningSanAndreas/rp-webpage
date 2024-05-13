<!-- Modal Structure -->
<div id="<?= $customProdId ?>"
    class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center hidden z-50">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal-container bg-background w-1/2 md:max-w-3xl mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div class="modal-content py-4 text-left px-6 text-tekst">
            <!-- Close Modal Button -->
            <form action="#" method="post" class="modal-content text-left">
                <div class="flex justify-between items-center pb-3 border-b mb-4">
                    <div class="flex items-center text-xl font-medium">
                        <h1>
                            <?= $customProdTitle ?>
                        </h1>
                        ,  <?= $customProdPrice ?>
                        <img class="w-6 h-6 rounded-full ml-1" src="../assets/SSACoinTop.png" alt="Product Price">
                    </div>
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
                        <div class="text-tekst flex flex-col flex-wrap mt-4 w-full ">
                            <?php switch ($customProdId):
                                // Car instance
                                case 'customCar': ?>
                                    <label for="car-character-select">Vali Karakter:</label>
                                    <input type="text" list="car-characters" id="car-character-select" name="character"
                                        class="input-field rounded-md bg-primary border-2 border-black active:"
                                        placeholder="Vali Karakter">
                                    <datalist id="car-characters">
                                        <option value="Character 1">
                                        <option value="Character 2">
                                        <option value="Character 3">
                                            <!-- Add more options as needed -->
                                    </datalist>

                                    <label for="prod-link">Modi Link</label>
                                    <input type="text" id="prod-link" placeholder="Sisesta link"
                                        class="input-field rounded-md bg-primary border-2 border-black" />

                                    <label for="additional-comments">Lisa Kommentaarid(Valikuline)</label>
                                    <input type="text" id="additional-comments" placeholder="Lisa kommentaarid"
                                        class="input-field rounded-md bg-primary border-2 border-black" />
                                    <?php break;
                                //Character instance
                                case 'customCharacter': ?>
                                    <p>Kood genereeritakse peale ostu</p>
                                    <?php break;

                                //MLO instance
                                case 'customFurniture': ?>
                                    <label for="mlo-char-select">Vali Karakter:</label>
                                    <input type="text" list="mlo-characters" id="mlo-char-select" name="character"
                                        class="input-field bg-primary rounded-md  border-2 border-black"
                                        placeholder="Vali Karakter">
                                    <datalist id="mlo-characters">
                                        <option value="Character 1">
                                        <option value="Character 2">
                                        <option value="Character 3">
                                            <!-- Add more options as needed -->
                                    </datalist>

                                    <label for="prod-link">Modi Link</label>
                                    <input type="text" id="prod-link" placeholder="Sisesta link"
                                        class="input-field rounded-md bg-primary border-2 border-black" />

                                    <label for="additional-comments">Lisa Kommentaarid(Valikuline)</label>
                                    <input type="text" id="additional-comments" placeholder="Lisa kommentaarid"
                                        class="input-field rounded-md bg-primary border-2 border-black" />
                                    <?php break;

                                // Name instance
                                case 'nameChange': ?>
                                    <label for="character-name-select">Vali Karakter:</label>
                                    <input type="text" list="character-name" id="character-name-select" name="character"
                                        class="input-field bg-primary rounded-md border-2 border-black"
                                        placeholder="Vali Karakter">
                                    <datalist id="character-name">
                                        <option value="Character 1">
                                        <option value="Character 2">
                                        <option value="Character 3">
                                            <!-- Add more options as needed -->
                                    </datalist>

                                    <label for="char-name">Sisesta Uus Nimi</label>
                                    <input type="text" placeholder="New Character Name" id="char-name"
                                        class="input-field rounded-md bg-primary rounded-md border-2 border-black" />
                                    <?php break;

                                // Queue instance
                                case 'prioQueue': ?>
                                    <label for="queue-level-select">Vali Tase</label>
                                    <input type="text" list="queue-level-choices" id="queue-level-select" name="level"
                                        class="input-field bg-primary rounded-md border-2 border-black" placeholder="Vali Tase">
                                    <datalist id="queue-level-choices">
                                        <option value="Tase 1">
                                        <option value="Tase 2">
                                        <option value="Tase 3">
                                            <!-- Add more options as needed -->
                                    </datalist>
                                    <?php break;

                                // Plate instance
                                case 'customVehiclePlate': ?>

                                    <label for="veh-plate-select">Vali Karakter:</label>
                                    <input type="text" list="veh-plate-char" id="veh-plate-select" name="character"
                                        class="input-field bg-primary rounded-md border-2 border-black"
                                        placeholder="Vali Karakter">
                                    <datalist id="veh-plate-char">
                                        <option value="Character 1">
                                        <option value="Character 2">
                                        <option value="Character 3">
                                            <!-- Add more options as needed -->
                                    </datalist>

                                    <label for="veh-car-select">Vali Auto:</label>
                                    <input type="text" list="char-cars" id="veh-car-select" name="car"
                                        class="input-field bg-primary rounded-md border-2 border-black" placeholder="Vali Auto">
                                    <datalist id="char-cars">
                                        <option value="Character 1">
                                        <option value="Character 2">
                                        <option value="Character 3">
                                            <!-- Add more options as needed -->
                                    </datalist>

                                    <label for="form-input">Sisesta Numbrimärk:</label>
                                    <input type="text" id="form-input" placeholder="Numbrimärk"
                                        class="input-field rounded-md bg-primary border-2 border-black" />
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
