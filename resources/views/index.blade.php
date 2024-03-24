<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Excel import</title>
</head>

<body>
    <div class="container">
        <h1> Txt File to excel file Download</h1>
        <form action="{{ url('store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="file" class="form-label">File</label>
                <input type="file" class="form-control" name="file" id="file">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @if (isset($rows))
        {{-- @dump($rows) --}}
        <table class="table">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Passport</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        @if (isset($rows['310']))
                          {{ strip_tags($rows['310']) }}
                        @endif
                    </td>
                    <td>
                        @if (isset($rows['300']))
                           {{ strip_tags($rows['300']) }}
                        @endif
                    </td>
                    <td>
                        @if (isset($rows['271']))
                          {{ strip_tags($rows['271']) }}
                        @endif
                    </td>
                    <td>
                        @if (isset($rows['321']))
                           {{ strip_tags($rows['321']) }}
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
        {{-- @dd($rows) --}}



        {{-- @foreach ($rows as $row)

            @if (count($data) == 10)
                @php
                    $bengaliText = $data['9'];

                    // Define an array mapping Bengali digits to English digits
                    $digitsMap = [
                        '০' => '0',
                        '১' => '1',
                        '২' => '2',
                        '৩' => '3',
                        '৪' => '4',
                        '৫' => '5',
                        '৬' => '6',
                        '৭' => '7',
                        '৮' => '8',
                        '৯' => '9',
                    ];

                    // Replace Bengali digits with English digits
                    $englishText = strtr($bengaliText, $digitsMap);
                    // Extract only digits using regular expression
                    preg_match_all('/\d/', $englishText, $matches);
                    $Digits = implode('', $matches[0]);
                    // Output the English text
                    dd($Digits);
                @endphp
            @endif
        @endforeach --}}
    @endif
    </div>





    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
