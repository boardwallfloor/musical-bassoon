<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        
        <!-- Place favicon.ico in the root directory -->
	
    </head>
    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
       	<h1 id="bigOne"></h1>
       
       <div class="container">
       		<input id="txtEmail" type="email" placeholder="email">
       		<input id="txtPassword" type="password" placeholder="password">
       		<button id="btnLogin">Login</button>
       		<button id="btnSignup">Signup</button>
			<button id="btnLogout">Log Out</button>
			<button id="btnGoogleSignin">Signin With Google</button>
       </div>

        <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
        
            
	
	<script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-auth.js"></script>
	<script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-database.js"></script>
	<script>
	  // Initialize Firebase
	  var config = {
	    apiKey: "AIzaSyBxovfgUyLTjTBVcgh1rk0N2x_1m3Am8Ak",
	    authDomain: "cobafirebaseweb.firebaseapp.com",
	    databaseURL: "https://cobafirebaseweb.firebaseio.com",
	    projectId: "cobafirebaseweb",
	    storageBucket: "cobafirebaseweb.appspot.com",
	    messagingSenderId: "901890414128"
	  };
	  firebase.initializeApp(config);

	  // Header 
	  var bigOne = document.getElementById('bigOne');
	  var dbRef = firebase.database().ref().child('text');
	  dbRef.on('value', snap =>	bigOne.innerText = snap.val());

	  // Get elements
	  const txtEmail = document.getElementById('txtEmail');
	  const txtPassword = document.getElementById('txtPassword');
	  const btnLogout = document.getElementById('btnLogout');
	  const btnLogin = document.getElementById('btnLogin');
	  const btnSignup = document.getElementById('btnSignup');
	  const btnGoogleSignin = document.getElementById('btnGoogleSignin')

	  // Add login event
	  btnLogin.addEventListener('click', e => {
	  	// Get email and pass
	  	const email = txtEmail.value;
	  	const pass = txtPassword.value;
	  	const auth = firebase.auth();

	  	// Sign in
	  	const promise = auth.signInWithEmailAndPassword(email,pass);
	  	promise.catch(e => console.log(e.message));
	  });

	  // Add signup event	
	  btnLogin.addEventListener('click', e => {
	  	// Get email and pass
	  	const email = txtEmail.value;
	  	const pass = txtPassword.value;
	  	const auth = firebase.auth();

	  	// Sign in
	  	const promise = auth.createUserWithEmailAndPassword(email,pass);
	  	promise.catch(e => console.log(e.message));
	  	});

      // Add realtime listener
      firebase.auth().onAuthStateChanged(firebaseUser => {
      	if(firebaseUser){
      		console.log(firebaseUser);
      	}else{
      		console.log('not logged in');
      	}
      });

      // Add logout
      btnLogout.addEventListener('click', e =>{
      	firebase.auth().signOut();
      })

      // Google signin
      btnGoogleSignin.addEventListener('click', e =>{
      	var provider = new firebase.auth.GoogleAuthProvider();
      	
	   firebase.auth().signInWithPopup(provider).then(function(result) {
	   	console.log("signin succes")		})
	   .catch(function(error) {
	  console.log(error)
	  console.log("Failed to signin")

		})
      })

	</script>

    </body>
</html>