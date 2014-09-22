Date.prototype.format = function(regEx) {
  var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
  regEx = regEx.replace("dd",this.getDate());
  regEx = regEx.replace("mmmm",months[this.getMonth()]);
  regEx = regEx.replace("mmm",months[this.getMonth()].substr(0, 3));
  regEx = regEx.replace("mm",this.getMonth() + 1);
  regEx = regEx.replace("yyyy", this.getFullYear());
  return regEx;
};


function getTimeDiff(currentTime, eventTime) {
  var diff = currentTime - eventTime;
  var resStr = "";
  var min = 60;
  var hour = min * 60;
  if(diff < min) {
    resStr = "Just now";
  } else if (diff < hour) {
    var m = Math.round(diff / min)
    resStr = m + (m > 1 ?" minutes":" minute") + " ago";
  } else if (diff < 24 * hour) {
    var hr = Math.round(diff / hour)
    resStr = hr + (hr > 1?" hours":" hour") + " ago";
  } else {
    var date = new Date(eventTime * 1000);
    resStr = date.format("dd mmm");
  }
  return resStr;
}

$(document).ready(function() {
  $("[postTime]").each(function(i, e){
    console.log(i);
    var pt = $(e).attr('postTime');
    var ct = $("#currentTime").attr("time");
    // alert(pt+' : '+ct);
    $(e).html(getTimeDiff(ct, pt));
  })
})