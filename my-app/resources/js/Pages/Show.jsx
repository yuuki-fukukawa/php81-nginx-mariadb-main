import { Link } from '@inertiajs/react'

const Show = ({ post }) => {
  return (
    <div className="grid grid-cols-1 gap-4 my-4">
      <div className="overflow-hidden rounded-lg h-90 w-60 md:w-80 cursor-pointer m-auto shadow-md">
        <img alt="blog photo" src="https://picsum.photos/200" className="max-h-40 w-full" />
        <div className="bg-white dark:bg-gray-800 w-full p-4">
          <p className="text-gray-800 dark:text-white text-xl font-medium mb-2">
            {post.title}
          </p>
          <p className="text-gray-600 dark:text-gray-300 font-light text-md">
            {post.body}
          </p>
        </div>
      </div>

      <div className="grid grid-cols-1">
        <div className="justify-self-center mb-8">
          <Link
            className="text-green-700 hover:text-white hover:bg-green-700 rounded w-36 text-center py-2 px-4 border"
            href={`/post/edit/${post.id}`} // ← 編集リンク
          >
            編集する
          </Link>
        </div>

        <div className="justify-self-center">
          <form
            action={`/post/${post.id}`} // ← 削除ルート
            method="POST"
            onSubmit={(e) => {
              e.preventDefault();
              fetch(`/post/${post.id}`, {
                method: 'DELETE',
                headers: {
                  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                  'Content-Type': 'application/json',
                },
              }).then(() => {
                window.location.href = '/';
              });
            }}
          >
            <button
              type="submit"
              className="text-white bg-red-700 rounded w-36 text-center py-2 px-4 border focus:ring-4 focus:outline"
            >
              投稿削除
            </button>
          </form>
        </div>
      </div>
    </div>
  );
};


export default Show