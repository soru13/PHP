/* Author:
Anonymus Null
*/
$(document).on("ready", function(){
	s=$('#marco').data('slider');
	t=setInterval(function(){s.siguiente();},5000);

	//ventana modal para mandar mensaje
 				var window = $("#window"),
                        undo = $("#undo")
                                .bind("click", function() {
                                    window.data("kendoWindow").open();
                                    undo.hide();
                                });

                    var onClose = function() {
                        undo.show();
                    }

                    if (!window.data("kendoWindow")) {
                        window.kendoWindow({
                            width: "600px",
                            title: "About Alvar Aalto",
                            close: onClose
                        });
                    }

});






