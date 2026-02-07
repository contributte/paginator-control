![](https://heatbadger.now.sh/github/readme/contributte/paginator-control/?deprecated=1)

<p align=center>
    <a href="https://bit.ly/ctteg"><img src="https://badgen.net/badge/support/gitter/cyan"></a>
    <a href="https://bit.ly/cttfo"><img src="https://badgen.net/badge/support/forum/yellow"></a>
    <a href="https://contributte.org/partners.html"><img src="https://badgen.net/badge/sponsor/donations/F96854"></a>
</p>

<p align=center>
    Website 🚀 <a href="https://contributte.org">contributte.org</a> | Contact 👨🏻‍💻 <a href="https://f3l1x.io">f3l1x.io</a> | Twitter 🐦 <a href="https://twitter.com/contributte">@contributte</a>
</p>

## Disclaimer

| :warning: | This project is no longer being maintained. Please use [contributte/ui](https://github.com/contributte/ui).|
|---|---|

| Composer | [`contributte/paginator`](https://packagist.org/packages/contributte/paginator) |
|---| --- |
| Version | ![](https://badgen.net/packagist/v/contributte/paginator) |
| PHP | ![](https://badgen.net/packagist/php/contributte/paginator) |
| License | ![](https://badgen.net/github/license/contributte/paginator-control) |

## Documentation

### Setup

```neon
extensions:
	ContributtePaginationControl: Contributte\PaginatorControl\PaginatorControlExtension
```

### Usage

#### Injecting/using

You can simply inject factory in Your Presenters/Controls:

```php
public function __construct(
    private \Nette\Database\Explorer $db,
	private \Contributte\PaginatorControl\PaginatorControlFactory $paginatorControlFactory,
) {
    parent::__construct();
    ...
}
```
And then use it:

```php
public function renderDefault(): void
{
    $this->template->items = $this->getComponent('paginator')->getPage();
}

public function createComponentPaginator(): \Contributte\PaginatorControl\PaginatorControl
{
    return $this->paginatorControlFactory->create(
        \Contributte\PaginatorControl\Examples\Providers\NetteDatabaseExplorerDataProvider::create(
            $this->db->table('users'),
        ),
        50,
    );
}
```

#### Settings

The create method from `paginatorControlFactory` has parameters described in PHPdoc.

After creating the component, you can call the `setTemplateFile` method on the `PaginatorControl` class instance, which sets the path to the custom `.latte` file to render the paginator. For examples, look at the Examples folder.

Paginator needs an instance of the class that implements the `PaginatorDataProvider` interface to function. Implement this interface at your discretion. You can find some examples again in the `Examples` folder, specifically in the `Examples\Providers` folder.

## Development

This package was maintained by these authors.

<a href="https://github.com/f3l1x">
  <img width="80" height="80" src="https://avatars2.githubusercontent.com/u/538058?v=3&s=80">
</a>

<a href="https://github.com/TonnyJe">
  <img width="80" height="80" src="https://avatars2.githubusercontent.com/u/9120518?v=3&s=80">
</a>

-----

Consider to [support](https://contributte.org/partners.html) **contributte** development team.
Also thank you for using this package.
