<!doctype html>

<title>Blog App</title>
<link rel="preconnect" href="https://fonts.gstatic.com">
@vite('resources/css/app.css')
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine-ie11.min.js" integrity="sha512-Atu8sttM7mNNMon28+GHxLdz4Xo2APm1WVHwiLW9gW4bmHpHc/E2IbXrj98SmefTmbqbUTOztKl5PDPiu0LD/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<html lang="en" class="scroll-smooth">
<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/" class=" text-3xl font-bold text-blue-900
                ">
                    Blog
                </a>
            </div>

            <div class="mt-8 md:mt-0">
                @guest
                <div class="flex items-center">
                    <a href="/login" class="text-xs font-bold uppercase hover:underline">Log In</a>
                    <p class="text-xs font-bold uppercase mx-6">or</p>
                    <a href="/sign-up" class="text-xs font-bold uppercase hover:underline">Sign Up</a>
                    <a href="#" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
                </div>
                    @else
                    <div class="flex items-center
                    ">

                        <p class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}</p>
                        <form method="POST" action="/logout" class="text-xs font-bold uppercase">
                            @csrf
                            <button type="submit" class="text-xs font-bold uppercase ml-6 bg-blue-950 text-white rounded-full py-2 px-4 hover:bg-blue-900 transition ease-in-out duration-150"
                            >Log Out</button>
                        </form>
                        <a href="#newsletter" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
                    </div>
                    @endguest

                
                
            </div>
        </nav>

        {{ $slot }}
        
        <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16" id="newsletter">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="/newsletter" class="lg:flex text-sm">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input id="email" type="text" placeholder="Your email address"
                                   class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                        </div>

                        <button type="submit"
                                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                        >
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>
    @if (session()->has('success'))
         <div x-data="{show:true}" x-init="setTimeout(()=>show=false,4000)" x-show="show" class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
             <p>{{session('success')}}</p>
            </div>
    @endif
</body>
</html>