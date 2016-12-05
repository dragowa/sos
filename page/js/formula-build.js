CreateFormul = function () {
	this.numberFormula = 0;
}

CreateFormul.prototype.Create = function (idFormula = null) {
	this.idFormula = '#' + idFormula;
	this.idContainer = '.container_' + idFormula;
	this.numberFormula++;

	this
	.getFormula()
	.getMainValue()
	.BuildContainer()
	.BuildFormula()
	.leveling_width();;
}

CreateFormul.prototype.getFormula = function () {
	this.formula = $(this.idFormula).val();
	return this;
}

CreateFormul.prototype.getMainValue = function () {
	this.mainValue = this.formula.split('=')[0];
	this.formula = this.formula.split('=')[1];
	return this;
}

CreateFormul.prototype.getMultiplier = function (formula, type) {

	if (type) {
		this.numerator = formula.split('*')
	} else {
		this.denomerator = formula.split('*')
	}

	return this;
}

CreateFormul.prototype.setDivision = function (division) {
	this.division = division;
	return this;
}

CreateFormul.prototype.BuildContainer = function () {
	$(this.idContainer).html('<div class="mainValue mainValue_' + this.numberFormula + ' text-center inline">' + this.mainValue + '</div><div class="text-center is inline">=</div><div class="formula formula_' + this.numberFormula + ' inline"></div>');
	return this;
}

CreateFormul.prototype.BuildDivision = function () {

	$('.formula_' + this.numberFormula).append('<div class="numerator numerator_' + this.numberFormula + ' text-center">');
	for (var i = 0; i < this.numerator.length; i++) {
		$('.numerator_' + this.numberFormula).append('<span id="var_' + this.numerator[i] + '" class="var">' + this.numerator[i] + '</span>');
	}
	$('.formula_' + this.numberFormula).append('</div><div class="denomerator denomerator' + this.numberFormula + ' text-center">');
	for (var i = 0; i < this.denomerator.length; i++) {
		$('.denomerator_' + this.numberFormula).append('<span id="var_' + this.denomerator[i] + '" class="var">' + this.denomerator[i] + '</span>');
	}
	$('.formula_' + this.numberFormula).append('</div>');

	return this;
}

CreateFormul.prototype.BuildNoDivision = function (numerator) {

	$('.formula_' + this.numberFormula).append('<div class="denomerator denomerator_' + this.numberFormula + ' text-center">');
	for (var i = 0; i < this.denomerator.length; i++) {
		$('.denomerator_' + this.numberFormula).append('<span id="var_' + this.denomerator[i] + '" class="var">' + this.denomerator[i] + '</span>');
	}
	$('.formula_' + this.numberFormula).append('</div>');

	return this;
}

CreateFormul.prototype.BuildFormula = function () {
	var division = this.formula.split('/');

	if (division[1]) {

		this
		.setDivision(true)
		.getMultiplier(division[0], true)
		.getMultiplier(division[1], false)
		.BuildDivision()
		.leveling_height();

	} else {
		this
		.setDivision(false)
		.getMultiplier(division[0], false)
		.BuildNoDivision(division[0]);
	}

	return this;
}

CreateFormul.prototype.leveling_width = function () {

	$(this.idContainer).width(Number($('.mainValue_' + this.numberFormula).width()) + Number($('.is').width()) + Number($('.formula_' + this.numberFormula).width()) + 30);

	return this;
}

CreateFormul.prototype.leveling_height = function () {
	var height = $('.formula_' + this.numberFormula).height();
	var height_mainValue = $('.mainValue_' + this.numberFormula).height();
	var height_is = $('.is').height();

	height_mainValue = (Number(height) - Number(height_mainValue)) / 2;
	height_is =(Number(height) - Number(height_is)) / 2;

	$('.mainValue_' + this.numberFormula)
	.css('vertical-align', 'top')
	.css('padding-top', height_mainValue);

	$('.is')
	.css('vertical-align', 'top')
	.css('padding-top', height_is);

	return this;
}

// function buildFormula(multipliers) {
// 	var result = '';
// 	for (var i = 0; true; i++) {
// 		if (multipliers[i] !== undefined) {
// 			result += "<span onclick='outputFormula(" + '"' + multipliers[i]  + '"' + ")'>" +  multipliers[i] + "</span>";
//
// 		} else {
// 			break;
// 		}
// 	}
// 	return result;
// }

