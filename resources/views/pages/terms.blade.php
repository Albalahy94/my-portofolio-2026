<x-layout>
    @section('title', __('Terms and Conditions'))
    @section('meta_description', __('Terms and Conditions for Said Albalahy Portfolio'))
<br/>
<br/>
<br/>
    <section class="pt-64 pb-20 relative">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto glass-effect rounded-3xl p-8 md:p-12 relative z-10">
                <h1 class="text-3xl md:text-5xl font-bold mb-8 gradient-text text-center">{{ __('Terms and Conditions') }}</h1>
                
                <div class="prose prose-invert max-w-none text-gray-300 leading-loose">
                    <p>{{ __('terms_intro') }}</p>

                    <h3 class="text-xl font-bold text-white mt-8 mb-4">{{ __('Intellectual Property') }}</h3>
                    <p>{{ __('terms_ip_content') }}</p>

                    <h3 class="text-xl font-bold text-white mt-8 mb-4">{{ __('User Responsibilities') }}</h3>
                    <p>{{ __('terms_user_content') }}</p>

                    <h3 class="text-xl font-bold text-white mt-8 mb-4">{{ __('Changes to Terms') }}</h3>
                    <p>{{ __('terms_changes_content') }}</p>
                </div>
            </div>
        </div>
    </section>
</x-layout>
