<x-layout title="Manage Listings">
    <x-card class="mx-4 p-10">
        @unless($listings->isEmpty())
            <header>
                <h1 class="my-6 text-3xl font-bold font-recursive uppercase text-center">Manage Gigs</h1>
            </header>
            <table class="w-full table-auto rounded-sm">
                <tbody>
                @foreach($listings as $listing)
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <a href="{{ route('listings.show', $listing->id) }}">{{ $listing->title }}</a>
                        </td>
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <a href="{{ route('listings.edit', $listing->id) }}" class="text-blue-400 px-6 py-2 rounded-xl">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>
                        </td>
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <form action="{{ route('listings.delete', $listing->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="text-red-600"
                                        onclick="return confirm('Proceed to delete the post?')">
                                    <i class="fa-solid fa-trash-can"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="text-lg font-recursive text-center">You have no posts yet!</p>
        @endunless
    </x-card>
</x-layout>
