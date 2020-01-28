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

        $category_id = $request->category_id;
        // $id = Arr::get($input, 'id');
        // 違いはあるのか
        // $category_id = $input->category_id;
        // これだとだめだった。よくわからん。
        
        
        $category = $this->category->updateOrCreate(compact('category_id'), $input);

        $store_type = $request->store_type;
        switch($store_type){
            case "create":
                $message = "新規カテゴリーを保存しました";
            break;
            case "edit":
                $message = "カテゴリーの編集を保存しました";
            break;
            default:
                $message = "何かがおかしいようです。";
        }

        // リダイレクトでフォーム画面に戻る
        // route ヘルパーでリダイレクト先を指定。ルートのエイリアスを使う場合は route ヘルパーを使う
        // with メソッドで、セッションに次のリクエスト限りのデータを保存する
        return redirect()->route('category.index')->with('message', $message);
    }

    public function show($category_id)
    {
        $category = $this->category->find($category_id);

        $commands = $category->getCommandList();
        $category_name = $category->name;


        return view('category.show', compact('commands', 'category', 'category_id', 'category_name'));
    }

    public function edit($category_id)
    {
        $category = $this->category->find($category_id);

        return view('category.edit', compact('category'));
    }

    public function delete(Request $request)
    {
        $category_id = $request->category_id;
        $category = $this->category->find($category_id);

        if ($category == null) {
            $error = 'カテゴリーの削除に失敗しました。';
            return redirect()->route('category.index')->with('error', $error);
        }

        if ($category->checkCommandList()) {
            $error = 'カテゴリー内にコマンドが含まれているため、削除に失敗しました。';
            return redirect()->route('category.edit', ['category_id' => $category_id])->with('error', $error);
        } else {
            $category->delete();
            $message = 'カテゴリーを削除しました';
            return redirect()->route('category.index')->with('message', $message);
        }
    }
}
