
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $property->Property_Title }} | Property Details</title>

<!-- Bootstrap & Font Awesome -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<style>
    html, body {
        height: 100%;
        margin: 0;
        font-family: 'Arial', sans-serif;
        background: #f4f8f7;
    }

    .back-btn {
        position: absolute;
        top: 20px;
        left: 20px;
        z-index: 20;
        padding: 10px 20px;
        border-radius: 30px;
        background: #2f6f64;
        color: white;
        text-decoration: none;
        font-weight: bold;
        transition: 0.3s;
    }

    .back-btn:hover {
        background: #245750;
        color: #fff;
        text-decoration: none;
    }

    .property-container {
        display: flex;
        height: 100vh;
        width: 100%;
        overflow: hidden;
    }

    /* Left Image Section */
    .property-image {
        flex: 1;
        background: url('{{ asset('uploads/properties/' . $property->Image) }}') center/cover no-repeat;
        position: relative;
        transition: transform 0.5s ease;
    }

    .property-image::after {
        content: '';
        position: absolute;
        inset: 0;
        background: rgba(47,111,100,0.3);
    }

    .property-image:hover {
        transform: scale(1.05);
    }

    /* Right Details Section */
    .property-details {
        flex: 1;
        padding: 50px;
        overflow-y: auto;
        background: white;
        box-shadow: -5px 0 30px rgba(0,0,0,0.05);
    }

    .property-details h1 {
        color: #2f6f64;
        font-size: 36px;
        margin-bottom: 15px;
    }

    .property-details .price {
        font-size: 28px;
        font-weight: bold;
        color: #2f6f64;
        margin-bottom: 25px;
    }

    .property-details .info {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 12px;
        font-size: 16px;
        color: #333;
    }

    .property-details .description {
        margin-top: 25px;
        color: #555;
        line-height: 1.6;
        font-size: 16px;
    }

    /* Floor Plan Section */
    .floor-plan-section {
        margin-top: 25px;
        padding: 20px;
        background: #f4f8f7;
        border: 1px solid #dce9e4;
        border-radius: 14px;
    }

    .floor-plan-section h4 {
        color: #2f6f64;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .floor-plan-image {
        width: 100%;
        display: block;
        border-radius: 10px;
        border: 1px solid #e0e6e2;
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    .floor-plan-image:hover {
        transform: scale(1.02);
    }

    .floor-plan-note {
        font-size: 13px;
        color: #68756f;
        margin-top: 12px;
        margin-bottom: 0;
        line-height: 1.6;
    }

    /* Scrollbar for details */
    .property-details::-webkit-scrollbar {
        width: 6px;
    }

    .property-details::-webkit-scrollbar-thumb {
        background: rgba(47,111,100,0.5);
        border-radius: 3px;
    }

    @media (max-width: 992px) {
        .property-container {
            flex-direction: column;
            height: auto;
        }

        .property-image {
            height: 50vh;
        }

        .property-details {
            box-shadow: none;
        }
    }
</style>
</head>
<body>

<a href="{{ route('Property.all') }}" class="back-btn"><i class="fas fa-arrow-left me-1"></i> Back</a>

<div class="property-container">
    <!-- Left Image -->
    <div class="property-image"></div>

    <!-- Right Details -->
    <div class="property-details">
        <h1>{{ $property->Property_Title }}</h1>
        <div class="price">${{ number_format($property->Price, 2) }}</div>

        <div class="info"><i class="fas fa-map-marker-alt"></i> {{ $property->Street_Address }}</div>
        <div class="info"><i class="fas fa-building"></i> Type: {{ $property->Property_Type }}</div>
        <div class="info"><i class="fas fa-bed"></i> Bedrooms: {{ $property->Bedrooms }}</div>
        <div class="info"><i class="fas fa-bath"></i> Bathrooms: {{ $property->Bathrooms }}</div>
        <div class="info"><i class="fas fa-ruler-combined"></i> Square Feet: {{ $property->Square_Feet }}</div>
        <div class="info"><i class="fas fa-layer-group"></i> Floor: {{ $property->floor }}</div>
        <div class="info"><i class="fas fa-phone"></i> Contact: {{ $property->phone_num }}</div>

        <div class="description">* Description:  {{ $property->Description }}</div>

        <!-- Floor Plan -->
        <div class="floor-plan-section">
            <h4>
                <i class="fas fa-drafting-compass me-2"></i>
                Floor Plan
            </h4>

            <img
    src="{{ asset('uploads/properties/floorPlan.webp') }}"
                alt="Illustrative Floor Plan"
                class="floor-plan-image"
                data-bs-toggle="modal"
                data-bs-target="#floorPlanModal"
            >
        </div>

        <!-- Floor Plan Modal -->
        <div class="modal fade" id="floorPlanModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color:#2f6f64">
                            Floor Plan
                        </h5>
                        <button type="button" class="btn-close"
                                data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                       <img
    src="{{ asset('uploads/properties/floorPlan.webp') }}"
    alt="Floor Plan"
    class="floor-plan-image"
>
                    </div>
                </div>
            </div>
        </div>

        {{-- add vdio --}}
        @php
            $propertyVideos = [
                1 => 'house1.mp4',
                2 => 'house1.mp4',
                3 => 'house1.mp4',
                4 => 'house1.mp4',
                6 => 'house1.mp4',
                7 => 'house1.mp4',
                11 => 'house1.mp4',
                12 => 'house1.mp4',
            ];

            $videoFile = $propertyVideos[$property->id] ?? null;
        @endphp

        @if ($videoFile)
            <div class="mt-4">
                <h4 style="color:#2f6f64"><b>video property</b></h4>

                <video controls style="width:100%; max-width:600px;">
                    <source
                        src="{{ asset('uploads/property-videos/' . $videoFile) }}"
                        type="video/mp4">
                    Your browser does not support video playback.
                </video>
            </div>
        @endif
        {{-- vidio --}}

        <div class="mt-3">
            <!-- زر تحميل PDF -->
            <button id="downloadPdfBtn" class="btn btn-success">
                <i class="fas fa-file-pdf me-1"></i> Download PDF
            </button>

            <!-- زر واتساب -->
            <a href="https://api.whatsapp.com/send?text=Check out this property: {{ url()->current() }}"
               target="_blank"
               class="btn btn-success ms-2"
               style="background:#25D366; border:none;">
               <i class="fab fa-whatsapp me-1"></i> Share on WhatsApp
            </a>

            <!-- زر تليجرام -->
            <a href="https://t.me/share/url?url={{ url()->current() }}&text=Check out this property!"
               target="_blank"
               class="btn btn-primary ms-2"
               style="background:#0088cc; border:none;">
               <i class="fab fa-telegram-plane me-1"></i> Share on Telegram
            </a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<script>
document.getElementById('downloadPdfBtn').addEventListener('click', () => {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    // عنوان العقار
    doc.setFontSize(20);
    doc.setTextColor(47,111,100);
    doc.text(@json($property->Property_Title), 20, 20);

    // التفاصيل
    doc.setFontSize(12);
    doc.setTextColor(0,0,0);
    let y = 40;

    const details = [
        'Price: ${{ number_format($property->Price, 2) }}',
        'Address: {{ $property->Street_Address }}',
        'Type: {{ $property->Property_Type }}',
        'Bedrooms: {{ $property->Bedrooms }}',
        'Bathrooms: {{ $property->Bathrooms }}',
        'Square Feet: {{ $property->Square_Feet }}',
        'Floor: {{ $property->floor }}',
        'Contact: {{ $property->phone_num }}'
    ];

    details.forEach((line) => {
        const wrapped = doc.splitTextToSize(line, 170);
        doc.text(wrapped, 20, y);
        y += wrapped.length * 8;
    });

    // الوصف
    const description = @json($property->Description);
    const lines = doc.splitTextToSize(String(description ?? ''), 170);

    doc.text("Description:", 20, y + 5);
    y += 15;

    lines.forEach((line) => {
        if (y > 280) {
            doc.addPage();
            y = 20;
        }
        doc.text(line, 20, y);
        y += 7;
    });

    // تنزيل الملف مباشرة
    doc.save(@json($property->Property_Title) + '.pdf');
});
</script>
</body>
</html>
