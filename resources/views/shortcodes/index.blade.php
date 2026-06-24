<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Shortcode Studio</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #0f172a;
            font-family: 'Inter', sans-serif;
            color: #e5e7eb;
        }

        /* TOP BAR */
        .topbar {
            background: linear-gradient(135deg, #1e293b, #0f172a);
            padding: 18px 30px;
            border-bottom: 1px solid #1f2937;
        }

        .topbar h1 {
            font-size: 20px;
            font-weight: 700;
            margin: 0;
            color: #f8fafc;
        }

        .topbar span {
            font-size: 12px;
            color: #94a3b8;
        }

        /* MAIN CONTAINER */
        .container-box {
            max-width: 1200px;
            margin: 40px auto;
        }

        /* GRID */
        .layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        @media(max-width: 768px) {
            .layout {
                grid-template-columns: 1fr;
            }
        }

        /* CARD STYLE */
        .card-box {
            background: #111827;
            border: 1px solid #1f2937;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .label {
            font-size: 13px;
            font-weight: 600;
            color: #94a3b8;
            margin-bottom: 10px;
        }

        /* TEXTAREA EDITOR */
        textarea {
            width: 100%;
            background: #0b1220;
            border: 1px solid #1f2937;
            border-radius: 12px;
            padding: 15px;
            min-height: 280px;
            color: #e5e7eb;
            font-family: monospace;
            font-size: 13px;
            outline: none;
        }

        textarea:focus {
            border-color: #38bdf8;
            box-shadow: 0 0 0 2px rgba(56, 189, 248, 0.2);
        }

        /* BUTTON */
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
        }

        /* =========================
           MODERN OUTPUT UI
        ========================== */

        .modern-output {
            background: #0b1220;
            border: 1px solid #1f2937;
            border-radius: 14px;
            overflow: hidden;
        }

        .output-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 15px;
            background: #111827;
            border-bottom: 1px solid #1f2937;
            font-size: 13px;
            font-weight: 600;
            color: #94a3b8;
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
            min-height: 280px;
            color: #e5e7eb;
        }

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #64748b;
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
    </style>
</head>

<body>

    <div class="topbar">
        <h1>📘 Laravel Shortcode Studio</h1>
        <span>Convert shortcodes into dynamic HTML output</span>
    </div>

    <div class="container container-box">

        <form method="POST" action="/parse">
            @csrf

            <div class="layout">

                <!-- INPUT -->
                <div class="card-box">

                    <div class="label">✏️ Shortcode Editor</div>

                    <textarea name="content">{{ $content ?? '[alert]Welcome to Laravel Shortcode Studio[/alert]

[badge]New Feature[/badge]

[button url="https://laravel.com"]
Explore Laravel
[/button]

[card title="Laravel Shortcode"]
Dynamic card shortcode example
[/card]' }}</textarea>

                    <button class="btn-run">
                        ▶ Run Shortcode Parser
                    </button>

                </div>

                <!-- OUTPUT (UPDATED ONLY THIS SECTION UI) -->
                <div class="card-box">

                    <div class="label">📄 Rendered Preview</div>

                    <div class="modern-output">

                        <div class="output-header">
                            <span>📄 Live Preview</span>
                            <span class="status-dot"></span>
                        </div>

                        <div class="output-body">

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

                </div>

            </div>

        </form>

    </div>

    <!-- HISTORY START HERE -->

    <div class="container mt-5">

        <div class="card-box">

            <h3>
                📚 Shortcode History
            </h3>

            @foreach($history ?? [] as $item)


            <div class="border p-3 mb-3 rounded">


                <small class="text-secondary">
                    {{ $item->created_at }}
                </small>

                <br><br>

                <pre class="text-white">{{ $item->shortcode_content }}</pre>

                <a
                    href="/history/{{$item->id}}"
                    class="btn btn-sm btn-primary">

                    View

                </a>

                <form
                    method="POST"
                    action="{{ url('history/'.$item->id) }}"
                    style="display:inline-block">

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="btn btn-sm btn-danger">

                        Delete

                    </button>

                </form>

            </div>

            @endforeach

        </div>

    </div>

</body>

</html>