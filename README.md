# Security Headers Implementation

Add the php file into /wp-content/mu-plugins/ directory. Must-Use directory prevents deactivating and uninstalling.

Must-use plugin to set baseline security headers that should pass checks for:

- Permissions-Policy
- Referrer-Policy
- X-Content-Type-Options
- X-XSS-Protection
- X-Frame-Options
  And adds an empty server header.

## Pantheon Strict-Transport-Security header

On Pantheon, the Strict-Transport-Security header has a low duration until site is live and pantheon.yml has the enforce_https full or full+subdomains value. https://docs.pantheon.io/pantheon-yml#enforce-https--hsts

This means once a site is live, the only header that would fail is Content-Security-Policy, since it requires explicitly whitelisting every third-party resource.
