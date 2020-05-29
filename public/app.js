function onSelectValue(){
    const valueSelect = parseFloat(document.getElementById('expense').value);
    const inputAmount = parseFloat(document.getElementById('amount').value);
    const result = parseFloat(valueSelect * inputAmount / 1000).toFixed(2);
    document.getElementById('output').innerHTML = result;
}
