<?php

// namespace Database\Seeders;

// use App\Models\Category;
// use App\Models\Post;
// use App\Models\PostTags;
// use App\Models\Role;
// use App\Models\User;
// use App\Models\RoleUsers;
// use App\Models\Tag;
// use Database\Factories\RoleUsersFactory;
// // use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Seeder;

// class DatabaseSeeder extends Seeder
// {
//     /**
//      * Seed the application's database.
//      */
//     public function run(): void
//     {

//         $category_one = Category::create(
//             [
//                 'name' => 'Personal',
//                 'slug' => 'personal',
//             ]
//         );
//         $category_two = Category::create(
//             [
//                 'name' => 'Work',
//                 'slug' => 'work',
//             ]
//         );

//         $tag1 = Tag::create(
//             [
//                 'name' => 'rust',
//             ]
//         );

//         $tag2 = Tag::create(
//             [
//                 'name' => 'php',
//             ]
//         );

//         $tag3 = Tag::create(
//             [
//                 'name' => 'javascript',
//             ]
//         );

//         $tag4 = Tag::create(
//             [
//                 'name' => 'vue',
//             ]
//         );

//         $more_Tag = Tag::factory(50)->create();

//         $posts = Post::factory(25)->create(
//             [
//                 'category_id' => $category_one->id,
//             ]
//         );

//         foreach ($posts as $post) {
//             // Randomly select a few tags for each post
//             $randomTags = Tag::inRandomOrder()->limit(rand(1, 3))->get();
    
//             foreach ($randomTags as $tag) {
//                 $post->tags()->attach($tag);
//             }
//         }
    
//         Post::factory(5)->create(
//             [
//                 'category_id' => $category_two->id,
//             ]
//         );

//        // create a User with 
//         $user1 = User::factory()->create();
//         $user2 = User::factory()->create();

//         $role1 = Role::create(
//             [
//                 'name' => 'subscriber',
//             ]
//         );
//         $role2 = Role::create(
//             [
//                 'name' => 'author',
//             ]
//         );

//         RoleUsers::create(
//             [
//                 'role_id' => $role1->id,
//                 'user_id' => 1,
//             ]
//         );

//         RoleUsers::create(
//             [
//                 'role_id' => $role2->id,
//                 'user_id' => 1,
//             ]
//         );

//         RoleUsers::create(
//             [
//                 'role_id' => $role1->id,
//                 'user_id' => 2,
//             ]
//         );

//         RoleUsers::create(
//             [
//                 'role_id' => $role2->id,
//                 'user_id' => 2,
//             ]
//         );

//         PostTags::factory(10)->create();


         
//         // \App\Models\User::factory()->create([
//         //     'name' => 'Test User',
//         //     'email' => 'test@example.com',
//         // ]);
//     }
// }



namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name' => 'John Doe'
        ]);

        Post::factory(5)->create([
            'user_id' => $user->id
        ]);
    }
}