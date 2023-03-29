<header>
	<div class="left">PROSENI</div>

    <div class="right">
	<div class="center">
		<a href="/">HOME</a>
		<a href="/about">ABOUT</a>
		<a href="/contact">CONTACT</a>
		<a href="/service">SERVICE</a>
		<a href="/blog" id="last">BLOG</a>
        <a href="/login" id="signup">SignUp / Login</a>
        <!-- <button><a href="/">SignUp</a></button> -->
	</div>
    </div>
</header>

<slot />

<footer />

<style>
	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

	header {
		width: 100%;
		height: 14vh;
		background-color: black;
		font-family: 'Poppins', sans-serif;
		display: flex;
		justify-content: space-around;
		align-items: center;
		color: aliceblue;
	}
    .left{
        flex-basis: 40%;
        display: flex;
        justify-content: center;
        font-size: 30px;
        font-weight: 600;
    }
	.center a {
		text-decoration: none;
		color: white;
		padding: 0 12px;
        flex-basis: 45%;
	}
	
	#signup{
        padding: 10px 20px;
        background-color: #ea3a60;
        border: none;
        border-radius: 50px;
        font-family: 'Poppins', sans-serif;
    }
    
</style>
