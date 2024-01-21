<?php
include('db_connection.php');
?>

<!-- import modal from editModal.php -->
<?php include('editModal.php'); ?>

<div class="container mx-auto p-4 flex justify-center">
    <table class="min-w-full bg-white border rounded-lg overflow-hidden">
        <thead class="bg-indigo-800 text-white">
            <tr>
                <th class="px-4 py-2 text-center">รหัสนักศึกษา</th>
                <th class="px-4 py-2 text-center">รูปภาพโปรไฟล์</th>
                <th class="px-4 py-2 text-center">ชื่อ</th>
                <th class="px-4 py-2 text-center">นามสกุล</th>
                <th class="px-4 py-2 text-center">แก้ไข/ลบ</th>
            </tr>
        </thead>
        <tbody class="text-gray-800">
            <?php
            $sql = "SELECT * FROM students";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr class='border-t hover:bg-gray-100'>";
                    echo "<td class='px-4 py-2 text-center'>" . $row["sid"] . "</td>";
                    echo "<td class='px-4 py-2 text-center'><img src='" . $row["profile_image"] . "' alt='Profile Image' class='mx-auto d-block h-10 w-10 rounded-full'></td>";
                    echo "<td class='px-4 py-2 text-center'>" . $row["fname"] . "</td>";
                    echo "<td class='px-4 py-2 text-center'>" . $row["lname"] . "</td>";
                    echo "<td class='px-4 py-2 text-center'>";
                    echo "<a href='#' class='text-indigo-500 hover:underline mr-2' onclick='showEditModal(" . $row["sid"] . ")'>แก้ไข</a>";
                    // Add confirmation dialog for delete
                    echo "<a href='#' class='text-red-500 hover:underline' onclick='confirmDelete(" . $row["sid"] . ")'>ลบ</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr class='bg-gray-100'><td colspan='5' class='px-4 py-2 text-center'>0 records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script>
    function showEditModal(sid) {
        // Set values in the modal form based on the selected record
        var modalSid = document.getElementById('editModalSid');
        var modalFname = document.getElementById('editModalFname');
        var modalLname = document.getElementById('editModalLname');

        modalSid.value = sid;
        modalFname.value = ''; // Set the initial value
        modalLname.value = ''; // Set the initial value

        // Show the edit modal
        var editModal = document.getElementById('editModal');
        editModal.classList.remove('hidden');
    }

    function hideEditModal() {
        // Hide the edit modal
        var editModal = document.getElementById('editModal');
        editModal.classList.add('hidden');
    }

    function confirmDelete(sid) {
        var confirmDelete = confirm("Are you sure you want to delete this record?");

        if (confirmDelete) {
            // Redirect to delete.php if the user confirms
            window.location.href = 'delete.php?sid=' + sid;
        } else {
            // Do nothing if the user cancels
        }
    }
</script>

<?php
$conn->close();
?>