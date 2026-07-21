<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ShortcodeTemplate;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $templates = [
            [
                'name' => 'Welcome Alert',
                'description' => 'A simple welcome alert box',
                'shortcode_content' => '[alert]Welcome to Laravel Shortcode Studio! Start building amazing UI components.[/alert]',
                'category' => 'Alerts',
                'is_default' => true
            ],
            [
                'name' => 'Call to Action',
                'description' => 'A button with link for call to action',
                'shortcode_content' => '[button url="https://laravel.com"]Explore Laravel Documentation[/button]',
                'category' => 'Buttons',
                'is_default' => true
            ],
            [
                'name' => 'Feature Badge',
                'description' => 'A badge highlighting a feature',
                'shortcode_content' => '[badge]New Feature Available[/badge]',
                'category' => 'Badges',
                'is_default' => true
            ],
            [
                'name' => 'Content Card',
                'description' => 'A card component with title and content',
                'shortcode_content' => '[card title="Getting Started"]This is a sample card. You can add any content inside.[/card]',
                'category' => 'Cards',
                'is_default' => true
            ],
            [
                'name' => 'Section Divider',
                'description' => 'A horizontal divider for separating content',
                'shortcode_content' => '[divider]',
                'category' => 'Layout',
                'is_default' => true
            ],
            [
                'name' => 'Progress Bar',
                'description' => 'A progress bar showing completion percentage',
                'shortcode_content' => '[progress value="70" color="success" label="Project Completion"]',
                'category' => 'Data',
                'is_default' => true
            ],
            [
                'name' => 'Video Embed',
                'description' => 'Embed a YouTube video',
                'shortcode_content' => '[youtube id="dQw4w9WgXcQ"]',
                'category' => 'Media',
                'is_default' => true
            ]
        ];

        foreach ($templates as $template) {
            ShortcodeTemplate::create($template);
        }
    }
}
