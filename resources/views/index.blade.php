<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css" />
    <style>
        #datatable_wrapper>.dt-buttons {
            display: inline;
        }


        #datatable_wrapper>.dt-buttons>.dt-button {
            border: 1px solid #2d2d2d;
            padding: 3px 5px;
            border-radius: 5px;
        }
    </style>
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

        <form action="{{ url('store_data') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if (isset($rows))
                @if (session()->has('success'))
                    <span class="alert alert-success">{{ session('success') }}</span>
                @endif
                <div class="d-flex flex-row-reverse bd-highlight">
                    <div class="p-2 bd-highlight">
                        <button type="submit" class="btn-success">Excel Download</button>
                    </div>

                </div>



                <table id="datatable" class="table">

                    <thead>
                        <tr>
                            <th>SL</th>
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
                        @foreach ($rows as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    {{-- Date of Application --}}
                                    @if (isset($item['276']))
                                        {{ strip_tags($item['276']) }}
                                        <input type="hidden" name="application_date[]" value="{{ strip_tags($item['276']) }}" id="">
                                    @endif
                                </td>
                                <td>
                                    {{-- Date of Expiration --}}
                                    @if (isset($item['279']))
                                        {{ strip_tags($item['279']) }}
                                        <input type="hidden" name="Expiration_date[]" value="{{ strip_tags($item['279']) }}" id="">
                                    @endif
                                </td>
                                <td>
                                    {{-- name --}}
                                    @if (isset($item['352']))
                                        {{ strip_tags($item['352']) }}
                                        <input type="hidden" name="name[]" value="{{ strip_tags($item['352']) }}" id="">
                                    @endif
                                </td>
                                <td>
                                    {{-- relative person --}}
                                    @if (isset($item['310']))
                                        {{ strip_tags($item['310']) }}
                                        <input type="hidden" name="relative_name[]" value="{{ strip_tags($item['310']) }}" id="">
                                    @endif
                                </td>
                                <td>
                                    {{-- birth --}}
                                    @if (isset($item['287']))
                                        {{ strip_tags($item['287']) }}
                                        <input type="hidden" name="birth_day[]" value="{{ strip_tags($item['287']) }}" id="">
                                    @endif
                                </td>
                                <td>
                                    {{-- phone --}}
                                    @if (isset($item['300']))
                                        {{ strip_tags($item['300']) }}
                                        <input type="hidden" name="phone[]" value="{{ strip_tags($item['300']) }}" id="">
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
                                        <input type="hidden" name="nid[]" value="{{ $digits }}" id="">
                                    @endif
                                </td>
                                <td>
                                    {{-- passport --}}
                                    @if (isset($item['271']))
                                        {{ strip_tags($item['271']) }}
                                        <input type="hidden" name="passport[]" value="{{ strip_tags($item['271']) }}" id="">
                                    @endif
                                </td>
                                <td>
                                    {{-- address --}}
                                    @if (isset($item['321']))
                                        {{ strip_tags($item['321']) }}
                                        <input type="hidden" name="address[]" value="{{ strip_tags($item['321']) }}" id="">
                                    @endif
                                </td>
                                <td>
                                    {{-- Description --}}
                                    @if (isset($item['331']))
                                        {{ strip_tags($item['331']) }}
                                        <input type="hidden" name="description[]" value="{{ strip_tags($item['331']) }}" id="">
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
        </form>
    </div>





    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
    <script type="text/javascript" s rc="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.j s"></script>
    <script type="text/javascript" s rc="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.butto ns.min.js"></script>
    <script type="text/javascript" s rc="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min .js"></script>
    <script type="text/javascript" s rc="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmak e.min.js"></script>
    <script type="text/javascript" s rc="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fo nts.js"></script>
    <script type="text/javascript" s rc="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.mi n.js"></script>
    <script type="text/javascript" s rc="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.mi n.js"></script>

    <script>
        $(document).ready(function() {
            $('table#datatable').DataTable({

                dom: 'Bfrtip',
                buttons: [{
                        extend: 'copyHtml5',
                        text: '<i class="fa fa-files-o text-secondary"></i>',
                        titleAttr: 'Copy'
                    }

                    ,
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fa fa-file-excel-o text-success"></i>',
                        titleAttr: 'Excel'
                    }

                    ,
                    {
                        extend: 'csvHtml5',
                        text: '<i c lass="fa fa-file-text-o text-primary"></i>',
                        titleAttr: 'CSV'
                    }

                    ,
                    {
                        extend: 'pdfHtml5',
                        text: '<i clas s="fa fa-file-pdf-o text-danger"></i>',
                        titleAttr: 'PDF'
                    }

                ],


            });
        });
    </script>
</body>

</html>
