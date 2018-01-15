var deleteAccountButton = document.getElementById('delete-button');

deleteAccountButton.addEventListener('click', function () {
    document.getElementById('eliminar-producto-form').submit();
    return false;
});
