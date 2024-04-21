<style>
#ures {
	position         : relative     ;
	top              : 5px          ;
	left             :-32px         ;
}

#szem {
	position         : relative     ;
	top              : 5px          ;
	left             :-32px         ;
}

#figyelmeztetes {
	font-weight      : bold         ;
	color            : red          ;
}
</style>

<div class="main_content">
    <form action='login_ir.php' method='post' target='kisablak'>
    <div>
        <legend>Belépés</legend>
        <label for="felh">Felhasználónév:</label><br/><br/>
        <input id="felh" type="text" name="user" placeholder="Felhasználónév..." required> <br/><br/>
        <label for="jel">Jelszó:</label><br/><br/>
        <input id="jel" type="password" name="pw" placeholder="Jelszó..." required> <br/><br/>
        <div id="flex-buttons">
            <input type="submit" value="Bejelentkezés">
            <input type="submit" value="Még nincs profilom" onclick='location.href="./?p=reg"'>
        </div>
    </div>
    </form>
</div>

<script>
    function jelszomutat()
    {
	    if( document.getElementById('pass').type=='password' )
	    {
            document.getElementById('pass').type = 'text'
            document.getElementById('szem').src  = 'SRCIMG/eye1.png'
	    }
	    else if( document.getElementById('pass').type=='text')
	    {
	        document.getElementById('pass').type = 'password'
	        document.getElementById('szem').src  = 'SRCIMG/eye0.png'
	    }
    }

    function CapsLock( esemeny )
    {
	if( esemeny.getModifierState('CapsLock') )
	    document.getElementById('figyelmeztetes').innerHTML = 'CapsLock on!'
	else
	    document.getElementById('figyelmeztetes').innerHTML = ''
    }

</script>