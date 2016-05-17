# Metrol\Request
## Handling PHP HTTP Superglobals as Objects

This came about a long while ago as I was writing yet another...

```php
$id = null;

if ( isset($_GET['id'] )
{
  $id = $_GET['id'];
}
```

First off, I don't need the entire app to fall apart because an array key isn't there.  If that `id` doesn't exist, just fail silently and let's just pretend we can all get along.

Also, the information in those super globals isn't immutable.  Sometimes it is handy to be able to change those values, but sure would be nice to have an object that I can pass around that always has the data as it was initially found.

These are a few of the reasons for this little library.

As for how it works, here's that same call to the `$_GET` super global using `Metrol\Request`.

```php
$req = new Metrol\Request;
$id  = $req->get()->get('id');
```

How about a post?

```php
$req  = new Metrol\Request;
$name = $req->post()->get('name');
```

Need to change the `name` value coming in for some reason?

```php
$req  = new Metrol\Request;
$name = $req->post()->get('name');
$req->post()->save('name', strtoupper($name);
```

And how about an immutable values as it first came into the object?

```php
$req  = new Metrol\Request;
$name = $req->post->getOrig('name');
```

That's pretty much of the gist of it.  This library supports:

```
$_GET
$_POST
$_REQUEST
$_COOKIE
$_FILES
$_SERVER
$_SESSION
```

All of which use the same basic structure for setting and getting information out of these arrays.
If you instantiate the `Request` object and push it into what you're working on you'll have full access to all these super globals up and ready to go.  There are no dependencies to worry about, as this was, and always will be, a completely stand alone library.

## Still To Come

There's more work to be done with how `$_FILES` works.  I'm also looking to add more functionality to the `Request\Server` object so as to provide a more user friendly experience when working with this, rather than having to constantly reference the PHP manual.
