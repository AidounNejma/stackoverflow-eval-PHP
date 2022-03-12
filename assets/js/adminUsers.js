$(document).ready(function () {

    // function pour ajouter un commentaire
    function deleteUser(event) {

        event.preventDefault();
        const id = $(this).attr("data-id")

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // je supprime ma question de la base de données
                $.ajax({
                    method: "POST",
                    url: "?page=deleteUser",
                    data: { id: id }
                })
                    // si la requête a fonctionnée, j'ajoute le commentaire au dom
                    .done(function (response) {
                        // je créé une réponse
                        console.log(response)
                        Swal.fire(
                            'Deleted!',
                            'User has been deleted.',
                            'success'
                        )
                        setTimeout(function () {
                            location.reload();
                        }, 3000);
                    });
            }
        })

    }

    function editUser(event) {

        event.preventDefault();
        const id = $(this).attr("data-id")

        Swal.fire({
            title: 'Edit the status',
            input: 'select',
            inputAttributes: {
                autocapitalize: 'off'
            },
            inputOptions: {
                0: "user",
                1: "admin",
            },
            showCancelButton: true,
            confirmButtonText: 'Edit',
            showLoaderOnConfirm: true,
            inputValidator: (value) => {
                $.ajax({
                    method: "POST",
                    url: "?page=editUser",
                    data: { id: id, status: value}
                })
                    // si la requête a fonctionnée, j'ajoute le commentaire au dom
                    .done(function (response) {
                        // je créé une réponse
                        console.log(response)
                        if (!response.ok) {
                            throw new Error(response.statusText)
                        }
                        return response.json()
                    })
                    .catch(error => {
                        Swal.showValidationMessage(
                            `Request failed: ${error}`
                        )
                    })
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    position: 'middle',
                    icon: 'success',
                    title: 'Status changed',
                    showConfirmButton: false,
                    timer: 1500
                })
                setTimeout(function () {
                    location.reload();
                }, 3000);
            }
        })
    }

    // event pour supprimer une réponse
    $('.deleteUser').click(deleteUser);
    // event pour éditer une réponse
    $('.editUser').click(editUser);
});