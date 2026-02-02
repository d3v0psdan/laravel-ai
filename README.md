# Laravel AI

<p align="center">
    <img src="docs/media/laravel-ai.PNG" alt="Laravel AI Screenshot" width="700">
</p>

<p align="center">
    <strong>A modern simple AI chat interface built with Laravel, Livewire, and Flux UI.</strong>
</p>

<p align="center">
    <img src="https://img.shields.io/badge/Laravel-12.x-FF2D20?logo=laravel" alt="Laravel 12.x">
    <img src="https://img.shields.io/badge/Livewire-4.x-FB70A9?logo=livewire" alt="Livewire 4.x">
    <img src="https://img.shields.io/badge/Flux_UI-Pro-7c3aed" alt="Flux UI Pro">
    <img src="https://img.shields.io/badge/PHP-8.4+-777BB4?logo=php" alt="PHP 8.4+">
    <img src="https://img.shields.io/badge/Tailwind-4-06B6D4?logo=tailwindcss" alt="Tailwind CSS 4">
</p>

---

<!-- TODO(human): Write a 2-3 sentence description of what makes YOUR project special -->
Most of this project has been written by me, Claude Code was used to assist in documentation, sourcing AI model providers, testing and UI/UX development and project specifications. Personally, I believe we are living in some of the greatest generations of programming and software development.

## Features

- **Multi-Provider AI Support** — ChatGPT, Claude, Gemini, Groq, Mistral, and Perplexity
- **Model Selection** — Choose from 13+ AI models with different capabilities and price points
- **Modern UI** — Built with Flux UI Pro components and Tailwind CSS
- **Real-time Updates** — Powered by Livewire for reactive, SPA-like experience
- **Dark Mode** — Full dark mode support out of the box
- **Animated Interface** — Subtle gradient background and icon hover animations

## Requirements

- PHP 8.4+
- Composer
- Node.js 18+
- SQLite (default) or MySQL/PostgreSQL

## Installation

1. **Clone the repository**
   ```bash
   git clone git@github.com:d3v0psdan/laravel-ai.git
   cd laravel-ai
   ```

2. **Run the setup script**
   ```bash
   composer setup
   ```

   This will install dependencies, generate an app key, run migrations, and build assets.

3. **Configure your environment**
   ```bash
   cp .env.example .env
   ```

4. **Add your AI provider API keys** (see [Configuration](#configuration))

5. **Start the development server**
   ```bash
   composer dev
   ```

   Visit [http://localhost:8000](http://localhost:8000)

## Configuration

Add your API keys to `.env`:

```env
# Default AI settings
AI_DEFAULT_PROVIDER=anthropic
AI_DEFAULT_MODEL=claude-haiku-4-5

# Provider API Keys (add the ones you want to use)
ANTHROPIC_API_KEY=your-key-here
OPENAI_API_KEY=your-key-here
GOOGLE_AI_API_KEY=your-key-here
GROQ_API_KEY=your-key-here
MISTRAL_API_KEY=your-key-here
PERPLEXITY_API_KEY=your-key-here
```

### Supported Models

| Provider | Models | Starting Price |
|----------|--------|----------------|
| **Anthropic** | Claude Opus 4.5, Sonnet 4.5, Haiku 4.5/3.5 | $1.00/1M tokens |
| **OpenAI** | GPT-4o, GPT-4o Mini, o1 | $0.15/1M tokens |
| **Google** | Gemini 2.0 Flash, Gemini 2.0 Pro | $0.10/1M tokens |
| **Groq** | Llama 3.3 70B | $0.59/1M tokens |
| **Mistral** | Mistral Large, Mistral Small | $1.00/1M tokens |
| **Perplexity** | Sonar Pro, Sonar | $1.00/1M tokens |

## Tech Stack

- **[Laravel 12](https://laravel.com)** — PHP framework
- **[Livewire 4](https://livewire.laravel.com)** — Full-stack framework for Laravel
- **[Flux UI Pro](https://fluxui.dev)** — Livewire component library
- **[Tailwind CSS 4](https://tailwindcss.com)** — Utility-first CSS framework
- **[Pest](https://pestphp.com)** — Testing framework

## Development

```bash
# Run tests
composer test

# Format code
composer lint

# Start dev server with hot reload
composer dev
```

## License

This project is open-sourced software licensed under the [MIT license](LICENSE).
