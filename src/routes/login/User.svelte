<script>
    import { users } from './data-users.js'

    // export let user = {}
    let named = '';
    let emailed = '';
    let passworded = '';
    let usered = '';
    const updateName = async () => {
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
        console.log(res);
    }
</script>

 <!-- Section 1

// <div class="user">
//     {user.id}
// </div>



// Section 2 -->

<div class="user">
    <form action="" on:submit={updateName}>
    <input type="text" bind:value={named} placeholder="Enter name">
    <input type="email" bind:value={emailed} placeholder="Enter email">
    <input type="password" bind:value={passworded} placeholder="Enter password">
    <input type="text" bind:value={usered} placeholder="Enter user type">
    <button type="submit">Submit</button>
    </form>
</div>




