<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Project;
use App\Models\Post;
use App\Models\Skill;
use Carbon\Carbon;

class PruneTrashedItems extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:prune-trashed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Permanently delete soft-deleted items older than one week';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cutoff = Carbon::now()->subWeek();

        $deletedUsers = User::onlyTrashed()->where('deleted_at', '<', $cutoff)->forceDelete();
        $deletedProjects = Project::onlyTrashed()->where('deleted_at', '<', $cutoff)->forceDelete();
        $deletedPosts = Post::onlyTrashed()->where('deleted_at', '<', $cutoff)->forceDelete();
        $deletedSkills = Skill::onlyTrashed()->where('deleted_at', '<', $cutoff)->forceDelete();

        $this->info("Pruned old trashed items: Users($deletedUsers), Projects($deletedProjects), Posts($deletedPosts), Skills($deletedSkills).");
    }
}
