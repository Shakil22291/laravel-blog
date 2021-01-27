<div class="overflow-x-auto mt-6">
    <table class="table-auto border-collapse w-full">
      <thead>
        <tr class="rounded-lg text-sm font-medium text-gray-700 text-left" style="font-size: 0.9674rem">
          <th class="px-4 py-2 bg-gray-100" >Title</th>
          <th class="px-4 py-2 bg-gray-100" >Publishded at</th>
          <th class="px-4 py-2 bg-gray-100" >Last Update</th>
          <th class="px-4 py-2 bg-gray-100" >Actions</th>
        </tr>
      </thead>
      <tbody class="text-sm font-normal text-gray-700">
        @foreach ($posts as $post)
          <tr class="hover:bg-gray-100 border-b border-gray-200 py-10">
            <td class="px-4 py-4">{{ $post->title }}</td>
            <td class="px-4 py-4">{{ $post->created_at->diffForHumans() }}</td>
            <td class="px-4 py-4">{{ $post->updated_at->diffForHumans() }}</td>
            <td class="px-4 py-4 flex space-x-2">
              <form action="{{ route('posts.destroy', $post->slug) }}" method="POST">
                @method('DELETE')
                @csrf
                <button
                  onclick="return confirm('Are you shure you want to delete the post')"
                  type="submit"
                  class="text-red-600 text-sm hover:text-red-800 transition"
                >Delete</button>
              </form>
              <a href="{{ route('posts.edit', $post->slug) }}" class="text-indigo-600 text-sm hover:underline">Edit</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>