# Contributte / Paginator control

## Content

- [Content](#content)
- [Setup](#setup)
- [Usage](#usage)
    * [Injecting/using](#injecting-using)
    * [Setting](#setting)

## Setup

```neon
extensions:
	ContributtePaginationControl: Contributte\PaginatorControl\PaginatorControlExtension
```

## Usage

### Injecting/using

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

### Settings

The create method from `paginatorControlFactory` has parameters described in PHPdoc.

After creating the component, you can call the `setTemplateFile` method on the `PaginatorControl` class instance, which sets the path to the custom `.latte` file to render the paginator. For examples, look at the Examples folder.

Paginator needs an instance of the class that implements the `PaginatorDataProvider` interface to function. Implement this interface at your discretion. You can find some examples again in the `Examples` folder, specifically in the `Examples\Providers` folder.
