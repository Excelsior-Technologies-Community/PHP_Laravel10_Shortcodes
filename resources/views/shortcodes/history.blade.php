<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shortcode History Detail</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #0f172a;
            color: #e5e7eb;
            font-family: 'Inter', sans-serif;
        }

        .topbar {
            background: linear-gradient(135deg, #1e293b, #0f172a);
            padding: 22px 35px;
            border-bottom: 1px solid #334155;
        }

        .topbar h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
        }

        .container-box {
            max-width: 1200px;
            margin: 40px auto;
        }

        .history-card {
            background: #111827;
            border: 1px solid #1f2937;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, .4);
        }

        .header-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .header-row h3 {
            margin: 0;
        }

        .badge-time {
            background: #1e293b;
            color: #94a3b8;
            padding: 8px 14px;
            border-radius: 20px;
            font-size: 13px;
        }

        .section-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .code-box {
            background: #020617;
            border: 1px solid #334155;
            border-radius: 15px;
            padding: 20px;
            min-height: 180px;
            overflow: auto;
        }

        .code-box pre {
            margin: 0;
            color: #38bdf8;
            font-family: monospace;
        }

        .divider {
            height: 1px;
            background: #334155;
            margin: 30px 0;
        }

        .preview-box {
            background: #0b1220;
            border: 1px solid #334155;
            border-radius: 15px;
            padding: 25px;
            min-height: 200px;
        }

        .back-btn {
            margin-top: 25px;
            border-radius: 12px;
            padding: 10px 25px;
        }

        @media(max-width:768px) {
            .header-row {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
        }
    </style>

</head>

<body>

    <div class="topbar">
        <h1>📚 Shortcode History Detail</h1>
    </div>

    <div class="container container-box">

        <div class="history-card">

            <div class="header-row">
                <h3>⚡ Shortcode Record</h3>

                <span class="badge-time">
                    {{$item->created_at}}
                </span>

            </div>

            <div class="section-title">
                📝 Original Shortcode
            </div>

            <div class="code-box">
                <pre>{{$item->shortcode_content}}</pre>
            </div>

            <div class="divider"></div>

            <div class="section-title">
                🚀 Rendered Output
            </div>

            <div class="preview-box">
                {!! $item->rendered_html !!}
            </div>

            <a href="/" class="btn btn-primary back-btn">
                ← Back To Studio
            </a>

        </div>

    </div>

</body>

</html>