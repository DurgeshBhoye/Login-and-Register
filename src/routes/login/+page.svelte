


<script>

	import { users } from './data-users.js'
    import {onMount} from 'svelte'
    // import User from './User.svelte';
    // onMount( async() => {
    //     const url = 'http://localhost/svelteapp/back/get-users.php'
    //     let res = await fetch(url)
    //     res = await res.json()
    //     let data = res.data   // display array of data inside above url
    //     $users = res.data
    //     console.log($users);
    //     // console.log(res);
    //     console.log(data);
		
    // })












	
	// const users = [
	// 	{
	// 		user: 'Harry Jackson',
	// 		email: 'harry@name',
	// 		password: '12345'
	// 	},
	// 	{
	// 		user: 'Dany',
	// 		email: 'dany@same',
	// 		password: '1234'
	// 	}
	// ];

	import User from './User-page.svelte';
	import Users from "./Users.svelte";

	function wide() {
		document.getElementById('log').style.bottom = '-14%';
		document.getElementById('log').style.borderRadius = '35%';
	}

	function lowr() {
		document.getElementById('log').style.bottom = '-86%';
		document.getElementById('log').style.borderRadius = '50%';
	}

	let email = '',
		password = '',
		user = '',
		regmail = '',
		regpass = '';

	// let named = user;
    // let emailed = regmail;
    // let passworded = regpass;
    // let usered = 'ADMIN';

	// function showcase() {
	const showcase = async () => {
		const url = 'http://localhost/svelteapp/back/get-users.php'
        var ress = await fetch(url)
        ress = await ress.json()
        var datas = ress.data   // display array of data inside above url
        $users = ress.datas
        console.log($users);
        // console.log(res);
        console.log(datas);




		if (datas.find((e) => e.email === regmail)) {
			document.getElementById('demon').innerHTML = 'Your Already Registered! <br> Please Try Log In!';
		} else {
			document.getElementById('demon').innerHTML = 'Your Registered!';
			let named = user;
    let emailed = regmail;
    let passworded = regpass;
    let usered = 'ADMIN';
		// let named = '';
    	// let emailed = '';
    	// let passworded = '';
    	// let usered = '';
    // const updateName = async () => {
        // let ids = user.id
        const updateRoute = 'http://localhost/svelteapp/back/create-user.php'
        console.log(updateRoute);
        // console.log(ids);
        const data = new FormData()
        data.append('name', named)
        data.append('email', emailed)
        data.append('password', passworded)
        data.append('user_type', usered)
        console.log(named);
        let res = await fetch(updateRoute, {
            method : "POST",
            body : data
        })
		}
	// 	let named = user;
    // let emailed = regmail;
    // let passworded = regpass;
    // let usered = 'ADMIN';
	// 	// let named = '';
    // 	// let emailed = '';
    // 	// let passworded = '';
    // 	// let usered = '';
    // // const updateName = async () => {
    //     // let ids = user.id
    //     const updateRoute = 'http://localhost/svelteapp/back/create-user.php'
    //     console.log(updateRoute);
    //     // console.log(ids);
    //     const data = new FormData()
    //     data.append('name', named)
    //     data.append('email', emailed)
    //     data.append('password', passworded)
    //     data.append('user_type', usered)
    //     console.log(named);
    //     let res = await fetch(updateRoute, {
    //         method : "POST",
    //         body : data
    //     })
        // console.log(res);
    // }
	}

	
	// function submit() {
	const submit = async () => {
		const url = 'http://localhost/svelteapp/back/get-users.php'
        var ress = await fetch(url)
        ress = await ress.json()
        var datas = ress.data   // display array of data inside above url
        $users = ress.datas
        console.log($users);
        // console.log(res);
        console.log(datas);




		console.log(email + ' ' + password);
		document.getElementById('hideAfterFill').style.display = 'none';
		document.getElementById('UserId').style.display = 'Block';
		// if (user) {
			// user = "Default";
			// user = email.substring(0, email.indexOf("@"));
			const index = datas.findIndex((item) => item.email === email);
			console.log(index);
			const firstValue = Object.values(datas)[index].name;
			console.log(firstValue); // 👉️ "Chile"

			const passwordOfUser = Object.values(datas)[index].password;
			console.log(passwordOfUser); // 👉️ "Chile"
			user = firstValue;
			// if (users.findIndex((e) => e.email === email)) {
			// 	console.log(e);
			// }


			// CHECK IF EMAIL AND PASSWORD ARE MATCHING OR NOT ! --- AUTHENTICATION
		// }
		// else{
		// 	user = user
		// }
	}
