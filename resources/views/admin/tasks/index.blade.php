<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-gray-800 dark:text-white leading-tight">
                {{ __('Task Management Center') }}
            </h2>
            <div class="flex items-center gap-4">
                <span class="text-xs font-black uppercase text-gray-400 tracking-widest hidden md:block">
                    {{ __('Project Management Board') }}
                </span>
            </div>
        </div>
    </x-slot>

    <div x-data="{
        tasks: [],
        users: [],
        newTask: '',
        priority: 'medium',
        loading: false,
        columns: [
            { id: 'todo', name: '{{ __("To Do") }}', color: 'indigo' },
            { id: 'in_progress', name: '{{ __("In Progress") }}', color: 'amber' },
            { id: 'done', name: '{{ __("Done") }}', color: 'emerald' }
        ],
        async fetchData() {
            this.loading = true;
            try {
                const res = await fetch('{{ route('admin.tasks.index') }}', {
                    headers: { 'Accept': 'application/json' }
                });
                const data = await res.json();
                this.tasks = data.tasks;
                this.users = data.users;
            } catch (e) {
                console.error('Failed to fetch tasks', e);
            }
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
    }" x-init="fetchData()" class="space-y-8">
        
        <!-- Toolbar -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 glass p-6 rounded-[2rem]">
            <div class="flex items-center gap-4 flex-1">
                <input type="text" x-model="newTask" @keydown.enter="addTask" placeholder="{{ __('What needs to be done?') }}" class="flex-1 max-w-md bg-gray-50 dark:bg-slate-800 border-0 rounded-2xl p-4 focus:ring-2 focus:ring-indigo-500 transition-all">
                <div class="flex gap-1 bg-gray-100 dark:bg-slate-800 p-1.5 rounded-2xl">
                    <template x-for="p in ['low', 'medium', 'high']">
                        <button @click="priority = p" 
                                :class="priority === p ? 'bg-white dark:bg-slate-700 shadow-sm text-indigo-600' : 'text-gray-400'" 
                                class="px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-wider transition-all" 
                                x-text="p"></button>
                    </template>
                </div>
                <button @click="addTask" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-4 rounded-2xl font-bold transition-all shadow-lg shadow-indigo-500/20 active:scale-95">
                    {{ __('Add Task') }}
                </button>
            </div>
            
            <div class="flex items-center gap-3">
                <div class="flex items-center -space-x-3 rtl:space-x-reverse">
                    <template x-for="user in users.slice(0, 5)" :key="user.id">
                        <div class="w-10 h-10 rounded-full border-4 border-white dark:border-slate-900 bg-indigo-100 flex items-center justify-center" :title="user.name">
                            <span class="text-[10px] font-black text-indigo-600" x-text="user.name.substring(0, 2).toUpperCase()"></span>
                        </div>
                    </template>
                </div>
                <span class="text-xs font-bold text-gray-500" x-show="users.length > 5">+<span x-text="users.length - 5"></span> {{ __('more') }}</span>
            </div>
        </div>

        <!-- Kanban Board -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start min-h-[70vh]">
            <template x-for="col in columns" :key="col.id">
                <div class="flex flex-col h-full bg-gray-100/30 dark:bg-slate-900/40 rounded-[2.5rem] border border-gray-100/50 dark:border-slate-800/30 min-h-[600px] overflow-hidden">
                    <!-- Column Header -->
                    <div class="p-8 pb-4 flex items-center justify-between sticky top-0 bg-gray-100/10 backdrop-blur-md z-10">
                        <div class="flex items-center gap-4">
                            <div :class="'bg-' + col.color + '-500'" class="w-3 h-3 rounded-full shadow-lg"></div>
                            <h4 class="font-black text-lg uppercase tracking-widest text-gray-700 dark:text-slate-300" x-text="col.name"></h4>
                        </div>
                        <span class="bg-indigo-600 text-white px-3 py-1 rounded-full text-xs font-black" x-text="tasks.filter(t => t.status === col.id).length"></span>
                    </div>

                    <!-- Cards Area -->
                    <div class="p-6 pt-2 flex-1 space-y-5 overflow-y-auto custom-scrollbar">
                        <template x-for="task in tasks.filter(t => t.status === col.id)" :key="task.id">
                            <div class="glass p-6 rounded-3xl shadow-sm border border-white/40 dark:border-slate-700/40 group hover:shadow-2xl hover:scale-[1.02] transition-all duration-500 cursor-default">
                                <div class="flex justify-between items-start mb-4">
                                    <span :class="{
                                        'bg-emerald-100 text-emerald-600': task.priority === 'low',
                                        'bg-amber-100 text-amber-600': task.priority === 'medium',
                                        'bg-rose-100 text-rose-600': task.priority === 'high'
                                    }" class="text-[10px] font-black uppercase tracking-widest px-3 py-1.5 rounded-xl shadow-sm" x-text="task.priority"></span>
                                    
                                    <button @click="deleteTask(task.id)" class="opacity-0 group-hover:opacity-100 p-2 text-gray-400 hover:text-rose-500 transition-all rounded-xl hover:bg-rose-50 dark:hover:bg-rose-900/20">
                                        <i class="fas fa-trash-alt text-xs"></i>
                                    </button>
                                </div>

                                <h5 class="text-base font-bold text-gray-800 dark:text-slate-100 mb-6 leading-relaxed" x-text="task.title"></h5>

                                <div class="flex items-center justify-between pt-6 border-t border-gray-100 dark:border-slate-800/50">
                                    <div class="relative" x-data="{ open: false }">
                                        <button @click="open = !open" class="flex items-center gap-2 group/user p-1 rounded-full hover:bg-gray-50 dark:hover:bg-slate-800 transition-all">
                                            <div class="w-10 h-10 rounded-full border-2 border-indigo-100 dark:border-indigo-900/50 bg-indigo-50 dark:bg-indigo-900/20 flex items-center justify-center overflow-hidden transition-all group-hover/user:scale-110">
                                                <template x-if="task.assignee">
                                                    <span class="text-[11px] font-black text-indigo-600 uppercase" x-text="task.assignee.name.substring(0, 2)"></span>
                                                </template>
                                                <template x-if="!task.assignee">
                                                    <i class="fas fa-user-plus text-[11px] text-gray-400"></i>
                                                </template>
                                            </div>
                                            <span class="text-[11px] font-black text-gray-500 uppercase tracking-tighter" x-text="task.assignee ? task.assignee.name.split(' ')[0] : '{{ __('Unassigned') }}'"></span>
                                        </button>

                                        <!-- User Dropdown -->
                                        <div x-show="open" @click.away="open = false" x-cloak class="absolute bottom-full mb-4 start-0 w-56 glass p-3 rounded-3xl shadow-2xl z-50 border border-white/20 animate-in fade-in slide-in-from-bottom-2">
                                            <h6 class="text-[10px] font-black uppercase text-gray-400 mb-3 px-2 tracking-widest">{{ __('Assign Member') }}</h6>
                                            <div class="max-h-48 overflow-y-auto px-1">
                                                <template x-for="user in users" :key="user.id">
                                                    <button @click="assignTask(task, user.id); open = false" 
                                                            :class="task.assigned_to === user.id ? 'bg-indigo-600 text-white shadow-lg' : 'hover:bg-indigo-50 dark:hover:bg-indigo-900/40 text-gray-600 dark:text-slate-300'"
                                                            class="w-full text-start px-4 py-3 rounded-2xl text-xs font-bold transition-all flex items-center justify-between mb-1">
                                                        <span x-text="user.name"></span>
                                                        <i class="fas fa-check text-[10px]" x-show="task.assigned_to === user.id"></i>
                                                    </button>
                                                </template>
                                            </div>
                                            <button @click="assignTask(task, null); open = false" class="w-full text-start px-4 py-3 rounded-2xl hover:bg-rose-500 hover:text-white text-xs font-extrabold transition-all border-t border-gray-100 dark:border-slate-800 mt-2 text-rose-500">
                                                <i class="fas fa-user-minus me-2"></i> {{ __('Remove Assignee') }}
                                            </button>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-1.5 p-1 bg-gray-50 dark:bg-slate-800 rounded-2xl shadow-inner">
                                        <button x-show="col.id !== 'todo'" @click="moveTask(task, columns[columns.findIndex(c => c.id === col.id) - 1].id)" class="w-9 h-9 flex items-center justify-center rounded-xl hover:bg-white dark:hover:bg-slate-700 hover:shadow-sm text-gray-400 hover:text-indigo-600 transition-all active:scale-90">
                                            <i class="fas fa-chevron-left rtl:rotate-180 text-[10px]"></i>
                                        </button>
                                        <button x-show="col.id !== 'done'" @click="moveTask(task, columns[columns.findIndex(c => c.id === col.id) + 1].id)" class="w-9 h-9 flex items-center justify-center rounded-xl hover:bg-white dark:hover:bg-slate-700 hover:shadow-sm text-gray-400 hover:text-indigo-600 transition-all active:scale-90">
                                            <i class="fas fa-chevron-right rtl:rotate-180 text-[10px]"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <!-- Column Empty State -->
                        <template x-if="tasks.filter(t => t.status === col.id).length === 0">
                            <div class="h-64 border-4 border-dashed border-gray-200 dark:border-slate-800 rounded-[3rem] flex flex-col items-center justify-center text-gray-300 dark:text-slate-700 opacity-60">
                                <div class="w-16 h-16 rounded-full bg-gray-50 dark:bg-slate-800/50 flex items-center justify-center mb-4">
                                    <i class="fas fa-tasks text-xl p-4"></i>
                                </div>
                                <span class="text-xs font-black uppercase tracking-[0.2em]">{{ __('No Tasks') }}</span>
                            </div>
                        </template>
                    </div>
                </div>
            </template>
        </div>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(99, 102, 241, 0.1);
            border-radius: 10px;
        }
        .custom-scrollbar:hover::-webkit-scrollbar-thumb {
            background: rgba(99, 102, 241, 0.4);
        }
    </style>
</x-app-layout>
