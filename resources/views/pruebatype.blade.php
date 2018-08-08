<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="common.css">
    <script type="text/javascript" charset="utf8"
            src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.2.js"></script>
    <script type="text/javascript" charset="utf8"
            src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf8"
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
</head>
<body class="pace-top bg-white">


<div class="form-group">
    <input class="form-control typeahead twitter-typeahead" data-provide="typeahead"
           placeholder="Start typing something to search..." type="text">
</div>

<div class="form-group">
    <input class="form-control typeahead twitter-typeahead" data-provide="typeahead"
           placeholder="Start typing something to search..." type="text" id="type">
</div>
</body>
<script>
    var data =
        [{"id":"222","name":"jhon","employee_salary":"100000","employee_age":"23"},{"id":"223","name":"arpita","employee_salary":"40000","employee_age":"33"},{"id":"225","name":"pogi","employee_salary":"5646545","employee_age":"546"},{"id":"229","name":"eer","employee_salary":"0","employee_age":"0"},{"id":"232","name":"sdfadf","employee_salary":"0","employee_age":"0"},{"id":"234","name":"dfgdgd","employee_salary":"45","employee_age":"21"},{"id":"236","name":"nb","employee_salary":"0","employee_age":"0"},{"id":"237","name":"BHsdgygbfvr1bn","employee_salary":"0","employee_age":"0"},{"id":"238","name":"BHsdgygbfvr1bn","employee_salary":"0","employee_age":"0"},{"id":"239","name":"assa","employee_salary":"0","employee_age":"0"}];
    var $input = $(".typeahead");
    $input.typeahead({
        source: data,
        autoSelect: true
    });
</script>
</html>
