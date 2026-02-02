<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default AI Provider
    |--------------------------------------------------------------------------
    |
    | The default provider to use when none is specified.
    |
    */

    'default' => env('AI_DEFAULT_PROVIDER', 'anthropic'),

    /*
    |--------------------------------------------------------------------------
    | Default Model
    |--------------------------------------------------------------------------
    |
    | The default model to use when none is specified.
    |
    */

    'model' => env('AI_DEFAULT_MODEL', 'claude-haiku-4-5'),

    /*
    |--------------------------------------------------------------------------
    | AI Providers
    |--------------------------------------------------------------------------
    |
    | API credentials for each provider. Keys are stored in .env for security.
    |
    */

    'providers' => [

        'anthropic' => [
            'name' => 'Anthropic',
            'api_key' => env('ANTHROPIC_API_KEY'),
            'base_url' => 'https://api.anthropic.com/v1',
        ],

        'openai' => [
            'name' => 'OpenAI',
            'api_key' => env('OPENAI_API_KEY'),
            'base_url' => 'https://api.openai.com/v1',
        ],

        'google' => [
            'name' => 'Google',
            'api_key' => env('GOOGLE_AI_API_KEY'),
            'base_url' => 'https://generativelanguage.googleapis.com/v1beta',
        ],

        'groq' => [
            'name' => 'Groq',
            'api_key' => env('GROQ_API_KEY'),
            'base_url' => 'https://api.groq.com/openai/v1',
        ],

        'mistral' => [
            'name' => 'Mistral',
            'api_key' => env('MISTRAL_API_KEY'),
            'base_url' => 'https://api.mistral.ai/v1',
        ],

        'perplexity' => [
            'name' => 'Perplexity',
            'api_key' => env('PERPLEXITY_API_KEY'),
            'base_url' => 'https://api.perplexity.ai',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | AI Models
    |--------------------------------------------------------------------------
    |
    | Available models organized by provider. Each model includes metadata
    | for display and cost tracking purposes.
    |
    */

    'models' => [

        // Anthropic Models
        'claude-opus-4-5' => [
            'provider' => 'anthropic',
            'name' => 'Claude Opus 4.5',
            'api_name' => 'claude-opus-4-5-20251101',
            'description' => 'Most capable model for complex tasks and coding',
            'context_window' => 200000,
            'max_output' => 64000,
            'input_cost' => 5.00,  // per 1M tokens
            'output_cost' => 25.00,
            'supports_vision' => true,
            'supports_tools' => true,
        ],

        'claude-sonnet-4-5' => [
            'provider' => 'anthropic',
            'name' => 'Claude Sonnet 4.5',
            'api_name' => 'claude-sonnet-4-5-20251101',
            'description' => 'Best balance of speed, cost, and capability',
            'context_window' => 200000,
            'max_output' => 64000,
            'input_cost' => 3.00,
            'output_cost' => 15.00,
            'supports_vision' => true,
            'supports_tools' => true,
        ],

        'claude-haiku-4-5' => [
            'provider' => 'anthropic',
            'name' => 'Claude Haiku 4.5',
            'api_name' => 'claude-haiku-4-5-20250201',
            'description' => 'Fast and affordable for everyday tasks',
            'context_window' => 200000,
            'max_output' => 64000,
            'input_cost' => 1.00,
            'output_cost' => 5.00,
            'supports_vision' => true,
            'supports_tools' => true,
        ],

        'claude-haiku-3-5' => [
            'provider' => 'anthropic',
            'name' => 'Claude Haiku 3.5',
            'api_name' => 'claude-3-5-haiku-20241022',
            'description' => 'Previous gen fast model',
            'context_window' => 200000,
            'max_output' => 8192,
            'input_cost' => 0.80,
            'output_cost' => 4.00,
            'supports_vision' => true,
            'supports_tools' => true,
        ],

        // OpenAI Models
        'gpt-4o' => [
            'provider' => 'openai',
            'name' => 'GPT-4o',
            'api_name' => 'gpt-4o',
            'description' => 'Flagship multimodal model',
            'context_window' => 128000,
            'max_output' => 16384,
            'input_cost' => 2.50,
            'output_cost' => 10.00,
            'supports_vision' => true,
            'supports_tools' => true,
        ],

        'gpt-4o-mini' => [
            'provider' => 'openai',
            'name' => 'GPT-4o Mini',
            'api_name' => 'gpt-4o-mini',
            'description' => 'Affordable and fast for lightweight tasks',
            'context_window' => 128000,
            'max_output' => 16384,
            'input_cost' => 0.15,
            'output_cost' => 0.60,
            'supports_vision' => true,
            'supports_tools' => true,
        ],

        'o1' => [
            'provider' => 'openai',
            'name' => 'o1',
            'api_name' => 'o1',
            'description' => 'Advanced reasoning model for complex problems',
            'context_window' => 200000,
            'max_output' => 100000,
            'input_cost' => 15.00,
            'output_cost' => 60.00,
            'supports_vision' => true,
            'supports_tools' => true,
        ],

        // Google Models
        'gemini-2-flash' => [
            'provider' => 'google',
            'name' => 'Gemini 2.0 Flash',
            'api_name' => 'gemini-2.0-flash',
            'description' => 'Fast multimodal model with 1M context',
            'context_window' => 1000000,
            'max_output' => 8192,
            'input_cost' => 0.10,
            'output_cost' => 0.40,
            'supports_vision' => true,
            'supports_tools' => true,
        ],

        'gemini-2-pro' => [
            'provider' => 'google',
            'name' => 'Gemini 2.0 Pro',
            'api_name' => 'gemini-2.0-pro',
            'description' => 'Best Google model for complex tasks',
            'context_window' => 1000000,
            'max_output' => 8192,
            'input_cost' => 1.25,
            'output_cost' => 5.00,
            'supports_vision' => true,
            'supports_tools' => true,
        ],

        // Groq Models (fast inference)
        'llama-3-3-70b' => [
            'provider' => 'groq',
            'name' => 'Llama 3.3 70B',
            'api_name' => 'llama-3.3-70b-versatile',
            'description' => 'Fast open-source model via Groq',
            'context_window' => 128000,
            'max_output' => 32768,
            'input_cost' => 0.59,
            'output_cost' => 0.79,
            'supports_vision' => false,
            'supports_tools' => true,
        ],

        // Mistral Models
        'mistral-large' => [
            'provider' => 'mistral',
            'name' => 'Mistral Large',
            'api_name' => 'mistral-large-latest',
            'description' => 'Flagship Mistral model',
            'context_window' => 256000,
            'max_output' => 8192,
            'input_cost' => 2.00,
            'output_cost' => 6.00,
            'supports_vision' => true,
            'supports_tools' => true,
        ],

        'mistral-small' => [
            'provider' => 'mistral',
            'name' => 'Mistral Small',
            'api_name' => 'mistral-small-latest',
            'description' => 'Cost-effective for simple tasks',
            'context_window' => 128000,
            'max_output' => 8192,
            'input_cost' => 1.00,
            'output_cost' => 3.00,
            'supports_vision' => true,
            'supports_tools' => true,
        ],

        // Perplexity Models (with search)
        'sonar-pro' => [
            'provider' => 'perplexity',
            'name' => 'Sonar Pro',
            'api_name' => 'sonar-pro',
            'description' => 'AI with real-time web search',
            'context_window' => 200000,
            'max_output' => 8192,
            'input_cost' => 3.00,
            'output_cost' => 15.00,
            'supports_vision' => false,
            'supports_tools' => false,
        ],

        'sonar' => [
            'provider' => 'perplexity',
            'name' => 'Sonar',
            'api_name' => 'sonar',
            'description' => 'Lightweight search-enabled model',
            'context_window' => 128000,
            'max_output' => 8192,
            'input_cost' => 1.00,
            'output_cost' => 1.00,
            'supports_vision' => false,
            'supports_tools' => false,
        ],

    ],

];
