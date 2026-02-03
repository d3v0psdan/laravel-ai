<div x-data="{ hasSentMessage: $wire.entangle('hasSentMessage') }"
    x-cloak
    class="flex flex-col w-full h-[calc(100vh-4rem)]"
    :class="{ 'items-center justify-center': !hasSentMessage }"
>
    {{-- Chat View (when messages exist) --}}
    <div x-show="hasSentMessage"
        x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="flex flex-col w-full h-full">

        {{-- Messages (scrollable) --}}
        <div class="flex-1 overflow-y-auto px-4">
            <div class="mx-auto max-w-4xl flex flex-col gap-4 py-4 pb-8">
                @foreach ($context as $message)
                    @php
                        $role   = $message['role'];
                        $isUser = ($role === 'user');
                        $isAI   = ($role === 'assistant');
                    @endphp

                    <div class="flex {{ $isUser ? 'justify-end' : 'justify-start' }}">
                        <flux:card class="{{ $isUser ? 'max-w-xl' : 'max-w-3xl' }}">
                            @if ($isUser)
                                <div>{{ $message['content'] }}</div>
                            @elseif ($isAI)
                                <div class="prose dark:prose-invert max-w-none">
                                    {!! app(Spatie\LaravelMarkdown\MarkdownRenderer::class)->toHtml($message['content']) !!}
                                </div>
                            @endif
                        </flux:card>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Input (fixed at bottom, outside scroll area) --}}
        <div class="shrink-0 px-4 py-3">
            <div class="mx-auto max-w-4xl">
                <form wire:submit="submitMessage">
                    <flux:composer wire:model.live="prompt" label="Prompt" label:sr-only placeholder="How can I help you today?" class="hover:border-dashed hover:border-2 hover:border-accent transition-colors duration-500">
                        <x-slot name="actionsLeading">
                            <flux:select wire:model.live="selectedModel" size="sm" variant="listbox" class="max-w-48" placeholder="Select a model...">
                                @foreach ($this->availableModels as $model)
                                    <flux:select.option value="{{ $model['api_name'] }}">
                                        {{ $model['name'] }}
                                    </flux:select.option>
                                @endforeach
                            </flux:select>
                            <flux:checkbox wire:model.live="hasSentMessage" label="Sent" />
                        </x-slot>

                        <x-slot name="actionsTrailing">
                            <flux:button type="submit" size="sm" variant="primary" icon="paper-airplane" />
                        </x-slot>
                    </flux:composer>
                </form>
            </div>
        </div>
    </div>

    {{-- <div wire:loading wire:target="submitMessage" class="flex items-center gap-2">
        <div class="loader-dancers max-w-[6px] max-h-[6px]"></div>
        <span>Thinking...</span>
    </div> --}}
    
    {{-- Centered input when no messages --}}
    <div x-show="!hasSentMessage" x-transition.duration.1000ms class="w-full max-w-3xl">
        <div class="flex flex-col gap-8 px-4">

            <!-- Welcome text -->
            <h1 class="text-3xl text-center cursor-default">Back at it again 
                <strong class="hover:text-accent transition-colors duration-300">{{ auth()->user()->name }}!</strong>
            </h1>

            <!-- Prompt input -->
            <form wire:submit="submitMessage">
                <!-- Prompt error handling -->
                @if ($errors->any())
                    <flux:callout variant="danger" class="my-2">
                        <flux:callout.text>
                            <flux:error name="promptError" class="mt-0!"/>
                        </flux:callout.text>
                    </flux:callout>
                @endif

                <flux:composer wire:model.live="prompt" label="Prompt" label:sr-only placeholder="How can I help you today?" class="hover:border-dashed hover:border-2 hover:border-accent transition-colors duration-500">
                    <x-slot name="actionsLeading">
                        <!-- Todo: add file upload support -->
                        {{-- <flux:button size="sm" variant="subtle" icon="paper-clip" /> --}}

                        {{-- <flux:button size="sm" variant="subtle" icon="slash" /> --}}
                        {{-- <flux:button size="sm" variant="subtle" icon="adjustments-horizontal" /> --}}
                        <flux:select wire:model.live="selectedModel" size="sm" variant="listbox" class="max-w-48" placeholder="Select a model...">
                            @foreach ($this->availableModels as $model)
                            <flux:select.option value="{{ $model['api_name'] }}">
                                {{ $model['name'] }}
                            </flux:select.option>
                            @endforeach
                        </flux:select>

                        <flux:checkbox wire:model.live="hasSentMessage" label="Sent" />
                    </x-slot>

                    <x-slot name="actionsTrailing">
                        <!-- To be implemented ... -->
                        {{-- <flux:button size="sm" variant="filled" icon="microphone" /> --}}
                        <flux:button type="submit" size="sm" variant="primary" icon="paper-airplane" />
                    </x-slot>
                </flux:composer>
            </form>

        </div>
    </div>
</div>