<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8" x-data="{
        layout: {{ json_encode(auth()->user()->dashboard_layout ?? ['stats', 'actions', 'kanban', 'insights']) }},
        async saveLayout(order) {
            await fetch('{{ route('admin.dashboard.layout') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ layout: order })
            });
        }
    }" x-init="
        const el = document.getElementById('sortable-dashboard');
        if (el) {
            new Sortable(el, {
                animation: 150,
                handle: '.drag-handle',
                ghostClass: 'opacity-50',
                onEnd: (evt) => {
                    const order = Array.from(el.children).map(c => c.getAttribute('data-id'));
                    saveLayout(order);
                }
            });
        }
    ">
        <div id="sortable-dashboard" class="space-y-12">
            @foreach(auth()->user()->dashboard_layout ?? ['stats', 'actions', 'kanban', 'insights'] as $sectionId)
                @switch($sectionId)
                    @case('stats')
                        <!-- Quick Stats Summary -->
                        <div data-id="stats" class="relative group">
                            <div class="absolute -top-4 -start-4 opacity-0 group-hover:opacity-100 transition-opacity drag-handle cursor-move p-2 text-gray-400">
                                <i class="fas fa-grip-vertical"></i>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                                <div class="premium-card relative overflow-hidden group/item">
                                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/10 to-transparent"></div>
                                    <div class="relative z-10">
                                        <div class="flex items-center justify-between mb-4">
                                            <span class="text-[10px] font-black uppercase text-indigo-600 dark:text-indigo-400 tracking-[0.2em]">{{ __('Total Traffic') }}</span>
                                            <div class="w-10 h-10 rounded-2xl bg-indigo-100 dark:bg-indigo-900/50 flex items-center justify-center group-hover/item:scale-110 transition-transform duration-500 shadow-lg shadow-indigo-500/10">
                                                <i class="fas fa-eye text-indigo-600 dark:text-indigo-400"></i>
                                            </div>
                                        </div>
                                        <div class="flex items-baseline gap-2">
                                            <h4 class="text-4xl font-black text-slate-800 dark:text-white">{{ number_format($stats['total_visits'] ?? 0) }}</h4>
                                            <span class="text-[10px] text-indigo-500 font-black uppercase tracking-wider">+{{ $stats['today_visits'] ?? 0 }} {{ __('today') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="premium-card relative overflow-hidden group/item">
                                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/10 to-transparent"></div>
                                    <div class="relative z-10">
                                        <div class="flex items-center justify-between mb-4">
                                            <span class="text-[10px] font-black uppercase text-emerald-600 dark:text-emerald-400 tracking-[0.2em]">{{ __('Blog Posts') }}</span>
                                            <div class="w-10 h-10 rounded-2xl bg-emerald-100 dark:bg-emerald-900/50 flex items-center justify-center group-hover/item:scale-110 transition-transform duration-500 shadow-lg shadow-emerald-500/10">
                                                <i class="fas fa-newspaper text-emerald-600 dark:text-emerald-400"></i>
                                            </div>
                                        </div>
                                        <h4 class="text-4xl font-black text-slate-800 dark:text-white">{{ $stats['total_posts'] ?? 0 }}</h4>
                                    </div>
                                </div>

                                <div class="premium-card relative overflow-hidden group/item">
                                    <div class="absolute inset-0 bg-gradient-to-br from-amber-500/10 to-transparent"></div>
                                    <div class="relative z-10">
                                        <div class="flex items-center justify-between mb-4">
                                            <span class="text-[10px] font-black uppercase text-amber-600 dark:text-amber-400 tracking-[0.2em]">{{ __('Portfolio Projects') }}</span>
                                            <div class="w-10 h-10 rounded-2xl bg-amber-100 dark:bg-amber-900/50 flex items-center justify-center group-hover/item:scale-110 transition-transform duration-500 shadow-lg shadow-amber-500/10">
                                                <i class="fas fa-briefcase text-amber-600 dark:text-amber-400"></i>
                                            </div>
                                        </div>
                                        <h4 class="text-4xl font-black text-slate-800 dark:text-white">{{ $stats['total_projects'] ?? 0 }}</h4>
                                    </div>
                                </div>

                                <div class="premium-card relative overflow-hidden group/item">
                                    <div class="absolute inset-0 bg-gradient-to-br from-rose-500/10 to-transparent"></div>
                                    <div class="relative z-10">
                                        <div class="flex items-center justify-between mb-4">
                                            <span class="text-[10px] font-black uppercase text-rose-600 dark:text-rose-400 tracking-[0.2em]">{{ __('System Status') }}</span>
                                            <div class="w-3 h-3 rounded-full bg-rose-500 animate-pulse shadow-lg shadow-rose-500/50"></div>
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <span class="text-xl font-black text-slate-700 dark:text-slate-300">{{ __('Operational') }}</span>
                                            <i class="fas fa-check-circle text-rose-500 text-xl"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @break

                    @case('actions')
                        <!-- Quick Actions Grid -->
                        <div data-id="actions" class="relative group">
                            <div class="absolute -top-4 -start-4 opacity-0 group-hover:opacity-100 transition-opacity drag-handle cursor-move p-2 text-gray-400">
                                <i class="fas fa-grip-vertical"></i>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                                <!-- Manage Blog -->
                                @if(auth()->user()->isEditor())
                                <div class="premium-card relative group/item overflow-hidden">
                                    <div class="absolute top-0 right-0 p-8 opacity-5 group-hover/item:scale-150 group-hover/item:-rotate-12 transition-all duration-700">
                                        <i class="fas fa-newspaper text-8xl text-indigo-600"></i>
                                    </div>
                                    <div class="relative z-10">
                                        <div class="w-14 h-14 bg-indigo-100 dark:bg-indigo-900/50 rounded-3xl flex items-center justify-center mb-6 group-hover/item:scale-110 group-hover/item:rotate-3 transition-all duration-500 shadow-xl shadow-indigo-500/10">
                                            <i class="fas fa-newspaper text-indigo-600 dark:text-indigo-400 text-2xl"></i>
                                        </div>
                                        <h3 class="text-2xl font-black mb-3 text-slate-800 dark:text-white">{{ __('Manage Blog') }}</h3>
                                        <a href="{{ route('admin.posts.index') }}" wire:navigate class="inline-flex items-center text-indigo-600 dark:text-indigo-400 font-black text-sm hover:gap-3 transition-all duration-300 group/btn">
                                            {{ __('Go to Blog') }}
                                            <i class="fas fa-arrow-right ms-2 rtl:rotate-180 group-hover/btn:translate-x-1"></i>
                                        </a>
                                    </div>
                                </div>
                                @endif

                                <!-- Manage Projects -->
                                @if(auth()->user()->isEditor())
                                <div class="premium-card relative group/item overflow-hidden">
                                    <div class="absolute top-0 right-0 p-8 opacity-5 group-hover/item:scale-150 group-hover/item:-rotate-12 transition-all duration-700">
                                        <i class="fas fa-briefcase text-8xl text-emerald-600"></i>
                                    </div>
                                    <div class="relative z-10">
                                        <div class="w-14 h-14 bg-emerald-100 dark:bg-emerald-900/50 rounded-3xl flex items-center justify-center mb-6 group-hover/item:scale-110 group-hover/item:rotate-3 transition-all duration-500 shadow-xl shadow-emerald-500/10">
                                            <i class="fas fa-briefcase text-emerald-600 dark:text-emerald-400 text-2xl"></i>
                                        </div>
                                        <h3 class="text-2xl font-black mb-3 text-slate-800 dark:text-white">{{ __('Manage Projects') }}</h3>
                                        <a href="{{ route('admin.projects.index') }}" wire:navigate class="inline-flex items-center text-emerald-600 dark:text-emerald-400 font-black text-sm hover:gap-3 transition-all duration-300 group/btn">
                                            {{ __('Go to Projects') }}
                                            <i class="fas fa-arrow-right ms-2 rtl:rotate-180 group-hover/btn:translate-x-1"></i>
                                        </a>
                                    </div>
                                </div>
                                @endif

                                <!-- Categories -->
                                @if(auth()->user()->isEditor())
                                <div class="premium-card relative group/item overflow-hidden">
                                    <div class="absolute top-0 right-0 p-8 opacity-5 group-hover/item:scale-150 group-hover/item:-rotate-12 transition-all duration-700">
                                        <i class="fas fa-folder text-8xl text-amber-600"></i>
                                    </div>
                                    <div class="relative z-10">
                                        <div class="w-14 h-14 bg-amber-100 dark:bg-amber-900/50 rounded-3xl flex items-center justify-center mb-6 group-hover/item:scale-110 group-hover/item:rotate-3 transition-all duration-500 shadow-xl shadow-amber-500/10">
                                            <i class="fas fa-folder text-amber-600 dark:text-amber-400 text-2xl"></i>
                                        </div>
                                        <h3 class="text-2xl font-black mb-3 text-slate-800 dark:text-white">{{ __('Categories') }}</h3>
                                        <a href="{{ route('admin.categories.index') }}" wire:navigate class="inline-flex items-center text-amber-600 dark:text-amber-400 font-black text-sm hover:gap-3 transition-all duration-300 group/btn">
                                            {{ __('Manage Categories') }}
                                            <i class="fas fa-arrow-right ms-2 rtl:rotate-180 group-hover/btn:translate-x-1"></i>
                                        </a>
                                    </div>
                                </div>
                                @endif

                                <!-- Tags -->
                                @if(auth()->user()->isEditor())
                                <div class="premium-card relative group/item overflow-hidden">
                                    <div class="absolute top-0 right-0 p-8 opacity-5 group-hover/item:scale-150 group-hover/item:-rotate-12 transition-all duration-700">
                                        <i class="fas fa-tags text-8xl text-blue-600"></i>
                                    </div>
                                    <div class="relative z-10">
                                        <div class="w-14 h-14 bg-blue-100 dark:bg-blue-900/50 rounded-3xl flex items-center justify-center mb-6 group-hover/item:scale-110 group-hover/item:rotate-3 transition-all duration-500 shadow-xl shadow-blue-500/10">
                                            <i class="fas fa-tags text-blue-600 dark:text-blue-400 text-2xl"></i>
                                        </div>
                                        <h3 class="text-2xl font-black mb-3 text-slate-800 dark:text-white">{{ __('Tags') }}</h3>
                                        <a href="{{ route('admin.tags.index') }}" wire:navigate class="inline-flex items-center text-blue-600 dark:text-blue-400 font-black text-sm hover:gap-3 transition-all duration-300 group/btn">
                                            {{ __('Manage Tags') }}
                                            <i class="fas fa-arrow-right ms-2 rtl:rotate-180 group-hover/btn:translate-x-1"></i>
                                        </a>
                                    </div>
                                </div>
                                @endif

                                <!-- Skills -->
                                @if(auth()->user()->isAdmin())
                                <div class="premium-card relative group/item overflow-hidden">
                                    <div class="absolute top-0 right-0 p-8 opacity-5 group-hover/item:scale-150 group-hover/item:-rotate-12 transition-all duration-700">
                                        <i class="fas fa-code text-8xl text-purple-600"></i>
                                    </div>
                                    <div class="relative z-10">
                                        <div class="w-14 h-14 bg-purple-100 dark:bg-purple-900/50 rounded-3xl flex items-center justify-center mb-6 group-hover/item:scale-110 group-hover/item:rotate-3 transition-all duration-500 shadow-xl shadow-purple-500/10">
                                            <i class="fas fa-code text-purple-600 dark:text-purple-400 text-2xl"></i>
                                        </div>
                                        <h3 class="text-2xl font-black mb-3 text-slate-800 dark:text-white">{{ __('Skills') }}</h3>
                                        <a href="{{ route('admin.skills.index') }}" wire:navigate class="inline-flex items-center text-purple-600 dark:text-purple-400 font-black text-sm hover:gap-3 transition-all duration-300 group/btn">
                                            {{ __('Manage Skills') }}
                                            <i class="fas fa-arrow-right ms-2 rtl:rotate-180 group-hover/btn:translate-x-1"></i>
                                        </a>
                                    </div>
                                </div>
                                @endif

                                <!-- Users -->
                                @if(auth()->user()->isAdmin())
                                <div class="premium-card relative group/item overflow-hidden">
                                    <div class="absolute top-0 right-0 p-8 opacity-5 group-hover/item:scale-150 group-hover/item:-rotate-12 transition-all duration-700">
                                        <i class="fas fa-users text-8xl text-rose-600"></i>
                                    </div>
                                    <div class="relative z-10">
                                        <div class="w-14 h-14 bg-rose-100 dark:bg-rose-900/50 rounded-3xl flex items-center justify-center mb-6 group-hover/item:scale-110 group-hover/item:rotate-3 transition-all duration-500 shadow-xl shadow-rose-500/10">
                                            <i class="fas fa-users text-rose-600 dark:text-rose-400 text-2xl"></i>
                                        </div>
                                        <h3 class="text-2xl font-black mb-3 text-slate-800 dark:text-white">{{ __('Users & Roles') }}</h3>
                                        <a href="{{ route('admin.users.index') }}" wire:navigate class="inline-flex items-center text-rose-600 dark:text-rose-400 font-black text-sm hover:gap-3 transition-all duration-300 group/btn">
                                            {{ __('Manage Users') }}
                                            <i class="fas fa-arrow-right ms-2 rtl:rotate-180 group-hover/btn:translate-x-1"></i>
                                        </a>
                                    </div>
                                </div>
                                @endif

                                <!-- Settings -->
                                @if(auth()->user()->isAdmin())
                                <div class="premium-card relative group/item overflow-hidden">
                                    <div class="absolute top-0 right-0 p-8 opacity-5 group-hover/item:scale-150 group-hover/item:-rotate-12 transition-all duration-700">
                                        <i class="fas fa-cog text-8xl text-slate-600"></i>
                                    </div>
                                    <div class="relative z-10">
                                        <div class="w-14 h-14 bg-slate-100 dark:bg-slate-800 rounded-3xl flex items-center justify-center mb-6 group-hover/item:scale-110 group-hover/item:rotate-3 transition-all duration-500 shadow-xl shadow-slate-500/10">
                                            <i class="fas fa-cog text-slate-600 dark:text-slate-400 text-2xl"></i>
                                        </div>
                                        <h3 class="text-2xl font-black mb-3 text-slate-800 dark:text-white">{{ __('Settings') }}</h3>
                                        <a href="{{ route('admin.settings.index') }}" wire:navigate class="inline-flex items-center text-slate-600 dark:text-slate-400 font-black text-sm hover:gap-3 transition-all duration-300 group/btn">
                                            {{ __('Go to Settings') }}
                                            <i class="fas fa-arrow-right ms-2 rtl:rotate-180 group-hover/btn:translate-x-1"></i>
                                        </a>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        @break

                    @case('kanban')
                        @if(auth()->user()->isEditor() || auth()->user()->isModerator())
                        <!-- Task Manager Section (Kanban) -->
                        <div data-id="kanban" class="relative group" x-data="{
                            tasks: [],
                            users: [],
                            newTask: '',
                            priority: 'medium',
                            loading: false,
                            editModalOpen: false,
                            editTaskData: { id: null, title: '', priority: 'medium', assigned_to: null, description: '', links: '', attachments: [] },
                            columns: [
                                { id: 'todo', name: '{{ __("To Do") }}', color: 'indigo' },
                                { id: 'in_progress', name: '{{ __("In Progress") }}', color: 'amber' },
                                { id: 'done', name: '{{ __("Done") }}', color: 'emerald' }
                            ],
                            async fetchData() {
                                this.loading = true;
                                const res = await fetch('{{ route('admin.tasks.index') }}', {
                                    headers: { 'Accept': 'application/json' }
                                });
                                const data = await res.json();
                                this.tasks = data.tasks;
                                this.users = data.users;
                                this.loading = false;
                            },
                            async addTask() {
                                if (!this.newTask.trim()) return;
                                const res = await fetch('{{ route('admin.tasks.store') }}', {
                                    method: 'POST',
                                    headers: { 
                                        'Content-Type': 'application/json', 
                                        'Accept': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}' 
                                    },
                                    body: JSON.stringify({ title: this.newTask, priority: this.priority, status: 'todo' })
                                });
                                if (res.ok) {
                                    this.newTask = '';
                                    this.fetchData();
                                }
                            },
                            openEditModal(task) {
                                this.editTaskData = { 
                                    id: task.id, 
                                    title: task.title, 
                                    priority: task.priority, 
                                    assigned_to: task.assigned_to,
                                    description: task.description || '',
                                    links: task.links ? task.links.join('\n') : '',
                                    attachments: task.attachments || []
                                };
                                this.editModalOpen = true;
                            },
                            async updateTask() {
                                if (!this.editTaskData.title.trim()) return;
                                
                                const formData = new FormData();
                                formData.append('_method', 'PATCH');
                                formData.append('title', this.editTaskData.title);
                                formData.append('priority', this.editTaskData.priority);
                                if (this.editTaskData.assigned_to) formData.append('assigned_to', this.editTaskData.assigned_to);
                                if (this.editTaskData.description) formData.append('description', this.editTaskData.description);
                                if (this.editTaskData.links) formData.append('links', this.editTaskData.links);

                                const fileInput = this.$refs.fileInput;
                                if (fileInput && fileInput.files.length > 0) {
                                    for (let i = 0; i < fileInput.files.length; i++) {
                                        formData.append('attachments[]', fileInput.files[i]);
                                    }
                                }

                                const res = await fetch(`/admin/tasks/${this.editTaskData.id}`, {
                                    method: 'POST',
                                    headers: { 
                                        'Accept': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}' 
                                    },
                                    body: formData
                                });
                                if (res.ok) {
                                    this.editModalOpen = false;
                                    this.fetchData();
                                    if (fileInput) fileInput.value = '';
                                }
                            },
                            async moveTask(task, newStatus) {
                                await fetch(`/admin/tasks/${task.id}`, {
                                    method: 'PATCH',
                                    headers: { 
                                        'Content-Type': 'application/json', 
                                        'Accept': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}' 
                                    },
                                    body: JSON.stringify({ status: newStatus })
                                });
                                this.fetchData();
                            },
                            async assignTask(task, userId) {
                                await fetch(`/admin/tasks/${task.id}`, {
                                    method: 'PATCH',
                                    headers: { 
                                        'Content-Type': 'application/json', 
                                        'Accept': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}' 
                                    },
                                    body: JSON.stringify({ assigned_to: userId })
                                });
                                this.fetchData();
                            },
                            async deleteTask(id) {
                                if (!confirm('{{ __("Delete this task?") }}')) return;
                                await fetch(`/admin/tasks/${id}`, {
                                    method: 'DELETE',
                                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                                });
                                this.fetchData();
                            }
                        }" x-init="fetchData()">
                            <div class="absolute -top-4 -start-4 opacity-0 group-hover:opacity-100 transition-opacity drag-handle cursor-move p-2 text-gray-400">
                                <i class="fas fa-grip-vertical"></i>
                            </div>
                            <div class="flex items-center justify-between mb-8">
                                <h3 class="text-3xl font-black text-slate-800 dark:text-white flex items-center gap-4">
                                    <div class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center shadow-lg shadow-indigo-500/20">
                                        <i class="fas fa-columns text-white text-lg"></i>
                                    </div>
                                    {{ __('Kanban Board') }}
                                </h3>
                                
                                <div x-data="{ open: false }" class="relative">
                                    <button @click="open = !open" class="btn-premium-primary">
                                        <i class="fas fa-plus"></i>
                                        {{ __('New Task') }}
                                    </button>
                                    
                                    <div x-show="open" @click.away="open = false" x-cloak class="absolute end-0 mt-4 w-80 premium-card z-50 animate-in fade-in slide-in-from-top-2">
                                        <h4 class="font-black mb-4 text-slate-800 dark:text-white">{{ __('Create Task') }}</h4>
                                        <div class="space-y-4">
                                            <input type="text" x-model="newTask" @keydown.enter="addTask(); open = false" placeholder="Task title..." class="premium-input !p-3 text-sm">
                                            <div class="flex gap-2">
                                                <template x-for="p in ['low', 'medium', 'high']">
                                                    <button @click="priority = p" :class="priority === p ? 'bg-indigo-600 text-white' : 'bg-gray-100 dark:bg-slate-800 text-gray-400'" class="flex-1 py-2 rounded-xl text-[9px] font-black uppercase tracking-widest transition-all" x-text="p"></button>
                                                </template>
                                            </div>
                                            <button @click="addTask(); open = false" class="w-full btn-premium-primary !py-2.5 text-sm">
                                                {{ __('Save Task') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Edit Modal Overlay -->
                            <div x-show="editModalOpen" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center bg-slate-900/50 backdrop-blur-sm">
                                <div @click.away="editModalOpen = false" class="premium-card w-full max-w-md animate-in zoom-in-95">
                                    <h4 class="font-black text-xl mb-6 text-slate-800 dark:text-white">{{ __('Edit Task') }}</h4>
                                    <div class="space-y-5">
                                        <div>
                                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-2">{{ __('Task Title') }}</label>
                                            <input type="text" x-model="editTaskData.title" @keydown.enter="updateTask()" class="premium-input w-full">
                                        </div>
                                        <div>
                                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-2">{{ __('Description') }}</label>
                                            <textarea x-model="editTaskData.description" rows="3" class="premium-input w-full resize-none" placeholder="{{ __('Add details...') }}"></textarea>
                                        </div>
                                        <div>
                                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-2">{{ __('Links (one per line)') }}</label>
                                            <textarea x-model="editTaskData.links" rows="2" class="premium-input w-full resize-none" placeholder="https://..."></textarea>
                                        </div>
                                        <div>
                                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-2">{{ __('Attachments') }}</label>
                                            <input type="file" x-ref="fileInput" multiple class="premium-input w-full file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                            
                                            <template x-if="editTaskData.attachments.length > 0">
                                                <div class="mt-3 space-y-2">
                                                    <template x-for="(att, index) in editTaskData.attachments" :key="index">
                                                        <div class="flex items-center justify-between bg-slate-50 dark:bg-slate-800 p-2 rounded-lg">
                                                            <a :href="att.url" target="_blank" class="text-xs text-indigo-600 truncate max-w-[200px]" x-text="att.name"></a>
                                                            <!-- Note: Delete logic can be added later, keeping it read-only for now -->
                                                        </div>
                                                    </template>
                                                </div>
                                            </template>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-2">{{ __('Priority') }}</label>
                                                <div class="flex gap-2">
                                                    <template x-for="p in ['low', 'medium', 'high']">
                                                        <button @click="editTaskData.priority = p" :class="editTaskData.priority === p ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-500/20' : 'bg-slate-100 dark:bg-slate-800 text-slate-500 hover:bg-slate-200 dark:hover:bg-slate-700'" class="flex-1 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all" x-text="p"></button>
                                                    </template>
                                                </div>
                                            </div>
                                            <div>
                                                <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-2">{{ __('Assign To') }}</label>
                                                <select x-model="editTaskData.assigned_to" class="premium-input w-full appearance-none !py-2">
                                                    <option value="">{{ __('Unassigned') }}</option>
                                                    <template x-for="user in users" :key="user.id">
                                                        <option :value="user.id" x-text="user.name" :selected="editTaskData.assigned_to === user.id"></option>
                                                    </template>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="flex gap-3 pt-4 border-t border-slate-100 dark:border-slate-800">
                                            <button @click="editModalOpen = false" class="flex-1 py-3 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 rounded-2xl font-black text-slate-600 dark:text-slate-300 transition-colors">{{ __('Cancel') }}</button>
                                            <button @click="updateTask()" class="flex-1 btn-premium-primary !py-3">{{ __('Save Changes') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start">
                                <template x-for="col in columns" :key="col.id">
                                    <div class="flex flex-col h-full bg-slate-100/50 dark:bg-slate-900/30 rounded-[2.5rem] border border-white/20 dark:border-white/5 min-h-[450px]">
                                        <div class="p-8 flex items-center justify-between">
                                            <div class="flex items-center gap-3">
                                                <span :class="'bg-' + col.color + '-500'" class="w-2 h-2 rounded-full shadow-[0_0_8px_rgba(var(--color-primary-500),0.5)]"></span>
                                                <h4 class="font-black text-xs uppercase tracking-[0.2em] text-slate-400" x-text="col.name"></h4>
                                            </div>
                                            <span class="bg-white/50 dark:bg-slate-800 px-3 py-1 rounded-full text-[10px] font-black text-slate-500" x-text="tasks.filter(t => t.status === col.id).length"></span>
                                        </div>
                                        <div class="px-4 pb-8 flex-1 space-y-4">
                                            <template x-for="task in tasks.filter(t => t.status === col.id)" :key="task.id">
                                                <div class="premium-card !p-5 group/task">
                                                    <div class="flex justify-between items-start mb-4">
                                                        <span :class="{
                                                            'bg-emerald-100 text-emerald-600': task.priority === 'low',
                                                            'bg-amber-100 text-amber-600': task.priority === 'medium',
                                                            'bg-rose-100 text-rose-600': task.priority === 'high'
                                                        }" class="text-[8px] font-black uppercase tracking-widest px-2.5 py-1 rounded-lg" x-text="task.priority"></span>
                                                        <div class="flex gap-1">
                                                            <button @click="openEditModal(task)" class="opacity-0 group-hover/task:opacity-100 transition-opacity p-1.5 text-indigo-500 hover:bg-indigo-50 dark:hover:bg-indigo-900/30 rounded-lg">
                                                                <i class="fas fa-edit text-xs"></i>
                                                            </button>
                                                            <button @click="deleteTask(task.id)" class="opacity-0 group-hover/task:opacity-100 transition-opacity p-1.5 text-rose-500 hover:bg-rose-50 dark:hover:bg-rose-900/30 rounded-lg">
                                                                <i class="fas fa-trash-alt text-xs"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <h5 class="font-black text-slate-800 dark:text-slate-200 mb-4 leading-relaxed" x-text="task.title"></h5>
                                                    
                                                    <div class="flex gap-3 mb-4 text-slate-400">
                                                        <template x-if="task.description">
                                                            <i class="fas fa-align-left text-xs" title="{{ __('Has description') }}"></i>
                                                        </template>
                                                        <template x-if="task.attachments && task.attachments.length > 0">
                                                            <div class="flex items-center gap-1" title="{{ __('Has attachments') }}">
                                                                <i class="fas fa-paperclip text-xs"></i>
                                                                <span class="text-[10px] font-bold" x-text="task.attachments.length"></span>
                                                            </div>
                                                        </template>
                                                        <template x-if="task.links && task.links.length > 0">
                                                            <div class="flex items-center gap-1" title="{{ __('Has links') }}">
                                                                <i class="fas fa-link text-xs"></i>
                                                                <span class="text-[10px] font-bold" x-text="task.links.length"></span>
                                                            </div>
                                                        </template>
                                                    </div>
                                                    <div class="flex items-center justify-between pt-4 border-t border-gray-50 dark:border-slate-800">
                                                        <div class="flex items-center gap-2">
                                                            <button x-show="col.id !== 'todo'" @click="moveTask(task, columns[columns.findIndex(c => c.id === col.id) - 1].id)" class="p-2 rounded-xl bg-gray-50 dark:bg-slate-800 text-gray-400 hover:text-indigo-600 transition-colors"><i class="fas fa-chevron-left rtl:rotate-180 text-[10px]"></i></button>
                                                            <button x-show="col.id !== 'done'" @click="moveTask(task, columns[columns.findIndex(c => c.id === col.id) + 1].id)" class="p-2 rounded-xl bg-gray-50 dark:bg-slate-800 text-gray-400 hover:text-indigo-600 transition-colors"><i class="fas fa-chevron-right rtl:rotate-180 text-[10px]"></i></button>
                                                        </div>
                                                        <div class="flex -space-x-2">
                                                            <template x-if="task.assignee">
                                                                <div class="w-7 h-7 rounded-full bg-gradient-to-tr from-indigo-500 to-violet-500 border-2 border-white dark:border-slate-900 flex items-center justify-center text-[8px] font-black text-white" x-text="task.assignee.name.substring(0, 2).toUpperCase()" :title="task.assignee.name"></div>
                                                            </template>
                                                            <template x-if="!task.assignee">
                                                                <div class="w-7 h-7 rounded-full bg-slate-200 dark:bg-slate-700 border-2 border-white dark:border-slate-900 flex items-center justify-center text-[10px] text-slate-400" title="{{ __('Unassigned') }}">
                                                                    <i class="fas fa-user-slash"></i>
                                                                </div>
                                                            </template>
                                                        </div>
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                        @endif                        @break

                    @case('insights')
                        <!-- Smart Insights Section -->
                        <div data-id="insights" class="relative group" x-data="{
                            insights: [],
                            loading: false,
                            async fetchInsights() {
                                this.loading = true;
                                const res = await fetch('{{ route('admin.notifications.index', ['status' => 'unread']) }}', {
                                    headers: { 'Accept': 'application/json' }
                                });
                                const data = await res.json();
                                this.insights = data.data.slice(0, 3);
                                this.loading = false;
                            }
                        }" x-init="fetchInsights()">
                            <div class="absolute -top-4 -start-4 opacity-0 group-hover:opacity-100 transition-opacity drag-handle cursor-move p-2 text-gray-400">
                                <i class="fas fa-grip-vertical"></i>
                            </div>
                            <div class="flex items-center justify-between mb-8">
                                <h3 class="text-3xl font-black text-slate-800 dark:text-white flex items-center gap-4">
                                    <div class="w-12 h-12 bg-amber-500 rounded-2xl flex items-center justify-center shadow-lg shadow-amber-500/20">
                                        <i class="fas fa-lightbulb text-white text-lg"></i>
                                    </div>
                                    {{ __('Smart Insights') }}
                                </h3>
                            </div>
                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                                <template x-for="insight in insights" :key="insight.id">
                                    <div class="premium-card !p-8 border-s-4 hover:scale-[1.02] transition-all" 
                                         :class="{
                                            'border-amber-500 shadow-amber-500/5': insight.type === 'trend',
                                            'border-purple-500 shadow-purple-500/5': insight.type === 'milestone',
                                            'border-emerald-500 shadow-emerald-500/5': insight.type === 'success',
                                            'border-rose-500 shadow-rose-500/5': insight.type === 'warning',
                                            'border-blue-500 shadow-blue-500/5': insight.type === 'info'
                                         }">
                                        <h4 class="font-black text-slate-800 dark:text-slate-100 mb-3 text-lg" x-text="insight.title"></h4>
                                        <p class="text-sm text-gray-500 dark:text-slate-400 leading-relaxed" x-text="insight.message"></p>
                                    </div>
                                </template>
                            </div>
                        </div>
                        @break
                @endswitch
            @endforeach
        </div>
    </div>

    <!-- Sortable.js -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
</x-app-layout>
