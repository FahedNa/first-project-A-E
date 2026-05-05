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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<script>
document.getElementById('downloadPdfBtn').addEventListener('click', () => {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    // عنوان العقار
    doc.setFontSize(20);
    doc.setTextColor(47,111,100);
    doc.text("{{ $property->Property_Title }}", 20, 20);

    // التفاصيل
    doc.setFontSize(12);
    doc.setTextColor(0,0,0);
    let y = 40;
    doc.text(`Price: ${{ number_format($property->Price, 2) }}`, 20, y); y+=10;
    doc.text(`Address: {{ $property->Street_Address }}`, 20, y); y+=10;
    doc.text(`Type: {{ $property->Property_Type }}`, 20, y); y+=10;
    doc.text(`Bedrooms: {{ $property->Bedrooms }}`, 20, y); y+=10;
    doc.text(`Bathrooms: {{ $property->Bathrooms }}`, 20, y); y+=10;
    doc.text(`Square Feet: {{ $property->Square_Feet }}`, 20, y); y+=10;
    doc.text(`Floor: {{ $property->floor }}`, 20, y); y+=10;
    doc.text(`Contact: {{ $property->phone_num }}`, 20, y); y+=15;

    // الوصف
    const lines = doc.splitTextToSize("{{ $property->Description }}", 170);
    doc.text("Description:", 20, y);
    y += 10;
    doc.text(lines, 20, y);

    // تنزيل الملف مباشرة
    doc.save("{{ $property->Property_Title }}.pdf");
});
</script>
</body>
</html>
