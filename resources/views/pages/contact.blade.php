<x-layout>
    @section('title', __('Contact Us'))
    @section('meta_description', __('Contact Said Albalahy for backend development and software solutions.'))
<br/>
<br/>
<br/>
    <section class="pt-64 pb-20 relative">
        <div class="container mx-auto px-6">
            <div class="max-w-5xl mx-auto glass-effect rounded-3xl p-8 md:p-12 relative z-10">
                <div class="grid md:grid-cols-2 gap-12">
                    <div>
                        <h1 class="text-3xl md:text-5xl font-bold mb-6 gradient-text">{{ __('Get In Touch') }}</h1>
                        <p class="text-gray-400 mb-8 leading-relaxed">
                            {{ __('contact_intro') }}
                        </p>
                        
                        <div class="space-y-6">
                            <a href="mailto:sh.elbalahy@gmail.com" class="flex items-center gap-4 group">
                                <div class="w-12 h-12 rounded-full glass-effect flex items-center justify-center text-primary-400 group-hover:bg-primary-500 group-hover:text-white transition-all">
                                    <i class="fas fa-envelope text-xl"></i>
                                </div>
                                <div>
                                    <span class="block text-sm text-gray-500">{{ __('Email') }}</span>
                                    <span class="text-lg font-semibold group-hover:text-primary-400 transition-colors">sh.elbalahy@gmail.com</span>
                                </div>
                            </a>
                            
                            <a href="https://wa.me/201067481561" target="_blank" class="flex items-center gap-4 group">
                                <div class="w-12 h-12 rounded-full glass-effect flex items-center justify-center text-accent-400 group-hover:bg-accent-500 group-hover:text-white transition-all">
                                    <i class="fab fa-whatsapp text-xl"></i>
                                </div>
                                <div>
                                    <span class="block text-sm text-gray-500">{{ __('WhatsApp') }}</span>
                                    <span class="text-lg font-semibold group-hover:text-accent-400 transition-colors">01067481561</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <div class="glass-effect bg-dark-950/30 rounded-2xl p-6">
                        @if(session('success'))
                            <div class="mb-4 p-4 text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm text-gray-400 mb-2">{{ __('Name') }}</label>
                                    <input type="text" name="name" required class="w-full bg-dark-900/50 border border-white/10 rounded-lg px-4 py-3 focus:outline-none focus:border-primary-500/50 transition-colors" placeholder="{{ __('Your Name') }}">
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-400 mb-2">{{ __('Email') }}</label>
                                    <input type="email" name="email" required class="w-full bg-dark-900/50 border border-white/10 rounded-lg px-4 py-3 focus:outline-none focus:border-primary-500/50 transition-colors" placeholder="email@example.com">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm text-gray-400 mb-2">{{ __('Subject') }}</label>
                                <input type="text" name="subject" class="w-full bg-dark-900/50 border border-white/10 rounded-lg px-4 py-3 focus:outline-none focus:border-primary-500/50 transition-colors" placeholder="{{ __('What to discuss') }}">
                            </div>
                            <div>
                                <label class="block text-sm text-gray-400 mb-2">{{ __('Message') }}</label>
                                <textarea name="message" rows="4" required class="w-full bg-dark-900/50 border border-white/10 rounded-lg px-4 py-3 focus:outline-none focus:border-primary-500/50 transition-colors" placeholder="{{ __('Write message here') }}"></textarea>
                            </div>
                            <button type="submit" class="w-full btn-primary py-3 rounded-lg flex justify-center items-center gap-2 group">
                                <span>{{ __('Send Message') }}</span>
                                <i class="fas fa-paper-plane group-hover:-translate-y-1 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
