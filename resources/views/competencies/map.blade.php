@extends('layouts.app')
@section('content')
<h2 class="my-3">Mapping Competencies to Levels</h2><br>
<form action="{{ route('competencies.map') }}" method="POST">
    <select class="form-control w-50 my-3" id="levels" name="levels" onchange="levelSelected()">
        <option disabled selected>Select a level</option>
        @foreach ($levels as $level)
        <option value="{{$level->id}}">{{$level->code}}</option>
        @endforeach
    </select>

    <select class="form-control my-3 w-50" id="competencies" name="competencies">
        <option disabled selected>Select a competency</option>
    </select>

    <input type="button" class="btn btn-primary" value="Map" onclick="formSubmitted()">
</form>
<br>
<h4>Mapped competencies</h4>
<table id="table" class="table table-hover">
    <thead>
        <tr>
            <th>Level</th>
            <th>Factor</th>
            <th>Competency</th>
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
    function levelSelected() {
        let level = document.getElementById("levels").value;

        $.ajax({
            url: "{{route('competencies.list')}}",
            data: {
                'level': level
            },
            type: 'post',
            success: function(response) {
                //Populate the competencies dropdown
                console.log(response);
                var select = document.getElementById("competencies");
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
                    tr.append($("<td>").text(item.level_code));
                    tr.append($("<td>").text(item.factor_name));
                    tr.append($("<td>").text(item.competency_name));
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
        let level = document.getElementById("levels").value;
        let competency = document.getElementById("competencies").value;

        $.ajax({
            url: "{{route('competencies.mapcompetency')}}",
            data: {
                'level': level,
                'competency': competency
            },
            type: 'post',
            success: function(response) {
                //Add an alert banner to the page confirming that it worked
                var select = document.getElementById("competencies");
                var firstOption = select.options[0];

                while (select.options.length > 1) {
                    select.remove(1);
                }
                levelSelected();
                select.options[0].selected = true;

                $("#table tr:not(:first)").remove();
                var table = $("#table");
                $.each(response, function(index, item) {
                    var tr = $("<tr>");
                    tr.append($("<td>").text(item.level_code));
                    tr.append($("<td>").text(item.factor_name));
                    tr.append($("<td>").text(item.competency_name));
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


    function deleteMapping(mapId) {
        if (confirm('Are you use you want to remove the mapping ofthis competency and level?')) {
            let level = document.getElementById("levels").value;
            $.ajax({
                url: "{{route('competencies.removemapping')}}",
                data: {
                    'mapId': mapId,
                    'level': level
                },
                type: 'post',
                success: function(response) {
                    //Add an alert banner to the page confirming that delete worked, reset the dropdown options and the table
                    var select = document.getElementById("competencies");
                    var firstOption = select.options[0];

                    while (select.options.length > 1) {
                        select.remove(1);
                    }
                    levelSelected();
                    select.options[0].selected = true;

                    $("#table tr:not(:first)").remove();
                    var table = $("#table");
                    $.each(response, function(index, item) {
                        var tr = $("<tr>");
                        tr.append($("<td>").text(item.level_code));
                        tr.append($("<td>").text(item.factor_name));
                        tr.append($("<td>").text(item.competency_name));
                        //tr.append($("<td>").html('<a href="competencies/removemapping/' + item.competency_id + '"><i class="bi bi-trash"></i></a>'));
                        tr.append($("<td>").html('<a href="#" onclick="deleteMapping(' + item.competency_id + ')"><i class="bi bi-trash"></i></a>'));
                        // add more cells if necessary
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
    }
</script>