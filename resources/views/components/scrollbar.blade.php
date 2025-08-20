<div
    {{ $attributes->class('space-y-5 mb-auto overflow-y-auto
        [&::-webkit-scrollbar]:w-2
        [&::-webkit-scrollbar-track]:rounded-full
        [&::-webkit-scrollbar-track]:bg-gray-100
        [&::-webkit-scrollbar-thumb]:rounded-full
        [&::-webkit-scrollbar-thumb]:bg-gray-300
        [&::-webkit-scrollbar-track]:bg-max-soft/20
        [&::-webkit-scrollbar-thumb]:bg-max-soft') }}>

    {{ $slot }}

</div>
