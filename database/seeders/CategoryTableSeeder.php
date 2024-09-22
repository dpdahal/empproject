<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Blog\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryData = [
            [
                'name' => 'Sports',
                'slug' => 'sports',
                'status' => 'active'
            ],
            [
                'name' => 'Technology',
                'slug' => 'technology',
                'status' => 'active'
            ],
            [
                'name' => 'Health',
                'slug' => 'health',
                'status' => 'active'
            ],
            [
                'name' => 'Entertainment',
                'slug' => 'entertainment',
                'status' => 'active'
            ],
            [
                'name' => 'Politics',
                'slug' => 'politics',
                'status' => 'active'
            ],
            [
                'name' => 'Education',
                'slug' => 'education',
                'status' => 'active'
            ],
            [
                'name' => 'Business',
                'slug' => 'business',
                'status' => 'active'
            ],
            [
                'name' => 'Lifestyle',
                'slug' => 'lifestyle',
                'status' => 'active'
            ],
            [
                'name' => 'Fashion',
                'slug' => 'fashion',
                'status' => 'active'
            ],
            [
                'name' => 'Travel',
                'slug' => 'travel',
                'status' => 'active'
            ],
            [
                'name' => 'Food',
                'slug' => 'food',
                'status' => 'active'
            ],
            [
                'name' => 'Science',
                'slug' => 'science',
                'status' => 'active'
            ],
            [
                'name' => 'Automobile',
                'slug' => 'automobile',
                'status' => 'active'
            ],
            [
                'name' => 'Real Estate',
                'slug' => 'real-estate',
                'status' => 'active'
            ],
            [
                'name' => 'Gaming',
                'slug' => 'gaming',
                'status' => 'active'
            ],
            [
                'name' => 'Music',
                'slug' => 'music',
                'status' => 'active'
            ],
            [
                'name' => 'Movie',
                'slug' => 'movie',
                'status' => 'active'
            ],
            [
                'name' => 'Book',
                'slug' => 'book',
                'status' => 'active'
            ],
            [
                'name' => 'Art',
                'slug' => 'art',
                'status' => 'active'
            ],
            [
                'name' => 'Photography',
                'slug' => 'photography',
                'status' => 'active'
            ],
            [
                'name' => 'Nature',
                'slug' => 'nature',
                'status' => 'active'
            ],
            [
                'name' => 'Wildlife',
                'slug' => 'wildlife',
                'status' => 'active'
            ],
            [
                'name' => 'Environment',
                'slug' => 'environment',
                'status' => 'active'
            ]
        ];

        foreach ($categoryData as $data) {
            $total = Category::where('slug', $data['slug'])->count();
            if ($total == 0) {
                Category::create($data);
            }
        }
    }
}
