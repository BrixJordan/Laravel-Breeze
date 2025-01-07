<div 
    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden" 
    id="modal">
    <div class="bg-white rounded-lg shadow-lg w-1/3">
        <div class="flex justify-between items-center border-b p-4">
            <h3 class="text-lg font-semibold">Add Product</h3>
            <button class="text-gray-400 hover:text-gray-600" id="closeModal">&times;</button>
        </div>
        <div class="p-4">
            <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="product_name" class="block text-sm font-medium text-gray-700">Product Name</label>
                    <input
                        type="text"
                        name="product_name"
                        id="product_name"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:rinf-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>

                <div class="mb-4">
        <label for="product_description" class="block text-sm font-medium text-gray-700">Product Description</label>
        <textarea 
            name="product_description" 
            id="product_description" 
            rows="4" 
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
            required></textarea>
    </div>

    <div class="mb-4">
        <label for="product_price" class="block text-sm font-medium text-gray-700">Product Price</label>
        <input 
            type="number" 
            name="product_price" 
            id="product_price" 
            step="0.01" 
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
            required>
    </div>

    <div class="mb-4">
        <label for="product_image" class="block text-sm font-medium text-gray-700">Product Image</label>
        <input 
            type="file" 
            name="product_image" 
            id="product_image" 
            accept="image/*"
            class="mt-1 block w-full text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
            required>
    </div>

    <div class="flex justify-end">
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Save Product</button>
    </div>
            </form>
        </div>
    </div>
</div>
























<script>
    // Get modal and buttons
    const modal = document.getElementById('modal');
    const openModal = document.getElementById('openModal');
    const closeModalButtons = document.querySelectorAll('#closeModal, #closeModal2');

    // Show modal
    openModal.addEventListener('click', () => {
        modal.classList.remove('hidden');
    });

    // Hide modal
    closeModalButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });
    });
</script>
