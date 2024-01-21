<!-- ส่วนเพิ่มข้อมูล -->
<form action="create.php" method="post" enctype="multipart/form-data" onsubmit="showPopup('Data Added Successfully')"
    class="mb-4 p-4 bg-gray-100 rounded-lg shadow-md">

    <div class="mb-4">
        <label for="sid" class="block text-sm font-semibold text-gray-700">รหัสนักศึกษา:</label>
        <input type="text" name="sid" id="sid" required
            class="border border-gray-300 rounded p-2 w-full focus:outline-none focus:border-blue-500">
    </div>

    <div class="mb-4">
        <label for="fname" class="block text-sm font-semibold text-gray-700">ชื่อ:</label>
        <input type="text" name="fname" id="fname" required
            class="border border-gray-300 rounded p-2 w-full focus:outline-none focus:border-blue-500">
    </div>

    <div class="mb-4">
        <label for="lname" class="block text-sm font-semibold text-gray-700">นามสกุล:</label>
        <input type="text" name="lname" id="lname" required
            class="border border-gray-300 rounded p-2 w-full focus:outline-none focus:border-blue-500">
    </div>

    <div class="mb-4">
        <label for="profileImage" class="block text-sm font-semibold text-gray-700">รูปภาพโปรไฟล์:</label>
        <input type="file" name="profileImage" id="profileImage" accept="image/*"
            class="border border-gray-300 rounded p-2 w-full focus:outline-none focus:border-blue-500">
    </div>

    <button type="submit"
        class="bg-blue-500 text-white rounded p-2 hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue">
        เพิ่มข้อมูล
    </button>

</form>
