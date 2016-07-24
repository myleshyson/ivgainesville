<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\MailRequest;
use App\SmallGroup;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller
{
    /**
     * Show Front Page.
     *
     * @return view
     */
    public function frontpage()
    {
        
        return view('pages.index');
    }

    /**
     * Show About page.
     *
     * @return view
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Show Contact Page.
     *
     * @return page form for students
     */
    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * Send Email.
     *
     * @param MailRequest $request
     *
     * @return redirect
     */
    public function sendMail(MailRequest $request)
    {
        $name = $request->name;
        Mail::send('email.new', ['request' => $request], function ($message) {
            $message->to('myles.hyson@intervarsity.org')
                    ->subject('IV Gainesville New Student!');
        });

        flash()->success('Awesome!', 'Thanks for contacting us. We will be in touch soon.');

        return redirect('/');
    }

    /**
     * Show a list a smallgroups.
     *
     * @return SmallGroup
     */
    public function smallGroups()
    {
        $smallgroups = SmallGroup::latest()->get()->all();

        return view('pages.smallgroups', compact('smallgroups'));
    }

    public function blogListing(Article $article, User $user)
    {
        $articles = $article->latest()->published()->get();

        return view('blog.blog', compact('articles'));
    }

    public function blogShow($id)
    {
        $article = Article::findOrFail($id);

        $user = $article->user;

        $photos = count($article->photos);

        return view('blog.show', compact('article', 'photos', 'user'));
    }
}
