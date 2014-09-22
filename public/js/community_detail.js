$(document).ready(function() {
    /*
    var btnGrpContainer = $(".postTypeBtnGrp");
    $(".btn", btnGrpContainer).on('click', function() {
        var self = this;
        $("[name="+$(self).attr("target")+"]", $(self).parents("form:first")).val($(self).attr("_value"));
        $(self).siblings(".active").each(function(i, e) {
            $(e).removeClass("active");
            $("i", e).removeClass("glyphicon").removeClass("glyphicon-ok");
        }).promise().done(function(){
            $(self).addClass("active");
            $("i", self).addClass("glyphicon").addClass("glyphicon-ok");
        })
    });
    */

    $(".btn-group[role=radio]").each(function(i, btnGrp) {
        $(".btn", btnGrp).on('click', function() {
            var self = this;
            $("[name="+$(btnGrp).attr("target")+"]", btnGrp).val($(self).attr("_value"));
            $(self).siblings(".active").each(function(i, btn) {
                $(btn).removeClass("active");
                $("i", btn).removeClass("glyphicon").removeClass("glyphicon-ok");
            }).promise().done(function(){
                $(self).addClass("active");
                $("i", self).addClass("glyphicon").addClass("glyphicon-ok");
            })
        });
    });

    $("#uploadMedia iframe[name=mediaUploadForm]").on('load', function() {
        $('#uploadMedia').modal('hide')
        console.log($("#uploadMedia iframe").contents().find("p#json").text());
    });
});