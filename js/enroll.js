// enroll.js

$(document).ready(function() {
    // Handle "Enroll Me" button click
    $('.enroll-button').click(function() {
        var courseId = $(this).data('course');

        // Send an AJAX request to enroll the staff member in the course
        $.ajax({
            url: 'enroll.php', // Create a PHP file to handle enrollment
            method: 'POST',
            data: { courseId: courseId },
            success: function(response) {
                // Handle the response (e.g., show a success message)
                if (response === 'success') {
                    alert('Enrollment successful!');
                } else {
                    alert('Enrollment failed. Please try again.');
                }
            },
            error: function() {
                alert('Error occurred while enrolling. Please try again later.');
            }
        });
    });
});
