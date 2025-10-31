<?php
include '../connect.php';

if (isset($_POST['id'], $_POST['field'], $_POST['value'])) {
    $id = intval($_POST['id']);
    $field = $_POST['field'];
    $value = $_POST['value'];

    // Only allow specific fields for security
    if (!in_array($field, ['is_active', 'timer_minutes'])) {
        die('Invalid field');
    }

    $stmt = $conn->prepare("UPDATE student_subject SET $field = ? WHERE id = ?");
    $stmt->bind_param("ii", $value, $id);

    if ($stmt->execute()) {
        echo "Updated successfully";
    } else {
        echo "Error updating record";
    }

    $stmt->close();
}
?>
