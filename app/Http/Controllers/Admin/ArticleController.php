<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//主动导入Article类。Article类和当前控制器类不在一个“命名空间”路径下，不能直接调用
use App\Article;

class ArticleController extends Controller
{
    //列表页
    public function index()
    {
        $list = Article::all();
        // echo '<pre>';
        // printf(Article::where('id', '>', 1)->where('id', '<', 4)->orderBy('updated_at', 'desc')->get());
        // echo '</pre>';
        return view('admin/article/index')->with('articles', $list);
    }

    //新增页
    public function create()
    {
        return view('admin/article/create');
    }

    //提交表单，保存数据
    public function store(Request $request) //Laravel的依赖注入系统会自动初始化我们需要的Request类
    {
        //数据验证
        $this->validate($request, [
            'title' => 'required|unique:articles|max:255',
            'body' => 'required',
        ]);

        // 通过Article Model 插入一条数据经articles表
        $article = new Article;
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->user_id = $request->user()->id; // 获得当前Auth系统中注册的用户，并将其id付给article的user_id字段

        // 将数据保存到数据库，通过判断保存结果，控制页面进行不同跳转
        if($article->save()) {
            return redirect('admin/articles');
        } else {
            // 保存失败，跳回来路页面，保留用户的输入，并给出提示
            return redirect()->back()->withInput->withErrors('保存失败！');
        }
    }

    //显示详细页
    public function show($id)
    {
        $info = Article::find($id);
        return view('admin/article/edit')->with('id', $id)->with('article_info', $info);
    }

    //编辑页
    public function edit($id)
    {
        $info = Article::find($id);
        return view('admin/article/edit')->with('id', $id)->with('article_info', $info);
    }
    // 保存编辑，更新信息
    public function update(Request $request)
    {
        Validator::make($request->all(), [
            'title' => [
                'max:50',
                'required',
                Rule::unique('articles')->ignore($request->get('id'))
                ],
            'body' => 'required'
            ])->validate();

        var_dump($request);
        printf($request);
        echo '###';
        return false;
    }

    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }
}
