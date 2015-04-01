$(document).ready(function(){
    $('.must-confirm').on('click', function(event){
        event.preventDefault();
        var url = $(this).attr('href');

        if (confirm('Подтверждаете?')){
            document.location.href = url;
        }
    })
})