$(document).ready(function () {

    // function pour ajouter un commentaire
    function deleteAnswer(event) {

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
                // je supprime ma réponse de la base de données
                $.ajax({
                    method: "POST",
                    url: "?page=deleteAnswer",
                    data: { id: id }
                })
                    .done(function (response) {
                        // je créé une réponse
                        console.log(response)
                        Swal.fire(
                            'Deleted!',
                            'Answer has been deleted.',
                            'success'
                        )
                        setTimeout(function () {
                            location.reload();
                        }, 3000);
                    });
            }
        })

    }

    function editAnswer(event) {

        event.preventDefault();
        const id = $(this).attr("data-id")

        Swal.fire({
            title: 'Edit the status',
            input: 'select',
            inputAttributes: {
                autocapitalize: 'off'
            },
            inputOptions: {
                published: 'published',
                moderate: 'moderate',
            },
            showCancelButton: true,
            confirmButtonText: 'Edit',
            showLoaderOnConfirm: true,
            inputValidator: (value) => {
                $.ajax({
                    method: "POST",
                    url: "?page=editAnswer",
                    data: { id: id, status: value}
                })
                    .done(function (response) {
                        //console.log(response)
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
    $('.deleteAnswer').click(deleteAnswer);
    // event pour éditer une réponse
    $('.editAnswer').click(editAnswer);
});