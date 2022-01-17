function Showdiv(id) {
    var id = document.getElementById(id);
    var $parent = document.getElementById('settingscontent'), $i, $j;
    var $child = document.getElementById(id)
    for ($i = 0, $j = $parent.getElementsByTagName('div'); $i < $j.length; $i++) {
        if ($parent === $j[$i].parentNode) {
            $j[$i].style.display= 'none';
        }
    }
    id.style.display= "flex";
}
