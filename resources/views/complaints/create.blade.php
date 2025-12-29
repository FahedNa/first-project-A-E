<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة شكوى جديدة</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .complaint-form {
            max-width: 700px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        .form-header {
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
        }
        .form-header h2 {
            color: #3498db;
        }
        .btn-submit {
            background: linear-gradient(135deg, #3498db, #2c3e50);
            border: none;
            padding: 12px 30px;
            font-size: 18px;
            transition: all 0.3s;
        }
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.3);
        }
        .alert {
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="complaint-form">
            <div class="form-header">
                <h2>📝 نظام تقديم الشكاوي</h2>
                <p class="text-muted">نحن هنا لمساعدتك، يرجى ملء النموذج أدناه</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('complaints.store') }}">
                @csrf

                <div class="row">
                    <!-- معلومات المستخدم -->
                    <div class="col-md-6 mb-3">
                        <label for="user_name" class="form-label">الاسم الكامل *</label>
                        <input type="text" class="form-control @error('user_name') is-invalid @enderror"
                               id="user_name" name="user_name" value="{{ old('user_name') }}" required>
                        @error('user_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="user_email" class="form-label">البريد الإلكتروني *</label>
                        <input type="email" class="form-control @error('user_email') is-invalid @enderror"
                               id="user_email" name="user_email" value="{{ old('user_email') }}" required>
                        @error('user_email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>



                <div class="mb-3">
                    <label for="title" class="form-label">عنوان الشكوى *</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                           id="title" name="title" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="description" class="form-label">تفاصيل الشكوى *</label>
                    <textarea class="form-control @error('description') is-invalid @enderror"
                              id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-submit text-white">
                        📤 إرسال الشكوى
                    </button>
                </div>
            </form>

            <div class="text-center mt-4">
                <a href="{{ route('complaints.index') }}" class="btn btn-outline-secondary">
                    👁️ عرض جميع الشكاوي
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Reset form after successful submission
        @if(session('success'))
            document.querySelector('form').reset();
        @endif
    </script>
</body>
</html>
