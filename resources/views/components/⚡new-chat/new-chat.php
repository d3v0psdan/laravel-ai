<?php

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Computed;

new #[Title('New Chat')] class extends Component
{
    public array $context = [];

    public string $prompt = '';

    public string $selectedModel = '';

    public bool $hasSentMessage = true;

    public function mount(): void
    {
        $this->selectedModel = config('ai.models')[config('ai.model')]['api_name'];

        // Fake conversation for UI testing
        $this->context = [
            [
                'role' => 'user',
                'content' => 'Hey!',
            ],
            [
                'role' => 'assistant',
                'content' => 'Hello! How can I help you today?',
            ],
            [
                'role' => 'user',
                'content' => 'Can you explain what Laravel is? I\'m new to web development.',
            ],
            [
                'role' => 'assistant',
                'thinking' => 'The user is a beginner asking about Laravel. I should provide a friendly, comprehensive overview covering the basics: PHP framework, MVC pattern, and key features. I\'ll use clear examples.',
                'content' => <<<'MD'
# What is Laravel?

Laravel is a **PHP web application framework** designed to make development enjoyable and productive. Here's what makes it special:

## Key Features

| Feature | Description |
|---------|-------------|
| Eloquent ORM | Beautiful, intuitive database interactions |
| Blade Templates | Clean, powerful templating engine |
| Artisan CLI | Command-line tools for common tasks |
| Built-in Auth | Security scaffolding out of the box |

## Quick Example

```php
// Define a route that returns a view
Route::get('/hello', function () {
    return view('welcome', ['name' => 'Daniel']);
});
```

The framework follows the **MVC** (Model-View-Controller) pattern, which helps keep your code organized.

Would you like me to dive deeper into any of these features?
MD,
            ],
            [
                'role' => 'user',
                'content' => 'Yes! Tell me more about Eloquent. How do relationships work?',
            ],
            [
                'role' => 'assistant',
                'thinking' => 'They want to understand Eloquent relationships. I should explain the main types: hasOne, hasMany, belongsTo, belongsToMany. Practical examples with User/Post will be relatable.',
                'content' => <<<'MD'
# Eloquent Relationships

Eloquent makes database relationships *elegant*. Here are the main types:

## 1. One-to-Many (hasMany)

A user has many posts:

```php
class User extends Model
{
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
```

## 2. Inverse (belongsTo)

A post belongs to a user:

```php
class Post extends Model
{
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
```

## Using Relationships

```php
// Get all posts by a user
$user = User::find(1);
$posts = $user->posts;

// Eager load to prevent N+1
$users = User::with('posts')->get();
```

> 💡 **Pro tip:** Always use eager loading (`with()`) when you know you'll access relationships to avoid the N+1 query problem!

---

Other relationship types include:
- `hasOne` - User has one Profile
- `belongsToMany` - Posts have many Tags (via pivot table)
- `hasManyThrough` - Country has many Posts through Users
MD,
            ],
            [
                'role' => 'user',
                'content' => 'What about validation? How do I validate form inputs?',
            ],
            [
                'role' => 'assistant',
                'content' => <<<'MD'
# Form Validation in Laravel

Laravel provides several ways to validate input. Here's the cleanest approach using **Form Request** classes:

## Creating a Form Request

```bash
php artisan make:request StorePostRequest
```

## Define Your Rules

```php
class StorePostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string', 'min:10'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:tags,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Every post needs a title!',
            'body.min' => 'Please write at least 10 characters.',
        ];
    }
}
```

## Use in Controller

```php
public function store(StorePostRequest $request)
{
    // Validation passed! $request->validated() is safe to use
    Post::create($request->validated());

    return redirect()->route('posts.index');
}
```

The request is **automatically validated** before your controller method runs. If validation fails, the user is redirected back with errors.
MD,
            ],
            [
                'role' => 'user',
                'content' => 'This is super helpful, thanks!',
            ],
            [
                'role' => 'assistant',
                'content' => "You're welcome! 🎉 Feel free to ask if you have more questions about Laravel. Happy coding!",
            ],
        ];
    }

    /**
     * Get all available AI models from config.
     *
     * @return array<string, array{name: string, provider: string, description: string}>
     */
    #[Computed]
    public function availableModels(): array
    {
        return config('ai.models');
    }


    /**
     * Send a message to the AI model.
     *
     * @return void
     */
    public function submitMessage(): void
    {
        // Do we have a valid message? 
        if (empty($this->prompt))
        {
            $this->addError('promptError', 'You must specify a message to send.');
            return;
        }
        
        if (!$this->hasSentMessage)
            $this->hasSentMessage = true;

        // Reset the prompt
        $this->prompt = '';
    }
};