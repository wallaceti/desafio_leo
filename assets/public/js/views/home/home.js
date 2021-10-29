$(function ()
{
    // Primeiro acesso ?
    if (getCookie('visited') !== 'Y') {

        setCookie('visited', 'Y')

        $("#modal-first-access").modal('show');

    }

    // Atualiza o curso.
    $('.edit-course').on('click', function(){

        let baseUrl = $('#baseUrlPath').val();

        $.ajax({
            type: 'get',
            dataType: 'json',
            url: $('#baseUrlPath').val() + 'courses/read/' + $(this).attr('data-id'),
            success: function(response)
            {
                $('#update-id').val(response.id);
                $('#update-title').val(response.title);
                $('#update-description').val(response.description);
                $('#update-link').val(response.link);

                $('#form-delete').attr('action', baseUrl + 'courses/delete/' + response.id);

                $("#modalEditCourse").modal('show');

            }

        });

    });

});

function setCookie(cookieKey, cookieValue)
{
    let expiryDate = '';

    const date = new Date();

    date.setHours(date.getHours() + 48);

    expiryDate = `; expiryDate=" ${date.toUTCString()}`;

    document.cookie = `${cookieKey}=${cookieValue || ''}${expiryDate}; path=/`;

}

function getCookie(cookieKey)
{
    let cookieName = `${cookieKey}=`;

    let cookieArray = document.cookie.split(';');

    for (let cookie of cookieArray) {

        while (cookie.charAt(0) == ' ') {
            cookie = cookie.substring(1, cookie.length);
        }

        if (cookie.indexOf(cookieName) == 0) {
            return cookie.substring(cookieName.length, cookie.length);
        }

    }

}