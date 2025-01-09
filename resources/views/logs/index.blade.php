@include('header')
<br/><br/>
<table id="users-table" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Method</th>
                <th>Url</th>
                <th>Status Code</th>
                <th>Created At</th>
                <th>Response Time</th>
            </tr>
        </thead>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('logs.data') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'method', name: 'method' },
                    { data: 'url', name: 'url' },
                    { data: 'status_code', name: 'status_code' },
                     { 
            data: 'created_at', 
            name: 'created_at',
            render: function(data, type, row) {
                if (type === 'display' || type === 'filter') {
                    // Format the date as Full Month Year, Day
                    const date = new Date(data);
                    const day = String(date.getDate()).padStart(2, '0');
                    const month = date.toLocaleString('default', { month: 'long' });
                    const year = date.getFullYear();
                    return `${month} ${day}, ${year} `;
                }
                return data; // Default output for other types (e.g., sorting)
            }
        },

         { 
            data: 'response_time', 
            name: 'response_time', 
            orderable: false, 
            searchable: false,
            render: function(data, type, row) {
                if (data !== null) {
                    return parseFloat(data).toFixed(3); // Format to 2 decimal places
                }
                return data; // Return as is if data is null or invalid
            }
         }
         ]
            });
        });
    </script>
    <!-- Footer -->
    @include('footer')
</body>
</html>
