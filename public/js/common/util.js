
export function freeInputToken(param) {
    let populateArr = [];
    if (typeof param.prePopulate !== 'undefined' && param.prePopulate !== null){
        populateArr = param.prePopulate;
    }

    let custTokenLimit = 1;
    (typeof param.tokenLimit !== 'undefined' && param.tokenLimit !== "") ? custTokenLimit = param.tokenLimit : custTokenLimit = 1;

    let custHintText = 'Type in a search term';
    if (typeof param.custHintText !== 'undefined' && param.custHintText !== null){
        custHintText = param.custHintText;
    }

    const tokenElement = $('#'+param.elementId);
    tokenElement.tokenInput(param.freeTokenUrl, {
        minChars: 2,
        tokenDelimiter: '##',
        preventDuplicates: true,
        propertyToSearch: 'value',
        tokenLimit: custTokenLimit,
        hintText: custHintText,
        onAdd: function (item) {
            (item.id === "") ? tokenElement.tokenInput("clear") : '';
        },
        prePopulate: populateArr,
        onDelete: function (item) {            
        },
        resultsFormatter: function(item){ return "<li>" + item.value.replace(/\b\w/g, x => x.toUpperCase()) +"</li>" },
        tokenFormatter: function(item) { return "<li><p>" + item.value.replace(/\b\w/g, x => x.toUpperCase()) + "</p></li>" },
    });
}