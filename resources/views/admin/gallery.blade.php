<!DOCTYPE html>
<html>
@include('admin.css')

<head>
<style>
body {
    background: #2c2c2c;
    color: #fff;
    position: relative;
}

/* Page spacing */
.page-content {
    padding: 40px;
}

/* Card */
.gallery-card {
    max-width: 600px;
    margin: 60px auto;
    background: #1f1f1f;
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.5);
    text-align: center;
}

/* Title */
.gallery-title {
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 30px;
    color: #00d084;
}

/* Custom Upload Wrapper */
.file-upload-wrapper {
    position: relative;
    width: 100%;
    border: 2px dashed #00d084;
    border-radius: 12px;
    background: #fff;
    padding: 20px;
    cursor: pointer;
    text-align: center;
}

/* Hide actual file input */
.file-upload-wrapper input[type=file] {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    cursor: pointer;
}

/* Label text */
.file-upload-text {
    font-size: 16px;
    color: #333;
}

/* Upload Button */
.upload-btn {
    padding: 16px 30px;
    font-size: 18px;
    font-weight: 600;
    border-radius: 30px;
    border: none;
    cursor: pointer;
    background: linear-gradient(90deg, #00b894, #00d084);
    color: white;
    transition: 0.3s;
    box-shadow: 0 5px 15px rgba(0, 208, 132, 0.4);
}

.upload-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0, 208, 132, 0.6);
}

/* Toast Message */
.toast-message {
    position: fixed;
    top: 20px;
    right: 20px;
    background-color: #00d084;
    color: #fff;
    padding: 15px 25px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    font-weight: 600;
    z-index: 9999;
    animation: fadeinout 4s forwards;
}

@keyframes fadeinout {
    0% { opacity: 0; transform: translateY(-20px); }
    10% { opacity: 1; transform: translateY(0); }
    90% { opacity: 1; transform: translateY(0); }
    100% { opacity: 0; transform: translateY(-20px); }
}

/* Gallery Grid */
.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
    gap: 15px;
    margin-top: 30px;
    width: 100%;
}

/* Image Container */
.gallery-item {
    position: relative;
    width: 100%;
}

/* Images */
.gallery-item img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
}

/* Delete Button Overlay */
.gallery-item .delete-btn {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    background-color: rgba(231, 76, 60, 0.8);
    color: white;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    transition: 0.3s;
}

.gallery-item .delete-btn:hover {
    background-color: rgba(192, 57, 43, 0.9);
}
</style>
</head>

<body>

@include('admin.header')
@include('admin.sidebar')

<div class="page-content">
<div class="container-fluid">

    <div class="gallery-card">
        <div class="gallery-title">Gallery Management</div>

        <!-- Form: File input and button side by side -->
        <form action="{{ url('upload_gallery') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="display: flex; gap: 10px; align-items: center; flex-wrap: wrap;">
                <!-- File Upload -->
                <div class="file-upload-wrapper" id="file-wrapper" style="flex: 1; position: relative; min-width: 200px;">
                    <span class="file-upload-text" id="file-name-text">Click or drag to choose an image</span>
                    <input type="file" name="image" id="file-input" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="upload-btn" style="flex: 0 0 auto;">Upload Image</button>
            </div>
        </form>
    </div>

    <!-- Gallery Grid -->
    <div class="gallery-grid">
        @foreach ($data as $gallery)
        <div class="gallery-item">
            <img src="/gallery/{{ $gallery->image }}" alt="Gallery Image">
            <a href="{{ url('delete_gallery', $gallery->id) }}" class="delete-btn"
               onclick="return confirm('Are you sure you want to delete this image?')">Delete</a>
        </div>
        @endforeach
    </div>

</div>
</div>

<!-- Toast Message -->
@if(session('message'))
    <div class="toast-message">
        {{ session('message') }}
    </div>
@endif

<!-- Script to show selected file name -->
<script>
const fileInput = document.getElementById('file-input');
const fileNameText = document.getElementById('file-name-text');

fileInput.addEventListener('change', function() {
    if (fileInput.files.length > 0) {
        fileNameText.textContent = fileInput.files[0].name;
    } else {
        fileNameText.textContent = 'Click or drag to choose an image';
    }
});
</script>

@include('admin.footer')

</body>
</html>
