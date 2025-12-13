<div class="fixed z-50 group font-sans" style="position: fixed; bottom: 24px; {{ app()->getLocale() == 'ar' ? 'right: 24px;' : 'left: 24px;' }} z-index: 9999;">
    <!-- Options (Hidden by default, show on hover) -->
    <div class="absolute flex flex-col gap-3 items-center transition-all duration-300 transform" 
         style="position: absolute; bottom: 70px; left: 0; right: 0; opacity: 0; visibility: hidden; width: 100%; display: flex; flex-direction: column; align-items: center;"
         onmouseover="this.style.opacity='1'; this.style.visibility='visible'; this.style.transform='translateY(0)';"
         onmouseout="this.style.opacity='0'; this.style.visibility='hidden'; this.style.transform='translateY(16px)';">
        <!-- Email -->
        <a href="mailto:sh.elbalahy@gmail.com" class="items-center justify-center text-white hover:scale-110 transition-transform" 
           style="width: 48px; height: 48px; border-radius: 50%; background-color: #2563eb; display: flex; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);" 
           title="Email">
            <i class="fas fa-envelope"></i>
        </a>
        <!-- WhatsApp -->
        <a href="https://wa.me/201067481561" target="_blank" class="items-center justify-center text-white hover:scale-110 transition-transform" 
           style="width: 48px; height: 48px; border-radius: 50%; background-color: #22c55e; display: flex; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);" 
           title="WhatsApp">
            <i class="fab fa-whatsapp text-xl"></i>
        </a>
    </div>

    <!-- Main Button -->
    <button class="items-center justify-center text-white shadow-xl hover:scale-105 transition-transform" 
            style="width: 56px; height: 56px; border-radius: 50%; background: linear-gradient(to right, #0284c7, #c026d3); display: flex; font-size: 24px; cursor: pointer; border: none;">
        <i class="fas fa-headset"></i>
    </button>
    
    <!-- Hover Logic Script because inline CSS hover is limited -->
    <script>
        const container = document.currentScript.parentElement;
        const options = container.querySelector('div');
        const button = container.querySelector('button');
        
        container.addEventListener('mouseenter', () => {
            options.style.opacity = '1';
            options.style.visibility = 'visible';
            options.style.transform = 'translateY(0)';
        });
        
        container.addEventListener('mouseleave', () => {
            options.style.opacity = '0';
            options.style.visibility = 'hidden';
            options.style.transform = 'translateY(16px)';
        });
    </script>
</div>
