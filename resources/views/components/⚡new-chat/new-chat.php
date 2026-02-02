<?php

use Livewire\Component;
use Livewire\Attributes\Title;

new #[Title('New Chat')] class extends Component
{
    public string $prompt = '';

    public bool $hasMessages = false;
};