<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        \Form::component('bsText','components.form.text',['name','value' => null,'attributes' => []]);
        \Form::component('bsTextArea','components.form.textarea',['name','value' => null,'attributes' => []]);
        \Form::component('bsSelectList','components.form.selectlist',['name','value' => null,'attributes' => []]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}