<?php
// Include the PhpSpreadsheet classes
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Get the form data
$product = $_POST['product'];
$type = $_POST['type'];
$description = $_POST['description'];

// Handle file upload
$targetDir = 'uploads/';
$fileName = basename($_FILES['image']['name']);
$targetFilePath = $targetDir . $fileName;
move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath);

// Insert the data into the database
include("connect-2.php"); // Include your database connection file

$sql = "INSERT INTO category (product, type, description, image) VALUES ('$product', '$type', '$description', '$targetFilePath')";
mysqli_query($conn, $sql);

// Create a new spreadsheet object
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set the column headers
$sheet->setCellValue('A1', 'Product');
$sheet->setCellValue('B1', 'Type');
$sheet->setCellValue('C1', 'Description');
$sheet->setCellValue('D1', 'Image');

// Fetch data from the database
$sql = "SELECT * FROM category";
$result = mysqli_query($conn, $sql);

$rowIndex = 2; // Start from row 2 to leave space for column headers

while ($row = mysqli_fetch_assoc($result)) {
    $sheet->setCellValue('A' . $rowIndex, $row['product']);
    $sheet->setCellValue('B' . $rowIndex, $row['type']);
    $sheet->setCellValue('C' . $rowIndex, $row['description']);
    $sheet->setCellValue('D' . $rowIndex, $row['image']);
    $rowIndex++;
}

// Set the file name and extension
$fileName = 'database_data.xlsx';

// Create a writer object and save the spreadsheet as an Excel file
$writer = new Xlsx($spreadsheet);
$writer->save($fileName);

// Download the file
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . $fileName . '"');
header('Cache-Control: max-age=0');

$writer->save('php://output');

// Redirect back to the create page
header('Location: index-3.php');
exit();
?>