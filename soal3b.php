<?php
include 'soal3a.php';

$nama_filter = '';
$alamat_filter = '';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!empty($_GET['nama'])) {
        $nama_filter = $_GET['nama'];
    }
    if (!empty($_GET['alamat'])) {
        $alamat_filter = $_GET['alamat'];
    }
}

$sql = "SELECT person.nama, person.alamat, hobi.hobi
        FROM person
        LEFT JOIN hobi ON person.id = hobi.person_id
        WHERE person.nama LIKE ? AND person.alamat LIKE ?";

$stmt = $conn->prepare($sql);
$nama_param = '%' . $nama_filter . '%';
$alamat_param = '%' . $alamat_filter . '%';
$stmt->bind_param('ss', $nama_param, $alamat_param);

$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>

<head>
    <title>List Person</title>
</head>

<body>

    <h2>Filter Data</h2>
    <form method="get" action="soal3b.php">
        Nama: <input type="text" name="nama" value="<?php echo @htmlspecialchars($nama_filter); ?>">
        Alamat: <input type="text" name="alamat" value="<?php echo @htmlspecialchars($alamat_filter); ?>">
        <input type="submit" value="Filter">
    </form>

    <h2>List Data</h2>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Hobi</th>
        </tr>

        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars(!empty($row['nama']) ? $row['nama'] : '-') . "</td>";
            echo "<td>" . htmlspecialchars(!empty($row['alamat']) ? $row['alamat'] : '-') . "</td>";
            echo "<td>" . htmlspecialchars(!empty($row['hobi']) ? $row['hobi'] : '-') . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <?php
    $conn->close();
    ?>

</body>

</html>