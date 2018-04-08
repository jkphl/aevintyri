Object.size = function (obj) {
    var size = 0, key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};

// Select the full text inside a given element
function selectText(elem) {
    if (document.selection && document.selection.createRange) {
        var textRange = document.selection.createRange();
        textRange.moveToElementText(elem);
        textRange.select();
    } else if (document.createRange && window.getSelection) {
        var range = document.createRange();
        range.selectNode(elem);
        var selection = window.getSelection();
        selection.removeAllRanges();
        selection.addRange(range);
    }
}