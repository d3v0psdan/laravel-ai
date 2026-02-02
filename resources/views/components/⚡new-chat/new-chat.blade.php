<div class="flex h-full min-h-[calc(100vh-4rem)] flex-col">
    {{-- Chat messages will go here --}}
    <div class="flex-1">
        {{-- Message history --}}
    </div>

    {{-- Input pinned to bottom --}}
    <div class="sticky bottom-0 bg-white pb-4 dark:bg-zinc-800">
        <flux:composer wire:model="prompt" label="Prompt" label:sr-only placeholder="How can I help you today?">
            <x-slot name="actionsLeading">
                <flux:button size="sm" variant="subtle" icon="paper-clip" />
                <flux:button size="sm" variant="subtle" icon="slash" />
                <flux:button size="sm" variant="subtle" icon="adjustments-horizontal" />
            </x-slot>

            <x-slot name="actionsTrailing">
                <flux:button size="sm" variant="filled" icon="microphone" />
                <flux:button type="submit" size="sm" variant="primary" icon="paper-airplane" />
            </x-slot>
        </flux:composer>
    </div>
</div>