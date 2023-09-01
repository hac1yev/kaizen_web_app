<?php

namespace App\Http\Controllers\Back\HelperController;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Comments;
use App\Models\Contact;
use App\Models\Keywords;
use App\Models\Offers;
use App\Models\Posts;
use App\Models\Quote;
use App\Models\Quotes;
use App\Models\Search;
use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HelperController extends Controller
{
    public static function ChangeUserData(){
        $users = Users::all();
        $count = count($users);
        $number=1;
        foreach ($users as $user ){
            if(!User::where([['email',$user->email],['id','<>',$user->id]])->first()){
                $data = new User();
                $data->id = $user->id;
                $data->fullname = $user->fullname;
                $data->username = $user->username;
                $slug = Str::slug($user->username);
                if(User::where('slug',$slug)->first()){
                    $slug = $slug.'_'.rand(1000,9999);
                }
                $data->slug = $slug;
                $data->about = $user->about_me;

                if(!User::where('email',$user->email)->first()){
                    $data->email = $user->email;
                }
                $data->image = 'assets/images/user/default_user.png';
                $data->password = $user->password;
                if($user->verified ==1) {
                    $data->verified = '1';
                }
                $data->created_at = $user->created_at;
                if($data->save()){
                    $number++;
                }
            }

        }
        if($number == $count){
            dd('success');
        }else{
            dd('error');
        }
    }

    public static function changePostData(){
        $articles = Article::all();
        $number = 0;
        $count = count($articles);
        foreach ($articles as $article){
            $post = new Posts();
            $post->id = $article->id;
            $post->user_id = $article->author;
            $post->category_id = $article->category;
            $post->title = $article->title;
            $slug = Str::slug($article->title);
            if(Posts::where('slug',$slug)->first()){
                $slug = $slug.'_'.rand(1000,9999);
            }
            $post->slug = $slug;
            $post->description = $article->description;
            $post->content = $article->more;
            $post->tags = $article->hashtags;
            $image = explode('/',$article->baslik);
            $post->image = 'assets/images/posts/'.$image[1];
            $post->view = $article->clicked;
            $post->created_at = date('Y-m-d H:i:s', strtotime($article['created_at']));;
            if($post->save()){
                $number++;
            }
        }
        if($number==$count){
            dd('success');
        }else{
            dd('error');
        }
    }
    public static function changeCommentData(){
        $comments = Comments::all();
        $number = 0;
        $count = count($comments);
        foreach ($comments as $comment){
            $data = new Comment();
            $data->user_id = $comment->user;
            $data->post_id = $comment->article_id;
            $data->comment = $comment->comment;
            $data->likes = $comment->likes;
            $data->dislikes = $comment->dislikes;
            $data->status = '1';
            $data->created_at = $comment->created_at;
            if($data->save()){
                $number++;
            }
        }
        if($number==$count){
            dd('success');
        }else{
            dd('error');
        }
    }
    public static function changeContactData(){
        $messages = Offers::all();
        $number = 0;
        $count = count($messages);
        foreach ($messages as $message){
                $data = new Contact();
                $data->name = $message->name;
                $data->email = $message->email;
                $data->message = $message->message;
            if($data->save()){
                $number++;
            }
        }
        if($number==$count){
            dd('success');
        }else{
            dd('error');
        }
    }
    public static function changeQuoteData(){
        $quotes = Quote::all();
        $number = 0;
        $count = count($quotes);
        foreach ($quotes as $quote){
            $data = new Quotes();
            $data->author = $quote->author;
            $data->content = $quote->content;
            $data->created_at = $quote->created;
            if($data->save()){
                $number++;
            }
        }
        if($number==$count){
            dd('success');
        }else{
            dd('error');
        }
    }
    public static function changeSearchData(){
        $keywords = Keywords::all();
        $number = 0;
        $count = count($keywords);
        foreach ($keywords as $keyword){
            $data = new Search();
            $data->word = $keyword->word;
            $data->count = $keyword->how_many;
            if($data->save()){
                $number++;
            }
        }
        if($number==$count){
            dd('success');
        }else{
            dd('error');
        }
    }
}
