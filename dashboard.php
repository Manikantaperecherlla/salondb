$filter_date = isset($_GET['filter_date']) ? $_GET['filter_date'] : null;

if ($filter_date) {
    $stmt = $conn->prepare("SELECT service, amount, date FROM transactions WHERE DATE(date) = ?");
    $stmt->bind_param("s", $filter_date);
} else {
    $stmt = $conn->prepare("SELECT service, amount, date FROM transactions");
}

$stmt->execute();
$result = $stmt->get_result();