</script>

<!-- <button on:click={wide}>wide</button>
<button on:click={lowr}>lower</button> -->

<!-- <h1 style="text-align: center; background:black; color:aliceblue; padding-top: 50px;">Registration Page</h1> -->
<!--<Users/>-->


<div class="container" id="hideAfterFill">
	<section class="wrapper">
		<div class="form signup">
			<header on:click={lowr}>Signup</header>
			<form action="/" name="regForm" on:submit|preventDefault={showcase}>
				<input
					type="text"
					placeholder="Full name"
					name="username"
					id="user"
					bind:value={user}
					required
				/>
				<input
					type="email"
					placeholder="Email address"
					name="mail"
					id="regmail"
					bind:value={regmail}
					required
				/>
				<input
					type="password"
					placeholder="Password"
					name="password"
					id="regpass"
					bind:value={regpass}
					required
					autocomplete="on"
				/>
				<div class="checkbox">
					<input type="checkbox" id="signupCheck" />
					<label for="signupCheck">I accept all terms & conditions</label>
				</div>
				<span id="demon" />
				<!-- <span id="already" /> -->
				<input type="submit" value="Signup" />
				<p id="demo" />
			</form>
		</div>

		<div class="form login" id="log">
			<header on:click={wide}>Login</header>
			<form action="/username" id="this" name="loginForm" on:submit|preventDefault={submit}>
				<input type="email" placeholder="Email address" name="email" bind:value={email} required />
				<input
					type="password"
					placeholder="Password"
					name="password"
					bind:value={password}
					required
					autocomplete="on"
				/>
				<a href="/">Forgot password?</a>
				<input type="submit" value="Login" />
			</form>
		</div>
	</section>
</div>

<div id="UserId">
	{#if email && password}
		<User {user} />
	{/if}
</div>

<style>
	/* Import Google font - Poppins */
	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
	.container {
		display: flex;
		align-items: center;
		justify-content: center;
		/* margin-top: 1rem; */
		background-color: #000000;
		height: 100vh;
	}
	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: 'Poppins', sans-serif;
	}

	.wrapper {
		position: relative;
		max-width: 470px;
		width: 120%;
		border-radius: 12px;
		padding: 20px 30px 120px;
		background: #ea3a60;
		box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
		overflow: hidden;
	}
	.form.login {
		position: absolute;
		left: 50%;
		bottom: -86%;
		transform: translateX(-50%);
		width: calc(120% + 220px);
		padding: 20px 190px;
		border-radius: 50%;
		height: 100%;
		background: #fff;
		transition: all 0.6s ease;
	}
	/* .wrapper.active
  .form.login {
  bottom: -15%;
  border-radius: 35%;
  box-shadow: 0 -5px
    10px rgba(0, 0, 0, 0.1);
} */
	.form header {
		font-size: 30px;
		text-align: center;
		color: #fff;
		font-weight: 600;
		cursor: pointer;
	}
	.form.login header {
		color: #333;
		opacity: 0.6;
	}
	.wrapper.active .form.login header {
		opacity: 1;
	}
	.wrapper.active .signup header {
		opacity: 0.6;
	}
	.wrapper form {
		display: flex;
		flex-direction: column;
		gap: 20px;
		margin-top: 40px;
	}
	form input {
		height: 60px;
		outline: none;
		border: none;
		padding: 0 15px;
		font-size: 16px;
		font-weight: 400;
		color: #333;
		border-radius: 8px;
		background: #fff;
	}
	.form.login input {
		border: 1px solid #aaa;
	}
	.form.login input:focus {
		box-shadow: 0 1px 0 #ddd;
	}
	form .checkbox {
		display: flex;
		align-items: center;
		gap: 10px;
	}
	.checkbox input[type='checkbox'] {
		height: 16px;
		width: 16px;
		accent-color: #fff;
		cursor: pointer;
	}
	form .checkbox label {
		cursor: pointer;
		color: #fff;
	}
	form a {
		color: #333;
		text-decoration: none;
	}
	form a:hover {
		text-decoration: underline;
	}
	form input[type='submit'] {
		margin-top: 15px;
		padding: none;
		font-size: 18px;
		font-weight: 500;
		cursor: pointer;
	}
	.form.login input[type='submit'] {
		background: #ea3a60;
		color: #fff;
		border: none;
	}

	#demo {
		text-align: center;
		display: none;
	}
	#UserId {
		display: none;
		/* text-align: right; */
	}
	#demon {
		text-align: center;
	}
</style>
