//Add Plan Start
$(document).ready(function() {
    var planCount = 1;

    $('#addPlan').click(function() {
        planCount++;

        var newPlanField = '<div class="form-group mb-2 plan-group">';
        newPlanField += '<div><label>Plan ' + planCount + '</label> <button type="button" class="btn btn-danger delete-plan">Delete</button></div>';
        newPlanField += '<label>Enter Plan</label>';
        newPlanField += '<input type="text" class="form-control" name="add_plans['+planCount+'][add_plans]">';
        newPlanField += '</div>';

        $('#planFields').append(newPlanField);
    });

    // Event delegation for dynamically added delete buttons
    $('#planFields').on('click', '.delete-plan', function() {
        $(this).closest('.plan-group').remove();
        planCount--; // Decrement planCount
        // Update plan numbers
        $('.plan-group').each(function(index) {
            $(this).find('label:first').text('Plan ' + (index + 1));
        });
    });
});

//Add Plan End

