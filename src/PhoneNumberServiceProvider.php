<?php 
namespace rapulu\laravelngphonepassword;

use Illuminate\Support\ServiceProvider;
use Validator;


class PhoneNumberServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    protected $message = 'This is not a valide Nigerian number';

    public function boot()
    {
        Validator::extend('phone', function ($attribute, $value, $parameters, $validator){ 
            return $this->app['validate']->validPhoneNumber($value);
        }, $this->message);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('validate', function ($app) {
            return new PhoneNumberController();
        });
    }
}
