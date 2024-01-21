<!-- Edit Modal -->
<div id="editModal"
    class="hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center">
    <div class='bg-white p-8 rounded-lg'>
        <form action='update.php' method='post'>
            <input type='hidden' name='updateSid' id='editModalSid'>
            <div class='mb-4'>
                <label for='editModalFname' class='block text-sm font-semibold text-gray-600'>New First Name:</label>
                <input type='text' name='newFname' required
                    class='border border-gray-300 rounded p-2 w-full focus:outline-none focus:border-blue-500'
                    id='editModalFname'>
            </div>
            <div class='mb-4'>
                <label for='editModalLname' class='block text-sm font-semibold text-gray-600'>New Last Name:</label>
                <input type='text' name='newLname' required
                    class='border border-gray-300 rounded p-2 w-full focus:outline-none focus:border-blue-500'
                    id='editModalLname'>
            </div>
            <div class='flex justify-end'>
                <button type='button' onclick='hideEditModal()'
                    class='text-gray-500 hover:text-gray-700 focus:outline-none'>
                    Close
                </button>
                <button type='submit'
                    class='ml-2 bg-blue-500 text-white rounded p-2 hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue'>
                    Update
                </button>
            </div>
        </form>
    </div>
</div>