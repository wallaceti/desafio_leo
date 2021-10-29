$(function ()
{
    // Primeiro acesso ?
    if (getCookie('visited') !== 'Y') {

        setCookie('visited', 'Y')

        $("#modal-first-access").modal('show');

    }

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