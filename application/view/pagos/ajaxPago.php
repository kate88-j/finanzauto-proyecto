<script>

// TODO - $(document).ready function
$(document).ready( function() {
    var restanteFijo = document.getElementById("txtValorRestante").value;
    sessionStorage.setItem('restanteFijo', restanteFijo);

    document.getElementById("txtAbono").setAttribute("min", 0);
    document.getElementById("txtAbono").setAttribute("max", restanteFijo);
});


function restante(value){

    /* https://es.stackoverflow.com/questions/181532/c%C3%B3mo-mantener-el-valor-de-una-variable-de-javascript-al-actualizar-la-p%C3%A1gina */

    if(!isNaN(value) && value < 1){

        let restanteFijo = sessionStorage.getItem('restanteFijo');
        document.getElementById("txtValorRestante").value = restanteFijo;

    }else{

        let restanteFijo = sessionStorage.getItem('restanteFijo');

        let result = restanteFijo - value;
        document.getElementById("txtValorRestante").value = result;

    }

}

</script>