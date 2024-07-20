<!DOCTYPE html>
<html>

<head>
    <title>Election Results</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .section {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="my-4">Election Results</h1>
        <div class="btn-group mb-4">
            <button class="mr-2 btn btn-primary" id="show-polling-unit">Polling Unit Results</button>
            <button class="mr-2 btn btn-primary" id="show-lga-results">LGA Results</button>
            <button class="mr-2 btn btn-primary" id="show-new-results">Enter New Results</button>
        </div>

        <!-- Card -->
        <div class="card mb-5">
            <!-- Individual Polling Unit Results Section -->
            <div id="polling-unit-section" class="section m-4">
                <h4>Individual Polling Unit Results</h4>
                <form id="polling-unit-form">
                    @csrf
                    <div class="form-group">
                        <label for="polling_unit_uniqueid">Polling Unit Unique ID:</label>
                        <input type="number" class="form-control" id="polling_unit_uniqueid"
                            name="polling_unit_uniqueid" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Get Results</button>
                </form>
                <div id="polling-unit-results" class="mt-4"></div>
            </div>

            <!-- LGA Summed Results Section -->
            <div id="lga-results-section" class="section m-4">
                <h4>LGA Summed Results</h4>
                <form id="lga-results-form">
                    @csrf
                    <div class="form-group">
                        <label for="lga_id">Local Government Area:</label>
                        <select class="form-control" id="lga_id" name="lga_id" required>
                            <option value="">-- Select LGA --</option>
                            @foreach ($lgas as $lga)
                                <option value="{{ $lga->lga_id }}">{{ $lga->lga_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Get Results</button>
                </form>
                <div id="lga-results" class="mt-4"></div>
            </div>

            <!-- Enter New Polling Unit Results Section -->
            <div id="new-results-section" class="section m-4">
                <h4>Enter New Polling Unit Results</h4>
                <form id="new-results-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="polling_unit_number">Polling Unit Number:</label>
                                <input type="text" class="form-control" id="polling_unit_number"
                                    name="polling_unit_number" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="polling_unit_name">Polling Unit Name:</label>
                                <input type="text" class="form-control" id="polling_unit_name"
                                    name="polling_unit_name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="polling_unit_description">Polling Unit Description:</label>
                                <input type="text" class="form-control" id="polling_unit_description"
                                    name="polling_unit_description" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ward_id">Ward ID:</label>
                                <input type="number" class="form-control" id="ward_id" name="ward_id" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lga_id">LGA ID:</label>
                                <input type="number" class="form-control" id="lga_id" name="lga_id" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="entered_by_user">Entered by User:</label>
                                <select class="form-control" id="entered_by_user" name="entered_by_user" required>
                                    <option value="">-- Select Name --</option>
                                    @foreach ($agentnames as $name)
                                        <option value="{{ $name->firstname }} {{ $name->lastname }}">
                                            {{ $name->firstname }} {{ $name->lastname }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="PDP">PDP:</label>
                                <input type="number" class="form-control" id="PDP" name="PDP" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="DPP">DPP:</label>
                                <input type="number" class="form-control" id="DPP" name="DPP" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ACN">ACN:</label>
                                <input type="number" class="form-control" id="ACN" name="ACN" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="PPA">PPA:</label>
                                <input type="number" class="form-control" id="PPA" name="PPA" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="CDC">CDC:</label>
                                <input type="number" class="form-control" id="CDC" name="CDC" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="JP">JP:</label>
                                <input type="number" class="form-control" id="JP" name="JP" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ANPP">ANPP:</label>
                                <input type="number" class="form-control" id="ANPP" name="ANPP" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="LABOUR">LABOUR:</label>
                                <input type="number" class="form-control" id="LABOUR" name="LABOUR" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="CPP">CPP:</label>
                                <input type="number" class="form-control" id="CPP" name="CPP" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Results</button>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // Show/Hide Sections
            $('#show-polling-unit').click(function() {
                $('.section').hide();
                $('#polling-unit-section').show();
            });

            $('#show-lga-results').click(function() {
                $('.section').hide();
                $('#lga-results-section').show();
            });

            $('#show-new-results').click(function() {
                $('.section').hide();
                $('#new-results-section').show();
            });

            // Handle Polling Unit Form Submission
            $('#polling-unit-form').submit(function(event) {
                event.preventDefault();
                $.ajax({
                    url: '/polling-unit/' + $('#polling_unit_uniqueid').val(),
                    method: 'GET',
                    success: function(response) {
                        if (response.length > 0) {
                            var resultsHtml = '<h3>Results</h3>';
                            resultsHtml += '<table class="table table-sm table-bordered"><thead><tr><th>Party</th><th>Score</th></tr></thead><tbody>';
                            $.each(response, function(index, result) {
                                resultsHtml += '<tr><td>' + result.party_abbreviation + '</td><td>' + result.total_score + '</td></tr>';
                            });
                            resultsHtml += '</tbody></table>';
                            $('#polling-unit-results').html(resultsHtml);
                        } else {
                            $('#polling-unit-results').html('<h5>The ID you entered does not exist. Try another ID.</h5>');
                        }
                    }
                });
            });

            // Handle LGA Results Form Submission
            $('#lga-results-form').submit(function (event) {
                event.preventDefault();
                $.ajax({
                    url: '/lga-results',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function (response) {
                        let resultsHtml = '';

                        // Check for errors
                        if (response.error) {
                            resultsHtml = '<p class="text-danger">' + response.error + '</p>';
                        } else {
                            // Start a new row for every two polling units
                            let rowOpen = false;

                            // Loop over polling units
                            for (const pollingUnitName in response) {
                                if (!rowOpen) {
                                    resultsHtml += '<div class="row">'; 
                                    rowOpen = true;
                                }

                                // Create a column for this polling unit (half the row width)
                                resultsHtml += '<div class="col-md-6">';
                                resultsHtml += '<h4>' + pollingUnitName + '</h4>';
                                resultsHtml += '<table class="table table-bordered table-sm"><thead><tr><th>Party</th><th>Score</th></tr></thead><tbody>'; // Added table-sm for smaller table

                                // Loop over results for the current polling unit
                                $.each(response[pollingUnitName], function (index, result) {
                                    resultsHtml += '<tr><td>' + result.party_abbreviation + '</td><td>' + result.party_score + '</td></tr>';
                                });

                                resultsHtml += '</tbody></table>';
                                resultsHtml += '</div>'; // Close the column

                                // Close the row if two polling units are displayed
                                if (rowOpen) {
                                    resultsHtml += '</div>'; // Close the row
                                    rowOpen = false;
                                }
                            }

                            // Close the last row if it's still open
                            if (rowOpen) {
                                resultsHtml += '</div>';
                            }
                        }

                        $('#lga-results').html(resultsHtml);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        // Handle errors
                        $('#lga-results').html('<p class="text-danger">An error occurred: ' + errorThrown + '</p>');
                    }
                });
            });

            // Handle New Results Form Submission
            $('#new-results-form').submit(function(event) {
                event.preventDefault();
                $.ajax({
                    url: '/polling-unit',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success) {
                            alert('Results stored successfully.');
                            $('#new-results-form')[0].reset();
                        } else {
                            alert('Error storing results. Please try again.');
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>
