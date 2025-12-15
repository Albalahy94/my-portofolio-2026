<x-layout>
    @section('title', __('Privacy Policy'))
    @section('meta_description', __('Privacy Policy for Said Albalahy Portfolio'))
<br/>
<br/>
<br/>
    <section class="pt-64 pb-20 relative">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto glass-effect rounded-3xl p-8 md:p-12 relative z-10">
                <h1 class="text-3xl md:text-5xl font-bold mb-8 gradient-text text-center">{{ __('Privacy Policy') }}</h1>
                
                <div class="prose prose-invert max-w-none text-gray-300 leading-loose">
                    <p>{{ __('privacy_intro') }}</p>

                    <h3 class="text-xl font-bold text-white mt-8 mb-4">{{ __('Information We Collect') }}</h3>
                    <p>{{ __('privacy_collect_content') }}</p>

                    <h3 class="text-xl font-bold text-white mt-8 mb-4">{{ __('How We Use Information') }}</h3>
                    <p>{{ __('privacy_use_content') }}</p>

                    <h3 class="text-xl font-bold text-white mt-8 mb-4">{{ __('Contact Us') }}</h3>
                    <p>{{ __('privacy_contact_content') }} <a href="mailto:sh.elbalahy@gmail.com" class="text-primary-400 hover:underline">sh.elbalahy@gmail.com</a></p>
                </div>
            </div>
        </div>
    </section>
</x-layout>
