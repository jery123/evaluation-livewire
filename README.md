<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Introduction

While Laravel does not dictate which JavaScript or CSS pre-processors you use, it does provide a basic starting point using Bootstrap, React, and / or Vue that will be helpful for many applications. By default, Laravel uses NPM to install both of these frontend packages.

    This legacy package is a very simple authentication scaffolding built on the Bootstrap CSS framework. While it continues to work with the latest version of Laravel, you should consider using Laravel Breeze for new projects. Or, for something more robust, consider Laravel Jetstream.

Official Documentation
Supported Versions

Only the latest major version of Laravel UI receives bug fixes. The table below lists compatible Laravel versions:
Version 	Laravel Version
3.x 	8.x

## Installation

Livewire is a full-stack framework for Laravel that simplifies the creation of dynamic interfaces, without leaving the comfort of Laravel. Laravel Livewire is a library that simplifies building modern, responsive, and dynamic interfaces using Laravel Blade as the templating language, which may be installed using Composer:

composer require livewire/livewire

******** Include the assets *********

// Add the following Blade directives in the head tag, and before the end body tag in your template.
<html>

<head>

    ...

    @livewireStyles

</head>

<body>

    ...

    @livewireScripts

</body>

</html>
    

//You can alternatively use the tag syntax.
<livewire:styles />

...

<livewire:scripts />

## Paginating Data
Let's say you have a show-posts component, but you want to limit the results to 10 posts per page.

You can paginate the results by using the WithPagination trait provided by Livewire.

use Livewire\WithPagination;
 

class ShowPosts extends Component

{

    use WithPagination;

 

    public function render()

    {

        return view('livewire.show-posts', [

            'posts' => Post::paginate(10),

        ]);

    }

}
        
************************************************************************************************************************************************************************************************************************************************************************

<div>

    @foreach ($posts as $post)

        ...

    @endforeach

 

    {{ $posts->links() }}

</div>


## Resetting Pagination After filtering Data

A common pattern when filtering a paginated result set is to reset the current page to "1" when filtering is applied.

For example, if a user visits page "4" of your data set, then types into a search field to narrow the results, it is usually desireable to reset the page to "1".

Livewire's WithPagination trait exposes a ->resetPage() method to accomplish this.

This method can be used in combination with the updating/updated lifecycle hooks to reset the page when certain component data is updated.

An optional page name parameter may be passed through, if the pagination name is set to anything other than page.

use Livewire\WithPagination;

 

class ShowPosts extends Component

{

    use WithPagination;

 

    public $search = '';

 

    public function updatingSearch()

    {

        $this->resetPage();

    }

 

    public function render()

    {

        return view('livewire.show-posts', [

            'posts' => Post::where('title', 'like', '%'.$this->search.'%')->paginate(10),

        ]);

    }

}


