export function getcities(param) {
    let state_codes = '';
    if (typeof param.state_code !== 'undefined' && param.state_code !== null && param.state_code.length > 0) {
        if (param.state_code.constructor === Array)
            state_codes = param.state_code.join();
        else
            state_codes = param.state_code;
    }

    let country_codes = '';
    if (typeof param.country_code !== 'undefined' && param.country_code !== null && param.country_code.length > 0) {
        if (param.country_code.constructor === Array)
            country_codes = param.country_code.join();
        else
            country_codes = param.country_code;
    }
    let populate_arr = [];
    if (typeof param.pre_populate !== 'undefined' && param.pre_populate !== null){
        populate_arr = param.pre_populate;
    }
    let call_func = [];
    let custTokenLimit = 1;
    if (typeof param.token_limit !== 'undefined' && param.token_limit !== "")
        custTokenLimit = token_limit;

    const city_element = $('#'+param.city_ele);
    city_element.tokenInput(param.city_url+'?cc=' + country_codes + '&sc=' + state_codes, {
        minChars: 2,
        tokenDelimiter: '##',
        preventDuplicates: true,
        propertyToSearch: 'value',
        tokenLimit: custTokenLimit,
        onAdd: function (item) {
            if (item.id === "")
                city_element.tokenInput("clear");

        },
        prePopulate: populate_arr,
        onDelete: function (item) {            
        }
    });
}

export function getStates(param) {
    $.ajax({
        url: param.state_url,
        type: "POST",
        data: { cc: param.code },
        dataType: 'json',
        success: function (result) {            
            if (typeof param.state_ele !== 'undefined' && param.state_ele !== "") {
                let state_ele = $('#'+param.state_ele);
                state_ele.html('<option value="">Select State</option>');
                $.each(result, function (key, value) {          
                    state_ele.append('<option value="' + value.state_code + '">' + value.state + '</option>');
                });
                if (typeof param.city_ele !== 'undefined' && param.city_ele !== "") {
                    $('#'+param.city_ele).html('<option value="">Select City</option>');
                }
            }
        }
    });
}