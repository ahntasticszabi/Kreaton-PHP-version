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

#pipa {
	position         : relative     ;
	top              : 5px          ;
	left             :-32px         ;

	filter           : grayscale(1) ;
	opacity          : .25          ;
}

#figyelmeztetes {
	font-weight      : bold         ;
	color            : red          ;
}
</style>

<div class="main_content">
    <form action='reg_ir.php' method='post' target="kisablak">
        <div>
            <legend>Regisztráció</legend>
            <label for="rfelh">Felhasználónév:</label><br/><br/>
            <input id="rfelh" type="text" name="unev" placeholder="Felhasználónév..." required> <br/><br/>
			<label for="email">Email:</label> <br/><br/>
            <input id="email" type="email" name="umail" placeholder="valami@valami..." required> <br/><br/>
            <label for="rpass">Jelszó:</label> <br/><br/>
            <input id="rpass" type="password" name="pw1" placeholder="Jelszó..." required> <br/><br/>
            <label for="rpass2">Jelszó újra:</label> <br/><br/>
            <input id="rpass2" type="password" name="pw2" required> <br/><br/>
            <input type="submit" value="Regisztráció">
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

    function egyezes()
    {
	    if( document.getElementById('pass').value=='' || document.getElementById('pas2').value=='' )
	    {
	        document.getElementById('pipa').src  = 'SRCIMG/nonequal.png'
	        document.getElementById('pipa').style.filter   = 'grayscale(1)'
	        document.getElementById('pipa').style.opacity  = .25
	    }
	    else
	    if( document.getElementById('pass').value!=document.getElementById('pas2').value )
	    {
	        document.getElementById('pipa').src  = 'SRCIMG/nonequal.png'
	        document.getElementById('pipa').style.filter   = 'grayscale(0)'
	        document.getElementById('pipa').style.opacity  =  1
	    }
	    else
	    {
	        document.getElementById('pipa').src  = 'SRCIMG/pipa.png'
	        document.getElementById('pipa').style.filter   = 'grayscale(0)'
	        document.getElementById('pipa').style.opacity  =  1
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