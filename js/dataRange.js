(function(){
    var dataRange = document.querySelectorAll('.js-dataRange');

    if(dataRange.length) {
        for (var item of dataRange) {
            var from = item.querySelector('.js-dataRangeFrom');
            var to = item.querySelector('.js-dataRangeTo');

            if(from && to){
                from.onchange = function() {
                    to.setAttribute('min', this.value);
                }
            }
        }
    }
})();