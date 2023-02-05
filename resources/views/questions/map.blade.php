@extends('layouts.app')
@section('content')
<h2 class="my-3">Mapping Questions to Competencies</h2><br>
<div id="alert-container"></div>
<form action="{{ route('competencies.map') }}" method="POST">
    <select class="form-control w-50 my-3" id="competency" name="competency" onchange="competencySelected()">
        <option disabled selected value="0">Select a competency</option>
        @foreach ($competencies as $competency)
        <option value="{{$competency->id}}" {{ request()->input('id') == $competency->id ? 'selected' : '' }}>{{$competency->name}}</option>

        <!--<option value="{{$competency->id}}">{{$competency->name}}</option>-->
        @endforeach
    </select>

    <select class="form-control my-3 w-50" id="question" name="question">
        <option disabled selected>Select a question</option>
    </select>

    <input type="button" class="btn btn-primary" value="Map" onclick="formSubmitted()">
</form>
<br>
<h4>Mapped questions</h4>
<table id="table" class="table table-hover">
    <thead>
        <tr>
            <th>Factor</th>    
            <th>Competency</th>
            <th>Question</th>
            <th>Remove mapping</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
@endsection
</body>

</html>
@include('scripts.ajax')
<script async defer>
//When document is ready, check if value of competency is greater than zero. If it is, then call competencySelected()
window.onload = function() {
    let competency = document.getElementById("competency").value;
    if (competency > 0) competencySelected();
};


    function competencySelected() {
        let competency = document.getElementById("competency").value;

        $.ajax({
            url: "{{route('questions.list')}}",
            data: {
                'competency': competency
            },
            type: 'post',
            success: function(response) {
                //Populate the competencies dropdown
                /*$('#alert-container').html('<div class="alert alert-success w-50">Table updated</div>');
                setTimeout(function() {
                  $('.alert').fadeOut();
                }, 3000);*/
                console.log(response);

                var select = document.getElementById("question");
                var firstOption = select.options[0];
                while (select.options.length > 1) {
                    select.remove(1);
                }
                response[0].forEach(row => {
                    var option = document.createElement("option");
                    option.text = row.name;
                    option.value = row.id;
                    select.add(option);
                });

                //Populate the table with existing mapped competencies
                $("#table tr:not(:first)").remove();
                var table = $("#table");
                $.each(response[1], function(index, item) {
                    var tr = $("<tr>");
                    tr.append($("<td>").text(item.factor_name));
                    tr.append($("<td>").text(item.competency_name));
                    tr.append($("<td>").text(item.question));
                    //tr.append($("<td>").html('<a href="competencies/removemapping/' + item.competency_id + '"><i class="bi bi-trash"></i></a>'));
                    tr.append($("<td>").html('<a href="#" onclick="deleteMapping(' + item.mapping_id + ')"><i class="bi bi-trash"></i></a>'));
                    table.append(tr);
                });
            },
            statusCode: {
                404: function(response) {
                    console.log(response);
                }
            },
            error: function(x, xs, xt) {
                console.log(x);
            }
        });
    }


    function formSubmitted() {
        let competency = document.getElementById("competency").value;
        let question = document.getElementById("question").value;

        $.ajax({
            url: "{{route('questions.mapquestion')}}",
            data: {
                'competency': competency,
                'question': question
            },
            type: 'post',
            success: function(response) {
                //Add an alert banner to the page confirming that it worked
                var select = document.getElementById("question");
                var firstOption = select.options[0];

                while (select.options.length > 1) {
                    select.remove(1);
                }
                competencySelected();
                select.options[0].selected = true;

                $("#table tr:not(:first)").remove();
                var table = $("#table");
                $.each(response, function(index, item) {
                    var tr = $("<tr>");
                    tr.append($("<td>").text(item.factor_name));
                    tr.append($("<td>").text(item.competency_name));
                    tr.append($("<td>").text(item.question));
                    tr.append($("<td>").html('<a href="#" onclick="deleteMapping(' + item.mapping_id + ')"><i class="bi bi-trash"></i></a>'));
                    table.append(tr);
                });
                displayMessage('Question successfully mapped!');
            },
            statusCode: {
                404: function(response) {
                    console.log(response);
                }
            },
            error: function(x, xs, xt) {
                console.log(x);
            }
        });
    }


    function deleteMapping(mapId) {
        if (confirm('Are you use you want to remove the mapping between this competency and question?')) {
            let competency = document.getElementById("competency").value;
            $.ajax({
                url: "{{route('questions.removemapping')}}",
                data: {
                    'mapId': mapId,
                    'competency': competency
                },
                type: 'post',
                success: function(response) {
                    //Add an alert banner to the page confirming that delete worked, reset the dropdown options and the table
                    var select = document.getElementById("question");
                    var firstOption = select.options[0];

                    while (select.options.length > 1) {
                        select.remove(1);
                    }
                    competencySelected();
                    select.options[0].selected = true;

                    $("#table tr:not(:first)").remove();
                    var table = $("#table");
                    $.each(response, function(index, item) {
                        var tr = $("<tr>");
                        tr.append($("<td>").text(item.factor_name));
                        tr.append($("<td>").text(item.competency_name));
                        tr.append($("<td>").text(item.question));
                        tr.append($("<td>").html('<a href="#" onclick="deleteMapping(' + item.mapping_id + ')"><i class="bi bi-trash"></i></a>'));
                        table.append(tr);
                    });
                    displayMessage("Mapping successfully deleted.")
                },
                statusCode: {
                    404: function(response) {
                        console.log(response);
                    }
                },
                error: function(x, xs, xt) {
                    console.log(x);
                }
            });
        }
    }

    function displayMessage(message)
    {
        $("#alert-container").text('');
        $('#alert-container').html('<div class="alert alert-success w-50">' + message + '</div>');
        setTimeout(function() {
            $('.alert').slideUp();
        }, 3000);
    }
</script>