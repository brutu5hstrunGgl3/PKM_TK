<div class="container-fluid footer py-5 text-center">
    <div class="container py-5">
        <div class="row g-5 justify-content-center">
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="footer-item">
                    <img src="{{ asset('storage/' . e($logo->logo ?? 'img/default-logo.png')) }}" alt="Logo" class="mb-3" style="max-height: 60px;">
                    <h2 class="fw-bold mb-3">
                        <span class="text-primary">TK</span><span class="text-secondary">Harapan Ibu</span>
                    </h2>
                    <p class="mb-4">IZIN OPERASIONAL : 1884 /1751 / DIK 3</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="footer-item">
                    <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Lokasi</h4>
                    <div class="d-flex flex-column align-items-center">
                        <p class="text-body mb-2"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ e($contact->alamat ?? '-') }}</p>
                        <p class="text-body mb-4"><i class="fa fa-phone-alt text-primary me-2"></i>{{ e($contact->phone ?? '-') }}</p>
                        <div class="footer-icon d-flex justify-content-center">
                            <a class="btn btn-primary btn-sm-square me-3 rounded-circle text-white" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-sm-square me-3 rounded-circle text-white" href="#"><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-primary btn-sm-square me-3 rounded-circle text-white" href="#"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle text-white" href="#"><i class="fab fa-tiktok"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid copyright bg-danger py-4">
        <div class="container text-center text-md-start text-light">
            <div class="row">
                <div class="col-md-6 mb-3 mb-md-0">
                    <span><i class="fas fa-copyright text-light me-2"></i>
                        Tk Harapan Ibu | Powered by Universitas Panca Sakti Bekasi {{ date('Y') }}</span>
                </div>
                <!-- <div class="col-md-6 text-md-end">
                    Designed by <a href="https://htmlcodex.com" class="border-bottom text-light">HTML Codex</a>
                    | Distributed by
                    <a href="https://themewagon.com" class="border-bottom text-light">ThemeWagon</a>
                </div> -->
            </div>
        </div>
    </div>
