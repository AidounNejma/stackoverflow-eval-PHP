$(document).ready(function () {

    // function pour ajouter un commentaire
    function addNewComment(event) {
        
        event.preventDefault();

            const form = $('.formAjax')
            const answerContent = $('textarea').val().trim();
            const questionId = $('.formAjax').data('id');

            console.log(questionId)
           /*  console.log(answerContent) */
        
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
                <div class="">
                    <div class="nodrag">
                        <button type="button" class="btn btn-">${answerContent}</button>
                    </div>
                </div>      
            `;

                    // j'ajoute le commentaire
                    $(form).after(newAnswer);
                    // je vide l'input
                    $(form).val('');
                })
                ;

        
    }

    // event pour ajouter une cards
    $('.btnSubmit').click(addNewComment);

});   