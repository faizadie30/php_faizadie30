<?php

$jml = empty($_GET['jml']) ? 0 : $_GET['jml'];
if ($jml > 0) {
    echo "<table border=1>\n";
    for ($a = $jml; $a > 0; $a--) {
        $rowData = '';
        $resultTotal = [];
        for ($b = $a; $b > 0; $b--) {
            array_push($resultTotal, $b);
            $rowData .= "<td>$b</td>";
        }
        echo "<tr><td colspan=" . "$a" . "> Result: <b>" . array_sum($resultTotal) . "</b></td></tr>";
        echo "<tr>\n";
        echo $rowData;
        echo "</tr>\n";
    }
    echo "</table>";
} else {
    echo "<div>wajib menggunakan parameter jml dan minimal jml adalah 1!</div>";
}
