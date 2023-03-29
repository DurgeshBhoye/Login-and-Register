<script>

    
	export let user;
    
</script>

<div class="box">
<h2>Welcome, <span> {user} </span></h2>  
<p> Your Logged in! </p>
</div>


<style>
    .box{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        height: 80vh;
    }
    h2 span{
        color: red;
    }
    h2{
        margin-right: 100px;
    }
</style>