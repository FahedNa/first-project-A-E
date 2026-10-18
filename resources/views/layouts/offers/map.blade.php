
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>خريطة العقارات في سوريا</title>

    <!-- Leaflet CSS -->
    <link rel="stylesheet"
          href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            color: #20304a;
        }

        /* زر الرجوع */
        .back-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 1000;
            padding: 10px 20px;
            border-radius: 30px;
            background: #20345b;
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }

        .back-btn:hover {
            background: #152442;
            color: white;
        }

        header {
            background: #20345b;
            color: white;
            padding: 22px;
            text-align: center;
        }

        header h1 {
            margin: 0 0 8px;
            font-size: 26px;
        }

        header p {
            margin: 0;
            color: #e0e8f5;
        }

        .container {
            max-width: 1200px;
            margin: 25px auto;
            padding: 0 16px;
        }

        .map-card {
            background: white;
            padding: 16px;
            border-radius: 15px;
            box-shadow: 0 4px 18px #0000000d;
        }

        .map-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 15px;
        }

        .map-title h2 {
            font-size: 20px;
            margin: 0;
        }

        .badge {
            background: #e5f6ef;
            color: #12815c;
            padding: 8px 12px;
            border-radius: 20px;
            font-size: 13px;
        }

        #map {
            width: 100%;
            height: 560px;
            border-radius: 12px;
            z-index: 1;
            overflow: hidden;
            background: #e8edf2;
        }

        .note {
            margin-top: 14px;
            color: #64748b;
            font-size: 13px;
            line-height: 1.8;
        }

        footer {
            text-align: center;
            padding: 20px;
            color: #64748b;
            font-size: 13px;
        }

        @media (max-width: 600px) {
            #map {
                height: 430px;
            }

            header h1 {
                font-size: 22px;
            }

            .back-btn {
                top: 10px;
                right: 10px;
                padding: 8px 13px;
            }
        }
    </style>
</head>

<body>

<a href="{{ route('Property.all') }}" class="back-btn">
    <i class="fas fa-arrow-right"></i> رجوع
</a>

<header>
    <h1>عقارات سوريا 🇸🇾</h1>
    <p>اكتشف مواقع العقارات على الخريطة</p>
</header>

<div class="container">
    <div class="map-card">

        <div class="map-title">
            <h2>خريطة العقارات في سوريا</h2>
            <span class="badge">عقارات تجريبية</span>
        </div>

        <div id="map"></div>

        <div class="note">
            اضغط على أي علامة على الخريطة لمشاهدة معلومات العقار وسعره.
            البيانات المعروضة تجريبية.
        </div>

    </div>
</div>

<footer>
    منصة التسويق العقاري — سوريا
</footer>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    // حدود تقريبية لمنطقة سوريا لمنع الابتعاد عن الخريطة
    const syriaBounds = L.latLngBounds(
        [32.0, 35.5],
        [37.5, 42.5]
    );

    // إنشاء الخريطة
    const map = L.map('map', {
        minZoom: 7,
        maxZoom: 12,
        maxBounds: syriaBounds,
        maxBoundsViscosity: 1.0
    }).setView([34.8021, 38.9968], 7);

    // خريطة الشوارع
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors',
        maxZoom: 19
    }).addTo(map);

    // بيانات عقارات تجريبية
    const properties = [
        {
            city: 'دمشق',
            lat: 33.5138,
            lng: 36.2765,
            title: 'شقة سكنية في دمشق',
            price: '75,000 دولار'
        },
        {
            city: 'حلب',
            lat: 36.2021,
            lng: 37.1343,
            title: 'منزل في حلب',
            price: '60,000 دولار'
        },
        {
            city: 'حمص',
            lat: 34.7324,
            lng: 36.7137,
            title: 'عقار في حمص',
            price: '45,000 دولار'
        },
        {
            city: 'حماة',
            lat: 35.1318,
            lng: 36.7578,
            title: 'شقة في حماة',
            price: '40,000 دولار'
        },
        {
            city: 'اللاذقية',
            lat: 35.5317,
            lng: 35.7901,
            title: 'منزل في اللاذقية',
            price: '85,000 دولار'
        },
        {
            city: 'طرطوس',
            lat: 34.8890,
            lng: 35.8866,
            title: 'عقار في طرطوس',
            price: '70,000 دولار'
        },
        {
            city: 'إدلب',
            lat: 35.9306,
            lng: 36.6339,
            title: 'شقة في إدلب',
            price: '35,000 دولار'
        },
        {
            city: 'دير الزور',
            lat: 35.3359,
            lng: 40.1408,
            title: 'منزل في دير الزور',
            price: '30,000 دولار'
        }
    ];

    // إضافة علامات العقارات
    properties.forEach(function(property) {
        const marker = L.marker([
            property.lat,
            property.lng
        ]).addTo(map);

        marker.bindPopup(`
            <div style="text-align:right; min-width:150px">
                <h3 style="margin:0 0 10px">
                    ${property.title}
                </h3>
                <p style="margin:5px 0">
                    المدينة: ${property.city}
                </p>
                <p style="margin:5px 0; color:#159878">
                    السعر: ${property.price}
                </p>
            </div>
        `);
    });

    // إعادة ضبط الخريطة عند تغيير حجم الشاشة
    window.addEventListener('resize', function() {
        map.invalidateSize();
    });
</script>

</body>
</html>
