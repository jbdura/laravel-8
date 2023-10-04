<script>
    export default {      
        props: ['roles', 'user_name'],
        mounted() {
            console.log(this.roles);
        }
    }
</script>

<template>
    <section class="w-[60%] mx-auto my-10 text-center">
        <h1 class="text-3xl">
            Showing Roles associated with <strong class="underline"> {{ user_name }} </strong> 
            <br>
            Roles:
        </h1>
        <table class="table table-striped mx-auto mt-6 border-black border p-2">
            <thead>
        <tr>
          <th class="border p-2">
            Role Name</th>
          <th class="border p-2">

          </th>
        </tr>
        </thead>
        <tr v-for="role in roles" :key="role.id">
            <td class="border px-6 py-2">
            {{ role.name }}</td>
            <td class="border px-6 py-2">
           <a :href="'/roles/' + role.id + '/users'" class="rounded bg-black text-white px-2">
            View Users
            </a>
          </td>
        </tr>
      </table>
    </section>
</template>