<script>
    var delayInMilliseconds = 2000;

    var successMessage = document.getElementById('success-message');
    if (successMessage) {
        successMessage.style.display = 'block';

        // Hide the success message after a delay
        setTimeout(function() {
            successMessage.style.display = 'none';
        }, delayInMilliseconds);
    }
</script>