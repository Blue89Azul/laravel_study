@auth
    <form action="{{ route('tweet.create') }}" method="POST">
        @csrf
        <div>
            <textarea
            name="tweet"
            rows="3"
            class="focus:ring-blue-400 focus:border-blue-400 mt-1 block w-full sm:text-sm border border-gray300 rounded-md p-2"
            placeholder="つぶやきを入力"
            ></textarea>
        </div>
        <p class="mt-2 text-sm text-gray-500">
            140文字まで
        </p>

        @error('tweet')
        <x-alert.error>{{ $message }}</x-alert.error>
        @enderror

        <div class="flex flex-wrap justify-end">
            <x-element.button>
                つぶやく
            </x-element.button>
        </div>
    </form>
@endauth