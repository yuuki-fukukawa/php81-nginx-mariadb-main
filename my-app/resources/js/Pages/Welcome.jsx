import Todo from '../components/Todo'
import { Link } from '@inertiajs/react'

const Welcome = ({ posts }) => {
  return (
    <div className="grid py-4 min-h-screen">
        {posts.map((post) => (
            <div key={(post.id)}>
                <h1>{post.title}</h1>
                <p>{post.content}</p>
            </div>
        ))}
        <div>
        <Link href="/post/create" className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full cursor-pointer">新規投稿</Link>
        </div>
        {posts.map((post) => (
            <div className="overflow-hidden rounded-lg h-90 w-60 md:w-80 cursor-pointer m-auto shadow-md">
                {post.id}
                <Link href={`/post/${post.id}`} className="w-full block h-full">
                    <img alt="blog photo" src="https://picsum.photos/200" className="max-h-40 w-full"/>
                    <div className="bg-white dark:bg-gray-800 w-full p-4">
                        <p className="text-gray-800 dark:text-white text-xl font-medium mb-2">
                             { post.title }
                              </p>
                              <p className="text-gray-600 dark:text-gray-300 font-light text-md">
            { post.body }
        </p>
        </div>
    </Link>
    </div>
))};
      {/*<Todo/>*/}
    </div>
  )};

export default Welcome