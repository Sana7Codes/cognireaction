<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>{{ $app }} • Welcome</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- minimalist styling -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <style>
    body { font-family: system-ui, -apple-system, Segoe UI, Roboto, sans-serif; margin:40px; }
    .card { max-width: 680px; margin:auto; padding:24px; border:1px solid #e5e7eb; border-radius:12px; }
    a.btn { display:inline-block; padding:10px 14px; border-radius:8px; background:#111827; color:#fff; text-decoration:none; }
    code { background:#f3f4f6; padding:2px 6px; border-radius:6px; }
  </style>
</head>
<body>
  <div class="card">
    <h1>{{ $app }}</h1>
    <p>Backend is up 👋 Try the health check and API docs:</p>
    <ul>
      <li><a href="/api/health">/api/health</a></li>
      <li><a href="/docs">API Docs</a></li>
    </ul>
    <p>Authenticated endpoints use Bearer tokens (Sanctum API tokens).</p>
    <p>Example curl:</p>
    <pre><code>curl -H "Authorization: Bearer &lt;TOKEN&gt;" http://localhost:8081/api/sessions/1/summary</code></pre>
    <a class="btn" href="/docs">Open API Docs</a>
  </div>
</body>
</html>

