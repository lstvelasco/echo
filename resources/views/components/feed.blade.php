@props(['posts'])
<style>
    @keyframes border-pulse {
        0% {
            border-color: rgba(14, 211, 14, 0.5);
        }

        50% {
            border-color: rgb(136, 8, 30);
        }

        100% {
            border-color: rgba(255, 105, 135, 0.5);
        }
    }

    .animate-border {
        border: 8px solid rgba(255, 105, 135, 0.5);
        /* Initial border color */
        animation: border-pulse 2s infinite;
    }

    /* Light mode styles */
    .btn-light {
        background-color: #f3f4f6;
        /* Light gray */
        color: #333;
        /* Dark text for light mode */
    }

    /* Dark mode styles */
    .btn-dark {
        background-color: #2d3748;
        /* Dark gray */
        color: #e2e8f0;
        /* Light text for dark mode */
    }

    /* Button base styles */
    .small-button {
        font-size: 0.875rem;
        /* Smaller font size */
        padding: 0.5rem 1rem;
        /* Smaller padding */
        border-radius: 0.375rem;
        /* Slightly rounded corners */
        border-width: 2px;
        /* Ensure border is visible */
    }
</style>




@foreach ($posts as $post)
    {{-- @dd($post->announcement->applications->where('applicant_id', 1)) --}}
    @php
        $announcementStart = $post->announcement->announcement_start;
        $announcementEnd = $post->announcement->announcement_end;
        $location = $post->announcement->location;
    @endphp
    <x-application-shell>
        <x-ui.post-card>
            <div class="flex flex-col w-full px-5 py-5 space-y-2">
                <div class="flex flex-row justify-between">
                    <div class="flex flex-row items-center space-x-2">
                        <img class="w-5 h-5 rounded-full" src="{{ Vite::asset('resources/images/logo.svg') }}"
                            alt="Rounded avatar">
                        <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a
                                href="/portfolio/{{ $post->author_id }}">{{ $post->user->first_name . ' ' . $post->user->last_name }}</a>
                        </h3>
                    </div>
                    @if ($post->isVerified == true)
                        <div>
                            <div>
                                <div class="mb-4 mx-2 justify-start">
                                    <button id="status" disabled
                                        class="text-white cursor-none bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                        type="button">
                                        Validated
                                    </button>
                                </div>
                            </div>
                        </div>
                    @else
                        <div>
                            <div class="mb-4 mx-2 justify-start">
                                <button id="status" disabled
                                    class="text-white cursor-none bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800"
                                    type="button">
                                    Not Validated
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
                <span class="font-bold text-gray-500 dark:text-gray-400">{{ $post->announcement->name }}</span>
                <p class="mt-3 mb-4 font-semibold text-gray-500 dark:text-gray-400">{{ $post->content }}</p>
                @if ($announcementStart !== null)
                    <p class="mt-3 mb-4 font-semibold text-gray-500 dark:text-gray-400">Start:
                        {{ \Carbon\Carbon::parse($post->announcement->announcement_start)->format('F j, Y') }}</p>
                @endif
                @if ($announcementEnd !== null)
                    <p class="mt-3 mb-4 font-semibold text-gray-500 dark:text-gray-400">End:
                        {{ \Carbon\Carbon::parse($post->announcement->announcement_end)->format('F j, Y') }}</p>
                @endif
                @if ($announcementEnd !== null)
                    <p class="mt-3 mb-4 font-semibold text-gray-500 dark:text-gray-400">Location:
                        {{ $post->announcement->location }}</p>
                @endif
                @if ($post->announcement->status != null)
                    <div x-data="{ darkMode: false }" class="inline-flex">
                        <button :class="{ 'btn-dark': darkMode, 'btn-light': !darkMode }"
                            class="small-button font-semibold shadow-lg cursor-not-allowed opacity-75 animate-border">
                            {{ $post->announcement->status }}
                        </button>
                    </div>
                @endif



                <p class="mt-3 mb-4 font-thin text-gray-500 dark:text-gray-400">Posted on:
                    {{ \Carbon\Carbon::parse($post->announcement->created_at)->format('F j, Y') . ' ' . \Carbon\Carbon::parse($post->announcement->created_at)->format('h:i A') }}
                </p>
                <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                <div class="mb-4 justify-start">
                    <button id="createAnnouncementButton"
                        class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                        type="button">
                        <a href="/posts/{{ $post->id }}">Inquiries</a>
                    </button>
                </div>

            </div>
        </x-ui.post-card>
    </x-application-shell>
@endforeach
