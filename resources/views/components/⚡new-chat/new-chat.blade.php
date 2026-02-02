<div @class([
    'flex h-full min-h-[calc(100vh-4rem)] flex-col',
    'items-center justify-center' => !$hasMessages,
])>
    @if ($hasMessages)
        {{-- Chat messages --}}
        <div class="flex-1 overflow-y-auto">
            {{-- Message history --}}
        </div>

        {{-- Input pinned to bottom --}}
        <div class="sticky bottom-0 w-full bg-white pb-4 dark:bg-zinc-800">
            <flux:composer wire:model="prompt" label="Prompt" label:sr-only placeholder="How can I help you today?">
                <x-slot name="actionsLeading">
                    <flux:button size="sm" variant="subtle" icon="paper-clip" />
                    <flux:button size="sm" variant="subtle" icon="slash" />
                    <flux:button size="sm" variant="subtle" icon="adjustments-horizontal" />
                </x-slot>

                <x-slot name="actionsTrailing">
                    <!-- To be implemented ... -->
                    {{-- <flux:button size="sm" variant="filled" icon="microphone" /> --}}
                    <flux:button type="submit" size="sm" variant="primary" icon="paper-airplane" />
                </x-slot>
            </flux:composer>
        </div>
    @else
        {{-- Centered input when no messages --}}
        <div class="flex flex-col gap-8 w-full max-w-3xl px-4">

            <h1 class="text-3xl text-center">Back at it again 
                <strong>{{ auth()->user()->name }}!</strong>
            </h1>

            <flux:composer wire:model="prompt" label="Prompt" label:sr-only placeholder="How can I help you today?">
                <x-slot name="actionsLeading">
                    <flux:button size="sm" variant="subtle" icon="paper-clip" />
                    <flux:button size="sm" variant="subtle" icon="slash" />
                    <flux:button size="sm" variant="subtle" icon="adjustments-horizontal" />
                </x-slot>

                <x-slot name="actionsTrailing">
                    <!-- To be implemented ... -->
                    {{-- <flux:button size="sm" variant="filled" icon="microphone" /> --}}
                    <flux:button type="submit" size="sm" variant="primary" icon="paper-airplane" />
                </x-slot>
            </flux:composer>
        </div>
    @endif
</div>