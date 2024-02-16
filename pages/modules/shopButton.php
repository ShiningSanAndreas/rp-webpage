<!-- Main modal -->
<button type="button" data-modal-target="<?= $customProd['id'] ?>-modal"
    data-modal-toggle="<?= $customProd['id'] ?>-modal"
    class="text-tekst bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-md px-5 py-2.5 text-center my-4">
    Osta
</button>

<!-- Single Modal -->
<div id="custom-product-modal" tabindex="-1" aria-hidden="true" class="hidden">
    <div class="modal-content">
        <!-- Modal header -->
        <div class="modal-header">
            <h3 class="modal-title"></h3>
            <button type="button" class="close-modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <img src="" alt="" class="product-image">
            <p class="product-description"></p>
            <!-- Additional fields specific to each product will be dynamically added here -->
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="buy-button">Osta</button>
        </div>
    </div>
</div>


<script>
    // JavaScript code to handle product button clicks and update the modal content

// Function to update the modal content based on the product ID
function updateModalContent(productId) {
    // Retrieve product details based on productId
    const productDetails = getProductDetails(productId);

    // Update modal title
    document.querySelector('.modal-title').textContent = productDetails.title;

    // Update modal image
    document.querySelector('.product-image').src = productDetails.picture;
    document.querySelector('.product-image').alt = productDetails.title;

    // Update modal description
    document.querySelector('.product-description').textContent = productDetails.description;

    // Additional fields specific to each product can be updated here dynamically
    // For example, add dropdowns, input fields, etc.
}

// Example function to retrieve product details based on productId
function getProductDetails(productId) {
    // Here, you can fetch product details from your data source
    // For demonstration, I'm using a static object representing product details
    const products = {
        'customCar': {
            title: 'Ägedad autod',
            description: 'Description of Custom Product 1.',
            picture: '../assets/car.png',
            // Additional fields specific to Custom Car
        },
        'customCharacter': {
            title: 'Kõvad mudelid',
            description: 'Description of Custom Product 2.',
            picture: '../assets/custompeed.png',
            // Additional fields specific to Custom Character
        },
        // Add details for other products here
    };

    return products[productId];
}

// Add event listeners to product buttons to open the modal and update its content
const productButtons = document.querySelectorAll('.product-button');
productButtons.forEach(button => {
    button.addEventListener('click', () => {
        const productId = button.dataset.productId;
        updateModalContent(productId);
        // Code to show the modal
    });
});

// Function to close the modal
function closeModal() {
    // Code to hide the modal
}

// Add event listener to close button
const closeButton = document.querySelector('.close-modal');
closeButton.addEventListener('click', closeModal);

</script>