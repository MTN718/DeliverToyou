/*global Taggle*/
function cs_add_cat(faux,cs_class){
	"use strict";
	var example4 = new Taggle(jQuery('.'+cs_class+'.textarea')[0], {
        duplicateTagClass: 'bounce'
    });

    var container = example4.getContainer();
    var input = example4.getInput();

    jQuery(input).autocomplete({
        source: faux,
        appendTo: container,
        position: { at: 'left bottom', of: container },
        select: function(e, v) {
            e.preventDefault();
            //Add the tag if user clicks
            if (e.which === 1) {
                example4.add(v.item.value);
            }
        }
    });
}
