<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universities in United States</title>

</head>
<body>
    @include('layouts.header')
    <h1>Universities in United States</h1>

    <!-- University Data Table -->
    <table id="universityTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>University Name</th>
                <th>Country</th>
                <th>Website</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($data) && is_array($data))
                @foreach ($data as $index => $university)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $university['name'] }}</td>
                        <td>{{ $university['country'] }}</td>
                        <td><a href="{{ $university['web_pages'][0] }}" target="_blank">Visit Website</a></td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">No data available</td>
                </tr>
            @endif
        </tbody>
    </table>
    @include('layouts.footer')
    
    <!-- You can include DataTables or other styling libraries here -->
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            // Initialize DataTables for the table with ID universityTable
            $('#universityTable').DataTable();
        });
    </script>

</body>
</html>
