// function Showdiv(id) {
//     var id = document.getElementById(id);
//     var $parent = document.getElementById('settingscontent'), $i, $j;
//     var $child = document.getElementById(id)
//     for ($i = 0, $j = $parent.getElementsByTagName('div'); $i < $j.length; $i++) {
//         if ($parent === $j[$i].parentNode) {
//             $j[$i].style.display= 'none';
//         }
//     }
//     id.style.display= "flex";
// }
// var selected;
//
// $(document).ready(function (id) {
//     $(id).click(function () {
//         $("div").toggleClass("hidden unhidden");
//     });
// });
// window.addEventListener("load", function(){
// var anchor = window.location.hash;
// // If there is an anchor in the URL, expand the relevant div
// if (anchor) {
//     $(anchor).toggleClass("hidden").next().slideToggle("slow");
// }
// })
// $(document).ready(function() {
//     var urlArgs = $(".filterControl:visible").map(function()
//     {
//         return this.id + "=" + $(this).val();
//     }).get().join("&");
//     location.href = "#" + urlArgs;
//     $(function()
//     {
//         $.each(location.hash.replace(/\#/, "").split("&"), function(filterArg)
//         {
//             var parts = filterArg.split("=");
//             $("#" + parts[0]).val(parts[1]);
//         });
//     });
// })
// Get URL
// var url = window.location.href;
// // Get DIV
// var msg = document.getElementById('settings');
// $(document).ready(function(){
//
// // Check if URL contains the keyword
//     if( url.search( 'profile#settings' ) > 0 ) {
//         // Display the message
//         msg.removeClass.classList= "hidden";
//     }
// });

//     var hash = window.location.hash.replace('#', '');
//
//     function toggle (elementPartial) {
//
//     var ele = document.getElementById('toggleText'+elementPartial);
//     var text = document.getElementById('displayText'+elementPartial);
//     if(ele.style.display == 'flex') {
//     ele.style.display = 'none';
// } else {
//     ele.style.display = 'flex';
// }
// }
//
//     if (hash) {
//     toggle(hash);
// }
//
//

