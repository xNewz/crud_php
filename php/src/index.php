<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Example</title>
    <!-- Link to Tailwind CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Link to Google Kanit font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&display=swap">
    <style>
        body {
            font-family: 'Kanit', sans-serif;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-purple-500 via-purple-600 to-purple-700 text-black flex items-center justify-center min-h-screen">

    <div class="container mx-auto p-4 bg-white rounded-lg shadow-md">

        <h1 class="text-3xl font-bold mb-8 text-center text-black">ระบบบันทึกข้อมูลนักศึกษา</h1>

        <!-- Add Student Form -->
        <?php include('create_form.php'); ?>

        <!-- Student List -->
        <div class="mt-8">
            <h2 class="text-xl font-semibold mb-4 text-black">รายชื่อนักศึกษา</h2>

            <!-- Table -->
            <div class="overflow-x-auto">
                <?php include('read.php'); ?>
            </div>
        </div>
    </div>

</body>

</html>
