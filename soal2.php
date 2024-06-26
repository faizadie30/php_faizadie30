<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Wizard | Soal 2</title>
</head>

<body>
    <input type="hidden" value="step_name" id="step">

    <form id="form" style="display:block">
        <div id="content_name" style="display:none">
            <span>Nama Anda:</span> <input type="text" placeholder="masukan nama anda" id="nama">
        </div>
        <div id="content_umur" style="display:none">
            <span>Umur Anda:</span> <input type="number" placeholder="masukan umur anda" id="umur">
        </div>
        <div id="content_hobi" style="display:none">
            <span>Hobi Anda:</span> <input type="text" placeholder="masukan hobi anda" id="hobi">
        </div>
        <br>
        <button type="button" id="submit">Submit</button>
    </form>

    <div id="result" style="display:none">
        <table>
            <tr>
                <td>Nama:</td>
                <td id="result_nama">jhon doe</td>
            </tr>
            <tr>
                <td>Umur:</td>
                <td id="result_umur">xx</td>
            </tr>
            <tr>
                <td>Hobi:</td>
                <td id="result_hobi">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, nesciunt.
                </td>
            </tr>
        </table>
        <button type="button" id="reset">Reset</button>
    </div>

    <script>
        const stepProgressForm = document.getElementById("step");
        const content_form = document.getElementById("form");
        const content_result = document.getElementById("result");
        const contentNama = document.getElementById("content_name");
        const contentUmur = document.getElementById("content_umur");
        const contentHobi = document.getElementById("content_hobi");
        const fieldNama = document.getElementById("nama");
        const fieldUmur = document.getElementById("umur");
        const fieldHobi = document.getElementById("hobi");
        const resultNama = document.getElementById("result_nama");
        const resultUmur = document.getElementById("result_umur");
        const resultHobi = document.getElementById("result_hobi");

        contentNama.style.display = 'block';

        document.getElementById('submit').addEventListener("click", () => {
            if (stepProgressForm.value == 'step_name') {
                if (!fieldNama.value) {
                    return alert("Nama wajib di isi!");
                } else {
                    stepProgressForm.value = 'step_umur';
                    contentNama.style.display = 'none';
                    contentUmur.style.display = 'block';
                    return false;
                }
            }

            if (stepProgressForm.value == 'step_umur') {
                if (!fieldUmur.value) {
                    return alert("Umur wajib di isi!");
                } else {
                    stepProgressForm.value = 'step_hobi';
                    contentUmur.style.display = 'none';
                    contentHobi.style.display = 'block';
                    return false;

                }
            }

            if (stepProgressForm.value == 'step_hobi') {
                if (!fieldHobi.value) {
                    return alert("Hobi wajib di isi!");
                } else {
                    stepProgressForm.value = 'step_result';
                    contentHobi.style.display = 'none';
                    content_form.style.display = 'none';
                    content_result.style.display = 'block';
                    resultNama.innerHTML = fieldNama.value;
                    resultUmur.innerHTML = fieldUmur.value;
                    resultHobi.innerHTML = fieldHobi.value;
                    return false;

                }
            }
        })

        document.getElementById('reset').addEventListener("click", () => {
            content_form.style.display = 'block';
            content_result.style.display = 'none';
            fieldNama.value = null;
            fieldUmur.value = null;
            fieldHobi.value = null;
            contentNama.style.display = 'block';
            contentUmur.style.display = 'none';
            contentHobi.style.display = 'none';
            resultNama.innerHTML = '';
            resultUmur.innerHTML = '';
            resultHobi.innerHTML = '';
            stepProgressForm.value = 'step_name'
        })
    </script>

</body>

</html>