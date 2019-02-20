window.addEventListener('DOMContentLoaded', function()
{
  var $myDatepicker = document.querySelector('input[name="date_legals"]');

	$myDatepicker.DatePickerX.init({
		mondayFirst      : true,
		format           : 'yyyy/mm/dd',
		minDate          : new Date(),
		maxDate          : new Date(9999, 11, 31),
		weekDayLabels    : ['Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa', 'Do'],
		shortMonthLabels : ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
		singleMonthLabels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		todayButton      : true,
		todayButtonLabel : 'Hoy',
		clearButton      : true,
		clearButtonLabel : 'Borrar'
	});

});
