<div id="reservationModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="fixed inset-0 bg-gray-500 opacity-75"></div>
    <div class="bg-white rounded-lg shadow-lg p-6 z-10 sm:w-96">
        <h2 class="text-lg font-bold mb-4">Select Your Date</h2>
        <input id="availabilityDate" type="date" name="availabilityDate" class="border border-gray-300 rounded-md p-2 mb-4 w-full">
        <div class="flex justify-end">
            <button id="closeModal" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-500 mr-2">
                Close
            </button>
            <button class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-500">
                Confirm
            </button>
        </div>
    </div>
</div>  
