<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #6c757d;
        margin: 20px;
    }

    .container {
        background-color: #ffffff; 
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .header {
        text-align: center;
        background-color: #007bff;
        color: #fff;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 8px;
    }

    .search-container {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .search-form {
        max-width: 500px;
        width: 100%;
        display: flex;
    }

    .search-input {
        flex: 1;
        border-radius: 0;
    }

    .search-button {
        border-radius: 0;
    }

    .table-container {
        margin-bottom: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    th, td {
        text-align: left;
        border: none;
        vertical-align: middle;
        padding: 12px;
    }

    th {
        background-color: #343a40;
        color: #fff;
    }

    tbody tr:hover {
        background-color: #e9ecef;
    }

    a {
        color: #007bff;
        text-decoration: none;
    }

    .footer {
        text-align: center;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        position: fixed;
        bottom: 0;
        width: 100%;
        border-radius: 8px;
    }
</style>

</head>
<body>

<div class="container">
    <div class="header">
        <h2>Data Mahasiswa</h2>
    </div>

    <div class="search-container">
        <form class="search-form" action="#" method="get">
            <input type="text" class="form-control search-input" placeholder="Cari Mahasiswa" name="search" id="searchInput">
            <button class="btn btn-primary search-button" type="button" onclick="searchData()">Cari</button>
        </form>
    </div>

    <div class="table-container">
        <table class="table table-bordered table-striped" id="dataTable">
            <thead class="thead-dark">
                <tr>
                    <th>Text</th>
                    <th>Link</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $url = "https://api-frontend.kemdikbud.go.id/hit_mhs/abiel%20zulio%20maseid";

            $data = file_get_contents($url);
            $result = json_decode($data, true);

            foreach ($result['mahasiswa'] as $mahasiswa) {
               
                echo '<td>' . $mahasiswa['text'] . '</td>';
                echo '<td><a href="' . $mahasiswa['website-link'] . '" target="_blank">' . $mahasiswa['website-link'] . '</a></td>';
                echo '</tr>';
            }
            ?>

            </tbody>
        </table>
    </div>
</div>

<div class="footer">
    &copy; 2023 Data Mahasiswa
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function searchData() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("dataTable");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>

</body>
</html>
