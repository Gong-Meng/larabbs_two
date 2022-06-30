<?php

namespace App\Providers;

use App\Models\Topic;
use App\Models\Reply;
use App\Observers\TopicObserver;
use App\Observers\ReplyObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        if (app()->isLocal()) {
            $this->app->register(\VIACreative\SudoSu\ServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //注册观察器
        Topic::observe(TopicObserver::class);
        Reply::observe(ReplyObserver::class);
        \App\Models\Link::observe(\App\Observers\LinkObserver::class);
        JsonResource::withoutWrapping();

        // Passport 的路由
        Passport::routes();
        // access_token 过期时间
        Passport::tokensExpireIn(now()->addDays(15));
        // refreshTokens 过期时间
        Passport::refreshTokensExpireIn(now()->addDays(30));
    }
}
