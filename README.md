hgbrg.se
--------

## Development

Easiest way is to use the built in HTTP server in PHP:

```
$ php -S localhost:8000
```

## Deployment

Use `deploy.sh`, which wraps `rsync`. Files listed in `deploy_exclude` are
excluded.

## License

Licensed under [CC BY-SA 4.0](http://creativecommons.org/licenses/by-sa/4.0/).