// function formulaDivision(formula, main_value) {
// 	//	numerator - чисельник
// 	//  denominator - знаменник
// 	var numerator = formula[0];
// 	var denominator = formula[1];
//
// 	numerator = numerator.split('*');
// 	denominator = denominator.split('*');
//
// 	numerator = buildFormula(numerator);
// 	denominator = buildFormula(denominator);
//
// 	result = '<div class="division f_left"><div class="numerator row" style="border-bottom: solid 1px #000;"><div class="result_num">' + numerator + '</div></div><div class="denominator row"><div class="result_den">' + denominator + '</div></div></div>';
// 	return result;
// }

// function formulaWithoutDivision(formula, mainValue) {
// 	var multipliers = formula[0];
// 	var multipliers = multipliers.split('*');
// 	var result =  buildFormula(multipliers);
// 	result = '<div class="division f_left text-left" style="padding-top: 16px;">' + result + '</div>'
// 	return result;
// }

// function formulaWithoutDivisionBuild(mainValue, formula, variable) {
// 	newFormula = deleteVar(variable, formula);
// 	return mainValue + '/' + newFormula;
// }

// function formulaDivisionBuildNumerator(mainValue, variable, numerator, denominator) {
// 	return mainValue + '*' + denominator + '/' + numerator;
// }

// function formulaDivisionBuildDenominator (mainValue, variable, numerator, denominator) {
// 	return numerator + '/' + mainValue + '*' + denominator;
// }

// function formulaDivisionBuild(mainValue, variable, formula) {
// 	//	numerator - чисельник
// 	//  denominator - знаменник
// 	var i = 0;
// 	var numerator = formula[0];
// 	var denominator = formula[1];
// 	temp = numerator.split('*');
// 	while(temp[i] !== undefined) {
// 		if (temp[i] == variable) {
// 			numerator = deleteVar(variable, numerator);
// 			return formulaDivisionBuildNumerator(mainValue, variable, numerator, denominator);
// 		}
// 		i++;
// 	}
// 	i = 0;
// 	temp = denominator.split('*');
// 	while(temp[i] !== undefined) {
// 		if (temp[i] == variable) {
// 			denominator = deleteVar(variable, denominator);
// 			return formulaDivisionBuildDenominator(mainValue, variable, numerator, denominator);
// 		}
// 		i++;
// 	}
// }

// function outputFormula(variable) {
// 	var formula = old_formul.split('=');
// 	var mainValueOld = formula[0];
// 	formula = formula[1].split('/');
// 	if (formula[1] !== undefined) {
// 		result = formulaDivisionBuild(mainValueOld, variable, formula);
// 	} else {
// 		result = formulaWithoutDivisionBuild(mainValueOld, formula[0], variable);
// 	}

// 	formulaBuild(variable + " = " + result);
// }

// function deleteVar(variable, formula) {
// 	var newFormeula = formula.split('*');
// 	var i = 0;
// 	formula = '';
// 	while(newFormeula[i] !== undefined) {
//
// 		if (newFormeula[i] == variable) {
// 			newFormeula[i] = '';
// 		}
//
// 		if (newFormeula[i] != '') {
// 			if (i == 0) {
// 				formula += newFormeula[i];
// 			} else {
// 				if (i == 1 && newFormeula[0] == '') {
// 					formula += newFormeula[i];
// 				} else {
// 					formula += '*' + newFormeula[i];
// 				}
// 			}
// 		}
//
// 		i++;
//
// 	}
// 	return formula;
// }

// function divisionVar(variable, formula, numerator, denominator) {
// 	return variable + '/' + formula;
// }

// function formulaBuild(formula) {
// 	if (formula == 'Here was the formula! =)') {
// 		$('.result').html('Error =(');
// 	} else {
// 		old_formul = formula;
// 		formula = formula.split('=');
// 		main_value = formula[0];
// 		formula = formula[1].split('/');
// 		if (formula[1] !== undefined && formula[1] != '') {
// 			result = formulaDivision(formula, main_value);
// 		} else {
// 			result = formulaWithoutDivision(formula, main_value);
// 		}
// 		main_value = '<div class="text-center main_value f_left">' + main_value + '</div><div class="total f_left" style="padding-top: 16px;">=</div>';
// 		$('.result').html(main_value + result);
// 	}
// }

$(document).ready( function () {
	var cFormula = new CreateFormul();
	$('.formula').each( function () {
		cFormula.Create(this.id);
	});
});
