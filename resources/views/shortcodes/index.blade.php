<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Shortcode Studio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --bg-primary: #0f172a;
            --bg-secondary: #111827;
            --bg-tertiary: #0b1220;
            --border-color: #1f2937;
            --text-primary: #f8fafc;
            --text-secondary: #94a3b8;
            --text-muted: #64748b;
            --accent: #38bdf8;
            --accent-hover: #0ea5e9;
        }

        .theme-light {
            --bg-primary: #f8fafc;
            --bg-secondary: #ffffff;
            --bg-tertiary: #f1f5f9;
            --border-color: #e2e8f0;
            --text-primary: #1e293b;
            --text-secondary: #475569;
            --text-muted: #94a3b8;
        }

        .theme-modern {
            --bg-primary: #1a1a2e;
            --bg-secondary: #16213e;
            --bg-tertiary: #0f3460;
            --border-color: #e94560;
            --text-primary: #f1f1f1;
            --text-secondary: #a8a8a8;
            --text-muted: #6b6b6b;
        }

        .theme-blue {
            --bg-primary: #0f172a;
            --bg-secondary: #1e3a8a;
            --bg-tertiary: #172554;
            --border-color: #3b82f6;
            --text-primary: #f8fafc;
            --text-secondary: #94a3b8;
            --text-muted: #64748b;
        }

        body {
            background: var(--bg-primary);
            font-family: 'Inter', 'Segoe UI', sans-serif;
            color: var(--text-primary);
            transition: all 0.3s ease;
        }

        .topbar {
            background: linear-gradient(135deg, var(--bg-secondary), var(--bg-primary));
            padding: 18px 30px;
            border-bottom: 1px solid var(--border-color);
        }

        .topbar h1 {
            font-size: 20px;
            font-weight: 700;
            margin: 0;
            color: var(--text-primary);
        }

        .topbar span {
            font-size: 12px;
            color: var(--text-secondary);
        }

        .container-box {
            max-width: 1400px;
            margin: 20px auto;
        }

        .layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        @media(max-width: 992px) {
            .layout {
                grid-template-columns: 1fr;
            }
        }

        .card-box {
            background: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .label {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-secondary);
            margin-bottom: 10px;
        }

        textarea {
            width: 100%;
            background: var(--bg-tertiary);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 15px;
            min-height: 320px;
            color: var(--text-primary);
            font-family: 'Courier New', monospace;
            font-size: 13px;
            outline: none;
            resize: vertical;
        }

        textarea:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 2px rgba(56, 189, 248, 0.2);
        }

        .btn-run {
            margin-top: 15px;
            width: 100%;
            background: linear-gradient(135deg, #22c55e, #16a34a);
            color: white;
            padding: 12px;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-run:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 20px rgba(34, 197, 94, 0.3);
            color: white;
        }

        .modern-output {
            background: var(--bg-tertiary);
            border: 1px solid var(--border-color);
            border-radius: 14px;
            overflow: hidden;
        }

        .output-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 15px;
            background: var(--bg-secondary);
            border-bottom: 1px solid var(--border-color);
            font-size: 13px;
            font-weight: 600;
            color: var(--text-secondary);
        }

        .status-dot {
            width: 8px;
            height: 8px;
            background: #22c55e;
            border-radius: 50%;
            box-shadow: 0 0 10px #22c55e;
        }

        .output-body {
            padding: 18px;
            min-height: 320px;
            color: var(--text-primary);
        }

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: var(--text-muted);
        }

        .empty-state .icon {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .output-body .alert {
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .output-body .btn {
            border-radius: 8px;
        }

        .toolbar {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 12px;
            padding: 10px;
            background: var(--bg-tertiary);
            border-radius: 10px;
            border: 1px solid var(--border-color);
        }

        .toolbar .btn-tool {
            font-size: 12px;
            padding: 6px 12px;
            border-radius: 8px;
            background: var(--bg-secondary);
            border: 1px solid var(--border-color);
            color: var(--text-secondary);
            transition: 0.2s;
        }

        .toolbar .btn-tool:hover {
            background: var(--accent);
            color: white;
            border-color: var(--accent);
        }

        .theme-selector {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .theme-btn {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            border: 2px solid var(--border-color);
            cursor: pointer;
            transition: 0.2s;
        }

        .theme-btn:hover, .theme-btn.active {
            border-color: var(--accent);
            transform: scale(1.1);
        }

        .theme-dark { background: #0f172a; }
        .theme-light { background: #f8fafc; }
        .theme-modern { background: #1a1a2e; }
        .theme-blue { background: #1e3a8a; }

        .template-library {
            max-height: 200px;
            overflow-y: auto;
        }

        .template-item {
            padding: 10px;
            margin-bottom: 8px;
            background: var(--bg-tertiary);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            cursor: pointer;
            transition: 0.2s;
        }

        .template-item:hover {
            border-color: var(--accent);
        }

        .template-item h6 {
            margin: 0;
            font-size: 14px;
            color: var(--text-primary);
        }

        .template-item small {
            color: var(--text-muted);
        }

        .action-bar {
            display: flex;
            gap: 10px;
            margin-top: 15px;
            flex-wrap: wrap;
        }

        .action-bar .btn {
            flex: 1;
            min-width: 120px;
        }

        .history-item {
            padding: 12px;
            margin-bottom: 10px;
            background: var(--bg-tertiary);
            border: 1px solid var(--border-color);
            border-radius: 10px;
        }

        .typing-indicator {
            display: none;
            position: absolute;
            right: 15px;
            top: 15px;
            color: var(--text-muted);
            font-size: 12px;
        }

        .preview-container {
            position: relative;
        }
    </style>
</head>
<body class="theme-dark">

    <div class="topbar">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div>
                <h1>📘 Laravel Shortcode Studio</h1>
                <span>Convert shortcodes into dynamic HTML output</span>
            </div>
            <div class="theme-selector">
                <span class="text-white-50 me-2">Theme:</span>
                <button class="theme-btn theme-dark active" onclick="setTheme('dark', this)" title="Dark"></button>
                <button class="theme-btn theme-light" onclick="setTheme('light', this)" title="Light"></button>
                <button class="theme-btn theme-modern" onclick="setTheme('modern', this)" title="Modern"></button>
                <button class="theme-btn theme-blue" onclick="setTheme('blue', this)" title="Blue"></button>
            </div>
        </div>
    </div>

    <div class="container container-box">

        <form method="POST" action="/parse" id="parseForm">
            @csrf
            <div class="layout">
                <div class="card-box">
                    <div class="label">✏️ Shortcode Editor</div>

                    <div class="toolbar">
                        <span class="text-white-50 me-2">Insert:</span>
                        <button type="button" class="btn-tool" onclick="insertShortcode('alert')">Alert</button>
                        <button type="button" class="btn-tool" onclick="insertShortcode('badge')">Badge</button>
                        <button type="button" class="btn-tool" onclick="insertShortcode('button')">Button</button>
                        <button type="button" class="btn-tool" onclick="insertShortcode('card')">Card</button>
                        <button type="button" class="btn-tool" onclick="insertShortcode('divider')">Divider</button>
                        <button type="button" class="btn-tool" onclick="insertShortcode('progress')">Progress</button>
                        <button type="button" class="btn-tool" onclick="insertShortcode('tooltip')">Tooltip</button>
                        <button type="button" class="btn-tool" onclick="insertShortcode('youtube')">YouTube</button>
                    </div>

                    <div class="position-relative">
                        <textarea name="content" id="content" placeholder="Type your shortcodes here...">{{ $content ?? '[alert]Welcome to Laravel Shortcode Studio[/alert]

[badge]New Feature[/badge]

[button url="https://laravel.com"]
Explore Laravel
[/button]

[card title="Laravel Shortcode"]
Dynamic card shortcode example
[/card]' }}</textarea>
                        <div class="typing-indicator" id="typingIndicator">Updating preview...</div>
                    </div>

                    <button type="submit" class="btn-run">
                        ▶ Run Shortcode Parser
                    </button>

                    <div class="action-bar">
                        <button type="button" class="btn btn-success btn-sm" onclick="exportPdf()">
                            <i class="bi bi-file-earmark-pdf"></i> Export PDF
                        </button>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#saveTemplateModal">
                            <i class="bi bi-save"></i> Save Template
                        </button>
                        <button type="button" class="btn btn-info btn-sm" onclick="clearContent()">
                            <i class="bi bi-trash"></i> Clear
                        </button>
                    </div>
                </div>

                <div class="card-box">
                    <div class="label">📄 Rendered Preview</div>
                    <div class="modern-output preview-container">
                        <div class="output-header">
                            <span>📄 Live Preview</span>
                            <span class="status-dot"></span>
                        </div>
                        <div class="output-body" id="previewBody">
                            @isset($parsedContent)
                                {!! $parsedContent !!}
                            @else
                                <div class="empty-state">
                                    <div class="icon">⚡</div>
                                    <p>Run parser to see output here</p>
                                </div>
                            @endisset
                        </div>
                    </div>

                    <div class="mt-3">
                        <div class="label">📋 Template Library</div>
                        <div class="template-library">
                            @foreach($defaultTemplates ?? [] as $template)
                                <div class="template-item" onclick="loadTemplate({{ $template->id }})">
                                    <h6>{{ $template->name }}</h6>
                                    <small>{{ $template->description }}</small>
                                </div>
                            @endforeach
                            @if(($templates ?? collect())->count() > 0)
                                <hr class="border-secondary my-2">
                                @foreach($templates->where('is_default', false) as $template)
                                    <div class="template-item" onclick="loadTemplate({{ $template->id }})">
                                        <h6>{{ $template->name }}</h6>
                                        <small>{{ $template->description }}</small>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="container mt-4">
        <div class="card-box">
            <h3>📚 Shortcode History</h3>
            @foreach($history ?? [] as $item)
                <div class="history-item">
                    <small class="text-secondary">{{ $item->created_at }}</small>
                    <br><br>
                    <pre class="text-white" style="white-space: pre-wrap; word-break: break-all;">{{ $item->shortcode_content }}</pre>
                    <div class="mt-2">
                        <a href="/history/{{$item->id}}" class="btn btn-sm btn-primary">View</a>
                        <form method="POST" action="{{ url('history/'.$item->id) }}" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="modal fade" id="saveTemplateModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content" style="background: var(--bg-secondary); color: var(--text-primary);">
                <div class="modal-header" style="border-bottom: 1px solid var(--border-color);">
                    <h5 class="modal-title">Save as Template</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" action="/save-template">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Template Name</label>
                            <input type="text" name="name" class="form-control" required style="background: var(--bg-tertiary); border: 1px solid var(--border-color); color: var(--text-primary);">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <input type="text" name="description" class="form-control" style="background: var(--bg-tertiary); border: 1px solid var(--border-color); color: var(--text-primary);">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <input type="text" name="category" class="form-control" style="background: var(--bg-tertiary); border: 1px solid var(--border-color); color: var(--text-primary);">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Shortcode Content</label>
                            <textarea name="shortcode_content" id="templateContent" class="form-control" rows="6" required style="background: var(--bg-tertiary); border: 1px solid var(--border-color); color: var(--text-primary);"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top: 1px solid var(--border-color);">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Template</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let debounceTimer;
        const contentTextarea = document.getElementById('content');
        const previewBody = document.getElementById('previewBody');
        const typingIndicator = document.getElementById('typingIndicator');

        contentTextarea.addEventListener('input', function() {
            document.getElementById('templateContent').value = this.value;
            typingIndicator.style.display = 'block';

            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                livePreview();
            }, 800);
        });

        function livePreview() {
            const content = contentTextarea.value;
            const formData = new FormData();
            formData.append('content', content);
            formData.append('_token', '{{ csrf_token() }}');

            fetch('/ajax-parse', {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                previewBody.innerHTML = data.parsedContent;
                typingIndicator.style.display = 'none';
            })
            .catch(error => {
                console.error('Error:', error);
                typingIndicator.style.display = 'none';
            });
        }

        function insertShortcode(type) {
            const textarea = document.getElementById('content');
            let shortcode = '';

            switch(type) {
                case 'alert':
                    shortcode = '[alert]Your alert message here[/alert]';
                    break;
                case 'badge':
                    shortcode = '[badge]New Badge[/badge]';
                    break;
                case 'button':
                    shortcode = '[button url="https://example.com"]Click Here[/button]';
                    break;
                case 'card':
                    shortcode = '[card title="Card Title"]Your card content here[/card]';
                    break;
                case 'divider':
                    shortcode = '[divider]';
                    break;
                case 'progress':
                    shortcode = '[progress value="70" color="success" label="Progress"]';
                    break;
                case 'tooltip':
                    shortcode = '[tooltip title="Tooltip text"]Hover me[/tooltip]';
                    break;
                case 'youtube':
                    shortcode = '[youtube id="dQw4w9WgXcQ"]';
                    break;
            }

            const start = textarea.selectionStart;
            const end = textarea.selectionEnd;
            const text = textarea.value;
            const before = text.substring(0, start);
            const after = text.substring(end);

            textarea.value = before + shortcode + after;
            textarea.focus();
            textarea.setSelectionRange(start + shortcode.length, start + shortcode.length);

            document.getElementById('templateContent').value = textarea.value;
            livePreview();
        }

        function loadTemplate(id) {
            fetch('/load-template/' + id)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('content').value = data.content;
                    document.getElementById('templateContent').value = data.content;
                    livePreview();
                })
                .catch(error => console.error('Error:', error));
        }

        function exportPdf() {
            const content = document.getElementById('content').value;
            const form = document.createElement('form');
            form.method = 'GET';
            form.action = '/export-pdf';
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'content';
            input.value = content;
            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
            document.body.removeChild(form);
        }

        function clearContent() {
            document.getElementById('content').value = '';
            document.getElementById('templateContent').value = '';
            previewBody.innerHTML = '<div class="empty-state"><div class="icon">⚡</div><p>Run parser to see output here</p></div>';
        }

        function setTheme(theme, btn) {
            document.body.classList.remove('theme-dark', 'theme-light', 'theme-modern', 'theme-blue');
            document.body.classList.add('theme-' + theme);

            document.querySelectorAll('.theme-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const url = new URL(window.location);
            url.searchParams.set('theme', theme);
            window.history.pushState({}, '', url);
        }

        const urlParams = new URLSearchParams(window.location.search);
        const savedTheme = urlParams.get('theme');
        if (savedTheme) {
            setTheme(savedTheme, document.querySelector('.theme-' + savedTheme));
        }
    </script>
</body>
</html>
