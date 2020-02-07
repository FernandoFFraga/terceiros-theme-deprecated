$('#input-busca').keyup(function() {
	//Transforma o valor dentro do input da busca em letras minusculas
    var busca = $(this).val().toLowerCase();

    //Verifica se a primeira letra é número (Usado para buscar Cpf, código, Rg, id, etc)
    if ($.isNumeric(busca.charAt(0))) {
    	$('table tbody').find('tr').each(function() {
	        var cel = $(this).find('td.busca-numero').text();
	        var contido = cel.toLowerCase().indexOf(busca) >= 0;
	        $(this).css('display', contido ? '' : 'none');
	    });

	//Busca por letras (Usado para buscar, nome, descrição, etc).
    } else {
    	$('table tbody').find('tr').each(function() {
	        var cel = $(this).find('td.busca-letra').text();
	        var contido = cel.toLowerCase().indexOf(busca) >= 0;
	        $(this).css('display', contido ? '' : 'none');
	    });
    }
});