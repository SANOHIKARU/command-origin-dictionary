<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;

use App\Category;
use App\Command;

use App\Http\Requests\CommandRequest;

use Illuminate\Http\Request;

class CommandController extends Controller
{
    //
    /** @var Command */
    protected $command;
    /** @var Category */
    protected $category;

    // 1ページ当たりの表示件数
    const NUM_PER_PAGE = 10;

    public function __construct(Command $command, Category $category)
    {
        $this->command = $command;
        $this->category = $category;
    }

    

    public function create(int $category_id)
    {
        $category = $this->category->find($category_id);

        $category_name = $category->name;
        
        return view('command.create', compact('category', 'category_id', 'category_name'));
    }

    public function store(CommandRequest $request)
    {
        $input = $request->input();

        // array_get ヘルパは配列から指定されたキーの値を取り出すメソッド
        // 指定したキーが存在しない場合のデフォルト値を第三引数に設定できる
        // 指定したキーが存在しなくても、エラーにならずデフォルト値が返るのが便利
        // $id = array_get($input, 'id');
        $id = Arr::get($input, 'id');

        
        // Eloquent モデルから利用できる updateOrCreate メソッドは、第一引数の値でDBを検索し
        // レコードが見つかったら第二引数の値でそのレコードを更新、見つからなかったら新規作成します
        // ここでは article_id でレコードを検索し、第二引数の入力値でレコードを更新、または新規作成しています
        $command = $this->command->updateOrCreate(compact('id'), $input);

        return redirect()->route('command.create', ['category_id' => $command->category_id])->with('message', '新規コマンドを保存しました');
    }

    public function edit(int $id)
    {
        $command = $this->command->find($id);
        $category = $this->category->find($command->category_id);

        return view('command.edit', compact('command', 'category'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        // $id = $request->input('id');
        //なにが違うのか要検証

        // 主キーの値があるなら destroy メソッドで削除することができる
        // 引数は配列でも可。返り値は削除したレコード数
        // $result = $this->command->destroy($id);
        // $message = ($result) ? '記事を削除しました' : '記事の削除に失敗しました。';
        //delete()の場合nullだとエラーになりました。

        $command = $this->command->find($id);
        if($command){
        $category_id = $command->category_id;
        $result = $command->delete();
        $message = '記事を削除しました';
        
        return redirect()->route('category.show', ['category_id' => $category_id])->with('message', $message);
        
        } else {
            $error = '記事の削除に失敗しました。';
            return redirect()->route('category.index')->with('error', $error);
        }
    }
}
