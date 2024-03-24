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
                <input type="file" class="form-control" name="file[]" id="file" multiple>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @if (isset($rows))
            {{-- @dump($rows) --}}
            <table class="table">

                <thead>
                    <tr>
                        <th>Date of Application</th>
                        <th>Date of Expiration</th>
                        <th>Name</th>
                        <th>Relative Person</th>
                        <th>Birth Date</th>
                        <th>Phone</th>
                        <th>Nid</th>
                        <th>Passport</th>
                        <th>Address</th>
                        <th>Description of incident</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rows as $item)
                    <tr>
                        <td>
                            {{-- Date of Application --}}
                            @if (isset($item['276']))


                                {{ strip_tags($item['276']) }}

                            @endif
                        </td>
                         <td>
                            {{-- Date of Expiration --}}
                            @if (isset($item['279']))


                                {{ strip_tags($item['279']) }}

                            @endif
                        </td>
                        <td>
                            {{-- name --}}
                            @if (isset($item['352']))
                                {{ strip_tags($item['352']) }}
                            @endif
                        </td><td>
                            {{-- relative person --}}
                            @if (isset($item['310']))
                                {{ strip_tags($item['310']) }}
                            @endif
                        </td>
                        <td>
                            {{-- birth --}}
                            @if (isset($item['287']))
                                {{ strip_tags($item['287']) }}
                            @endif
                        </td>
                        <td>
                            {{-- phone --}}
                            @if (isset($item['300']))
                                {{ strip_tags($item['300']) }}
                            @endif
                        </td>
                        <td>
                            {{-- Nid --}}
                            @if (isset($item['297']))
                                @php
                                    $bengaliText = strip_tags($item['297']);
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
                                    $digits = implode('', $matches[0]);
                                    // Output the English text
                                @endphp
                                {{ strip_tags($item['297']) }} <br>
                                {{ $digits }}
                            @endif
                        </td>
                        <td>
                            {{-- passport --}}
                            @if (isset($item['271']))
                                {{ strip_tags($item['271']) }}
                            @endif
                        </td>
                        <td>
                            {{-- address --}}
                            @if (isset($item['321']))
                                {{ strip_tags($item['321']) }}
                            @endif
                        </td>
                         <td>
                            {{-- Description --}}
                            @if (isset($item['331']))
                                {{ strip_tags($item['331']) }}
                            @endif
                        </td>
                    </tr>
                    @endforeach

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
