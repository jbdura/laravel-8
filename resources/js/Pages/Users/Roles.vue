<script>
    export default {      
        props: ['users', 'role_name'],
        mounted() {
            console.log(this.users);
        }
    }
</script>
<template>
   <section class=" w-[60%] mx-auto my-10 text-center">
        <h1 class="text-4xl">
            Showing Users for role <strong class="underline"> {{ role_name }} </strong>  
        </h1>
        <table class="table table-striped mx-auto mt-6 border-black border p-2">
            <thead>
                <tr>
                    <th class="border p-2">Name</th>
                    <th class="border p-2">Email</th>
                    <th class="border p-2"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users" :key="user.id">
                    <td class="border px-6 py-2">
                        <a href="/">
                            {{ user.name  }}
                        </a>
                        </td>
                    <td class="border px-6 py-2">{{ user.email }}</td>
                    <td  class="border px-6 py-2">
                       <a :href="'/users/' + user.id + '/roles'" class="rounded bg-black text-white px-2">
                        View Roles
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
   </section>
</template>