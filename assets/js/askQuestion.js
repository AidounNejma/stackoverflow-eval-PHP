$(document).ready(function () {

    // function pour ajouter un commentaire
    function askQuestion(event) {
        
        event.preventDefault();

            const title = $('#title').val().trim();
            const technology = $('#technology').val().trim();
            const content = $('#content').val().trim();

            // j'ajoute ma carte à la base de donnée
            $.ajax({
                method: "POST",
                url: "?page=askQuestion",
                data: { title: title, technology: technology, content: content}
            })
                // si la requête a fonctionnée, j'ajoute le commentaire au dom
                .done(function (response) {
                    // je créé une réponse
                    //console.log(response)
                    Swal.fire({
                        title: '<strong>Question sent !</strong>',
                        icon: 'success',
                        html:
                            '<a href="?page=index">Back to index</a> ',
                        showCloseButton: true,
                        showCancelButton: false,
                        focusConfirm: false,
                        showConfirmButton: false
                    })
                    // je vide l'input
                    $(content).val('');
                })
                ;

        
    }
    /* Pour supprimer la réponse avant de l'envoyer */
    function deleteAnswer(e){
        e.preventDefault;
        const answerContent = $('textarea').val();
        $(answerContent).val('');
    }

    // event pour ajouter une réponse
    $('#submitAskQuestion').click(askQuestion);

});   