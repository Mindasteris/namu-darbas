<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSS -->
        @vite(['resources/js/app.js'])

        <title>Test Task</title>
    </head>
    <body>
        <div class="container mx-auto p-8">
            {{-- <pre>{{ print_r($data, true) }}</pre> --}}

            <h1 class="my-8 text-center text-3xl">Drivers Table (Expenses)</h1>

            {{-- Table --}}
            <div class="relative overscroll-x-auto">
                <table>
                    <thead>
                        <tr>
                            @foreach ($headings as $heading)
                                <th>{{ $heading }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($expenses as $index => $expense)
                            <tr>
                                <td class="font-medium">{{ $expense }}</td>
                                <td>{{ number_format($amount[$index], 2) }}</td>
                                <td>{{ number_format($driver1[$index], 2) }}</td>
                                <td>{{ number_format($driver2[$index], 2) }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="text-right font-medium">Total:</td>
                            <td>{{ $amountTotal }}</td>
                            <td>{{ number_format($driver1Total, 2) }}</td>
                            <td>{{ number_format($driver2Total, 2) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>