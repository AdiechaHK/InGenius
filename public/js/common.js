
Date.prototype.format = function(pattern) {
  // body...
  var hrs = this.getHours();
  var meradian = hrs >= 12 ? "PM": "AM";
  var min = this.getMinutes();
  var sec = this.getSeconds();
  var is12hrs = false;

  var tmp = pattern;
  pattern = pattern.replace("hh", hrs % 12 == 0? "12":(hrs % 12 < 10 ? "0" + (hrs % 12): hrs % 12));
  is12hrs = tmp != pattern;
  pattern = pattern.replace("HH", hrs < 10 ? "0" + hrs: hrs);
  pattern = pattern.replace("mm", min < 10 ? "0" + min: min);
  pattern = pattern.replace("ss", sec < 10 ? "0" + sec: sec);
  pattern = is12hrs ? pattern.replace("mr", meradian): pattern.replace("mr", "");
  return pattern;

};
var updateTime = function(e) {
  var diff = $(e).attr('diff');
  var ct = new Date();
  var dt = new Date(ct.getTime() - diff);
  var p = $(e).attr("pattern");
  $(e).text(dt.format(p));
}

$(document).ready(function() {
  $("[title]").tooltip('hide');
  $("a.delete").click(function(){
    var self = this;
    if(confirm("Do you really want to delete this?")) {
      // alert($(self).attr("url"));
      window.location.href = $(self).attr("url");
    } 
    return false;
  })

  $(".my-custom-clock").each(function(i, e) {
    /* 
    TIME SPECIFICATION
    -=-=-=-=-=-=-=-=-=-

    formate :
    --------
    HH - stamds for hours 0-23
    hh - stands for hours 1-12
    mm - stands for minut
    ss - stands for seconds
    mr - stands for meradian

    */


    var p = $(e).attr("pattern");
    // var interval = p.indexOf("ss") != -1? 1000: 60*1000;
    var ct = $(e).attr("current");
    var dt =  new Date(ct * 1000);
    var cd = new Date();
    $(e).attr("diff", cd.getTime() - dt.getTime());
    $(e).text(dt.format(p));
    setInterval(function() {updateTime(e)}, 1000);

  });

})
