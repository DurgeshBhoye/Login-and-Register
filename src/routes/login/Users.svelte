<script>
    import { users } from './data-users.js'
    import {onMount} from 'svelte'
    import User from './User.svelte';
    onMount( async() => {
        const url = 'http://localhost/svelteapp/back/get-users.php'
        let res = await fetch(url)
        res = await res.json()
        // let data = res.data   // display array of data inside above url
        $users = res.data
        // console.log(data);
        // console.log(res);
    })
</script>


<div id="users">

    <User />


</div>