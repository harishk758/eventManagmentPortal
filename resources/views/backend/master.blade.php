<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Event Portal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}" />
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('assets/css/table.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    {{-- datatable start --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
  
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- 
    
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/v/dt/dt-2.2.2/datatables.min.js"></script> --}}
{{-- datatable end --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.9.0/additional-methods.min.js"></script>
        <script>
            $(document).ready(function() {

                $.validator.addMethod("regex", function(value, element, regexpr) {
                    return regexpr.test(value);
                }, "Please enter a valid value.");
    
                $.validator.addMethod("notWhitespaceOnly", function(value, element) {
                    return $.trim(value).length !== 0;
                }, "Please enter valid value.");
    
                $.validator.addMethod("noSpecialChars", function(value, element) {
                    return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value);
                }, "This field should not contain special characters.");
    
                $.validator.addMethod("notCalculation", function(value, element) {
                    return this.optional(element) || !/^[\d+\-*/=]+$/.test(value);
                }, "This field should not be a calculation.");
    
                $.validator.addMethod("noSpecialCharsForMail", function(value, element) {
                    return this.optional(element) || /^[a-zA-Z0-9@\s]+$/.test(value);
                }, "Mail cannot contain special characters.");
    
                $.validator.addMethod("noSpecialCharsForURL", function(value, element) {
                    return this.optional(element) || /^[a-zA-Z0-9:/@\s]+$/.test(value);
                }, "URL cannot contain special characters.");
    
                $.validator.addMethod("noLeadingOrTrailingSpaces", function(value, element) {
                    var regex = /^\s|\s$/;
                    return this.optional(element) || !regex.test(value);
                }, "Spaces at the beginning or end are not allowed.");
    
                $.validator.addMethod("noSpecialCharsForAddress", function(value, element) {
                    return this.optional(element) || /^[a-zA-Z0-9,/-\s]+$/.test(value);
                }, "Address cannot contain special characters.");
    
                $.validator.addMethod("noSpecialCharsForCompanyName", function(value, element) {
                    return this.optional(element) || /^[a-zA-Z0-9.&,/-\s]+$/.test(value);
                }, "Address cannot contain special characters.");
    
                $.validator.addMethod("noSpecialCharsForExperience", function(value, element) {
                    return this.optional(element) || /^[a-zA-z0-9.,/-\s]+$/.test(value);
                }, "Please enter valid experience.");
    
                $.validator.addMethod("noSpecialCharsForNoticeperiod", function(value, element) {
                    return this.optional(element) || /^[a-zA-z0-9.,/-\s]+$/.test(value);
                }, "Please check special character.");
                $.validator.addMethod("notOnlyNumbers", function(value, element) {
                    return this.optional(element) || /[^\d]/.test(value);
                }, "Only Number Not Allowed.");
    
            });
        </script>
</head>

<body class="body_wrapper">
    <!-- HEADER -->
    @include('backend.layouts.header')
    <!-- SIDEBAR -->
    @include('backend.layouts.sidebar')
    <!-- MAIN SCREEN -->
    @yield('content')
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/jquery.min.js') }}"></script> --}}
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    {{-- <script src="./assets/js/custom.js"></script> --}}
    <script src="{{ asset('assets/js/main.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script> --}}

<script>
     new DataTable('#example');
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
