<div x-data="{ hasSentMessage: $wire.entangle('hasSentMessage') }"
    x-cloak
    class="flex flex-col w-full h-full"
    :class="{ 'items-center justify-center': !hasSentMessage }"
>
    <div x-show="hasSentMessage" 
        x-transition:enter="transition ease-out duration-1000"
        x-transition:enter-start="opacity-0 -translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        class="flex flex-col min-h-[calc(100vh-2rem)]">
        {{-- Chat messages --}}
        <div class="flex-1 overflow-y-auto">
            {{-- Message history --}}
        </div>
    
        {{-- Input pinned to bottom --}}
        <div class="sticky bottom-0 w-full pb-4">
            <form wire:submit="submitMessage">
                <flux:composer wire:model.live="prompt" label="Prompt" label:sr-only placeholder="How can I help you today?" class="hover:border-dashed hover:border-2 hover:border-accent transition-colors duration-500">
                    <x-slot name="actionsLeading">
                        <!-- Todo: add file upload support -->
                        {{-- <flux:button size="sm" variant="subtle" icon="paper-clip" /> --}}
    
                        {{-- <flux:button size="sm" variant="subtle" icon="slash" />
                        <flux:button size="sm" variant="subtle" icon="adjustments-horizontal" /> --}}
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