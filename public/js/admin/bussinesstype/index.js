import { validateForm, getDataById, setEditModalData } from '../../common/create.js';

/**
 * global form validation calling
 */
'use strict';
// Class definition
var typeModule = function () {
	let validationRules = {
		name: {
			required: true,
			minlength: 4,
			remote: 'check-duplicate-bussinesstype'
		},
	};
	let validationMessage = {
		name: {
			required: "Bussiness type is required.",
			minlength: 'Bussiness type should be at least 4 characters.',
			remote: "This Bussiness type Already Exists"
		},
	};
	return {
		// public functions
		init: function () {
			const params = { validationRules: validationRules, validationMessage: validationMessage }
			validateForm('addForm', params);
		}
	};
}();

jQuery(document).ready(function () {
	typeModule.init();
});


/**
 * 
 * getting  data by id
 */
const fetchDataById = async (id, url) => {
	const response = await getDataById(id, url);
	if (response.status == 200) {
		const data = response.data;
		//Edit Modal Open and Record Id data set
		setEditModalData('Edit Bussiness Type', data.id); //param1= Modal title, param2=Table auto Increment Id
		//set form field values
		$('#name').val(data.business_type);
	}
}

//For Edit functionality
$('body').on('click', '.editrec', function () {
	let id = $(this).data('id');
	const baseUrl = routesindex + '/' + id + '/edit';
	fetchDataById(id, baseUrl);
});


