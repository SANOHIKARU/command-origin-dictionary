<?php

namespace App\Http\Controllers;

use App\Category;
// use App\Http\Requests\PostRequest;
use App\Http\Requests\CategoryRequest;

use Illuminate\Http\Request;


class CategoryController extends Controller
{
    //
    /**
     * インスタンス
     */
    protected $category;

    /**
     * 新しいコントローラインスタンスの生成
     *
     * @param  Category  $category
     * @return void
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = Category::get();
        return view('category.index')->with('categories', $categories);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(CategoryRequest $request)
    {
        // こちらも引数にタイプヒントを指定すると、
        // AdminBlogRequest のインスタンスが生成される（メソッドインジェクション）
        // そして、AdminBlogRequest で設定したバリデートも実行される（フォームリクエストバリデーション）

        // 入力値の取得
        $input = $request->input();

        // create メソッドで複数代入を実行する。
        // 対象テーブルのカラム名と配列のキー名が一致する場合、一致するカラムに一致するデータが入る
        $category = $this->category->create($input);

        // リダイレクトでフォーム画面に戻る
        // route ヘルパーでリダイレクト先を指定。ルートのエイリアスを使う場合は route ヘルパーを使う
        // with メソッドで、セッションに次のリクエスト限りのデータを保存する
        // return redirect()->route('admin_form')->with('message', 'を保存しました');
        return redirect()->route('category.create')->with('message', '新規カテゴリーを保存しました');

    }

    public function show($category_id)
    {
        $category = $this->category->find($category_id);

        $commands = $category->getCommandList();
        $category_name = $category->name;


        return view('category.show', compact('commands', 'category' , 'category_id' , 'category_name'));
    }
}
