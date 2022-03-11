$(document).ready(function () {

    // function pour ajouter un commentaire
    function addNewComment(event) {
        
        event.preventDefault();

            const form = $('.formAjax');
            const answerContent = $('textarea').val().trim();
            const questionId = $('.formAjax').data('id');
            const question = $('#question');
        
            if (answerContent == "") {
                return false;
            }

            // j'ajoute ma carte à la base de donnée
            $.ajax({
                method: "POST",
                url: "?page=answer",
                data: { answerContent: answerContent, questionId: questionId}
            })
                // si la requête a fonctionnée, j'ajoute le commentaire au dom
                .done(function (response) {
                    // je créé une card
                    console.log(response)
                    const newAnswer = `
                <div class="line"></div>
                <div class="col-md-8 m-auto">
                    <p class="paragraphQuestion">${answerContent}</p>
                    <div class="d-flex justify-content-end">
                        <p>nejnej</p>
                    </div>
                </div>
            `;

                    // j'ajoute le commentaire
                    $(question).after(newAnswer);
                    // je vide l'input
                    $(answerContent).val('');
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
    $('.btnSubmit').click(addNewComment);
    $('.discard').click(deleteAnswer);

});   