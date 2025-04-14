<!-- resources/views/pages/app/transaction/checkout.blade.php -->

<x-layouts.app title="Checkout">
    @push('app-style')
    <style>
        :root {
    --primary: #2F4156;        /* Navy */
    --primary-dark: #263545;   /* Darker Navy */
    --secondary: #567C8D;      /* Teal */
    --light: #F5EFEB;          /* Beige */
    --dark: #2F4156;           /* Navy */
    --success: #567C8D;        /* Teal */
    --warning: #C8D9E6;        /* Sky Blue with darker tone for contrast */
    --danger: #E57373;         /* A red that complements the palette */
}

.checkout-page {
    background-color: #F5EFEB;  /* Beige background */
    padding: 3rem 0;
}

.checkout-card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(47, 65, 86, 0.1);  /* Shadow with Navy */
    background-color: white;
    margin-bottom: 2rem;
    overflow: hidden;
}

.checkout-card-header {
    background-color: white;
    border-bottom: 1px solid #E5E7EB;
    padding: 1.25rem 1.5rem;
    display: flex;
    align-items: center;
}

.checkout-card-body {
    padding: 1.5rem;
}

.checkout-step {
    display: flex;
    align-items: center;
    margin-bottom: 0;
}

.step-number {
    width: 28px;
    height: 28px;
    background-color: var(--primary);  /* Navy */
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 0.875rem;
    margin-right: 0.75rem;
}

.step-title {
    font-weight: 600;
    font-size: 1.125rem;
    color: var(--dark);  /* Navy */
    margin-bottom: 0;
}

.checkout-page_title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--dark);  /* Navy */
    margin-bottom: 1.5rem;
}

.checkout-page__order-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
}

.checkout-page__order-table-head {
    background-color: #C8D9E6;  /* Sky Blue */
}

.checkout-page__order-table th {
    padding: 1rem 1.5rem;
    text-align: left;
    font-weight: 600;
    color: var(--dark);  /* Navy */
    border-bottom: 1px solid #E5E7EB;
}

.checkout-page__order-table th.right {
    text-align: right;
}

.checkout-page__order-table td {
    padding: 1rem 1.5rem;
    border-bottom: 1px solid #F1F5F9;
    vertical-align: middle;
}

.pro__title {
    font-weight: 500;
    color: #567C8D;  /* Teal */
    font-size: 0.9375rem;
}

.pro__price {
    font-weight: 600;
    color: var(--dark);  /* Navy */
    text-align: right;
}

.pro_title--total,
.pro_price--total {
    font-weight: 700;
    font-size: 1.125rem;
    color: var(--dark);  /* Navy */
    border-top: 2px solid #E5E7EB;
    padding-top: 1.25rem;
}

.checkout-page__payment-wrapper {
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(47, 65, 86, 0.1);  /* Shadow with Navy */
    background-color: white;
    overflow: hidden;
}

.checkout-page__payment {
    padding: 1.5rem;
}

.checkout-page_paymentitem {
    padding: 1.25rem;
    border-radius: 8px;
    border: 1px solid #E5E7EB;
    margin-bottom: 1rem;
    transition: all 0.3s ease;
}

.checkout-pagepayment_item--active {
    border-color: var(--primary);  /* Navy */
    background-color: #EDF2F7;  /* Light Sky Blue */
    box-shadow: 0 2px 8px rgba(47, 65, 86, 0.15);  /* Shadow with Navy */
}

.checkout-page_payment_title {
    font-weight: 600;
    font-size: 1.125rem;
    color: var(--dark);  /* Navy */
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
}

.checkout-page_payment_title::before {
    content: '';
    display: inline-block;
    width: 20px;
    height: 20px;
    margin-right: 0.75rem;
    background-color: var(--primary);  /* Navy */
    border-radius: 50%;
    position: relative;
}

.checkout-page_payment_title::after {
    content: '\2713';
    position: absolute;
    color: white;
    font-size: 12px;
    margin-left: 4px;
}

.checkout-page_payment_content {
    padding-left: 2.25rem;
    color: #567C8D;  /* Teal */
}

.checkout-page_payment_button {
    padding: 1.5rem;
    text-align: center;
    background-color: #C8D9E6;  /* Sky Blue */
    border-top: 1px solid #E5E7EB;
}

.payment-method-logos {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    gap: 1rem;
    margin-top: 1.5rem;
    padding: 1rem;
    background-color: #C8D9E6;  /* Sky Blue */
    border-radius: 8px;
}

.payment-method-logo {
    height: 30px;
    opacity: 0.7;
    transition: opacity 0.3s ease;
}

.payment-method-logo:hover {
    opacity: 1;
}

.order-summary-card {
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(47, 65, 86, 0.1);  /* Shadow with Navy */
    background-color: white;
    overflow: hidden;
    height: 100%;
}

.order-summary-header {
    background-color: #C8D9E6;  /* Sky Blue */
    padding: 1.25rem 1.5rem;
    border-bottom: 1px solid #E5E7EB;
}

.order-summary-title {
    font-weight: 700;
    font-size: 1.25rem;
    color: var(--dark);  /* Navy */
    margin-bottom: 0;
}

.order-summary-body {
    padding: 1.5rem;
}

.order-course-item {
    display: flex;
    margin-bottom: 1rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid #F1F5F9;
}

.order-course-image {
    width: 60px;
    height: 60px;
    border-radius: 8px;
    overflow: hidden;
    margin-right: 1rem;
    flex-shrink: 0;
}

.order-course-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.order-course-info {
    flex-grow: 1;
}

.order-course-title {
    font-weight: 600;
    font-size: 0.9375rem;
    color: var(--dark);  /* Navy */
    margin-bottom: 0.25rem;
}

.order-course-price {
    font-weight: 600;
    color: var(--secondary);  /* Teal */
    font-size: 0.875rem;
}

.badge-free {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    border-radius: 9999px;
    font-size: 0.75rem;
    font-weight: 600;
    background-color: #EDF7F8;  /* Light Teal */
    color: #567C8D;  /* Teal */
}

.summary-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 0.75rem;
}

.summary-label {
    color: #567C8D;  /* Teal */
}

.summary-value {
    font-weight: 500;
    color: var(--dark);  /* Navy */
}

.summary-total {
    display: flex;
    justify-content: space-between;
    margin-top: 1rem;
    padding-top: 1rem;
    border-top: 2px solid #E5E7EB;
}

.summary-total-label {
    font-weight: 700;
    color: var(--dark);  /* Navy */
    font-size: 1.125rem;
}

.summary-total-value {
    font-weight: 700;
    color: var(--primary);  /* Navy */
    font-size: 1.125rem;
}

.checkout-btn {
    display: inline-block;
    padding: 1rem 2rem;
    background-color: var(--primary);  /* Navy */
    color: white;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    width: 100%;
}

.checkout-btn:hover {
    background-color: var(--secondary);  /* Teal */
}

.secure-payment {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 1rem;
    font-size: 0.875rem;
    color: #567C8D;  /* Teal */
}

.secure-payment i {
    margin-right: 0.5rem;
}

.guarantee-box {
    background-color: #EDF7F8;  /* Light Teal */
    border-radius: 8px;
    border-left: 4px solid #567C8D;  /* Teal */
    padding: 1rem;
    margin-top: 1.5rem;
    display: flex;
    align-items: flex-start;
}

.guarantee-icon {
    color: var(--success);  /* Teal */
    font-size: 1.25rem;
    margin-right: 0.75rem;
    margin-top: 0.125rem;
}

.guarantee-content h6 {
    font-weight: 600;
    margin-bottom: 0.25rem;
    color: var(--dark);  /* Navy */
}

.guarantee-content p {
    margin-bottom: 0;
    font-size: 0.875rem;
    color: #567C8D;  /* Teal */
}

.checkout-info-box {
    background-color: #EEF4F9;  /* Light Sky Blue */
    border-radius: 8px;
    border-left: 4px solid var(--primary);  /* Navy */
    padding: 1rem;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: flex-start;
}

.info-icon {
    color: var(--primary);  /* Navy */
    font-size: 1.25rem;
    margin-right: 0.75rem;
    margin-top: 0.125rem;
}

.info-content p {
    margin-bottom: 0;
    font-size: 0.875rem;
    color: #2F4156;  /* Navy */
}

.section-divider {
    margin: 2rem 0;
    border-top: 1px dashed #C8D9E6;  /* Sky Blue */
}

.midtrans-logo {
    height: 40px;
    margin-right: 0.75rem;
}
    </style>
    @endpush

    <section class="page-header">
        <!-- ... -->
    </section>

    <section class="checkout-page">
        <div class="container">
            <!-- Info Box -->
            <div class="checkout-info-box mb-4">
                <div class="info-icon">
                    <i class="icon-info-circle"></i>
                </div>
                <div class="info-content">
                    <p>Anda akan diarahkan ke halaman pembayaran Midtrans setelah menekan tombol "Selesaikan Pembayaran"</p>
                </div>
            </div>

            <div class="row">
                <!-- Order Details -->
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="checkout-card">
                        <div class="checkout-card-header">
                            <div class="checkout-step">
                                <div class="step-number">1</div>
                                <div class="step-title">Detail Pesanan</div>
                            </div>
                        </div>
                        <div class="checkout-card-body">
                            <div class="table-responsive">
                                <table class="checkout-page__order-table">
                                    <thead class="checkout-page__order-table-head">
                                        <tr>
                                            <th>Course</th>
                                            <th class="right">Sub total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItems as $item)
                                            <tr>
                                                <td class="pro__title">{{ $item->course->title }}
                                                    @if($item->course->price == 0)
                                                        <span class="badge-free ms-2">Free</span>
                                                    @endif
                                                </td>
                                                <td class="pro__price">
                                                    @if($item->course->price * $item->quantity == 0)
                                                        Rp0
                                                    @else
                                                        Rp{{ number_format($item->course->price * $item->quantity, 0, ',', '.') }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td class="pro__title">Subtotal</td>
                                            <td class="pro__price">
                                                @if($totalPrice == 0)
                                                    Rp0
                                                @else
                                                    Rp{{ number_format($totalPrice, 0, ',', '.') }}
                                                @endif
                                            </td>
                                        </tr>
                                        <!-- Jika Anda memiliki pajak atau biaya lain -->
                                        <tr>
                                            <td class="pro__title">Tax</td>
                                            <td class="pro__price">Rp0</td>
                                        </tr>
                                        <tr>
                                            <td class="pro_title pro_title--total">Total</td>
                                            <td class="pro_price pro_price--total">
                                                @if($totalPrice == 0)
                                                    Rp0
                                                @else
                                                    Rp{{ number_format($totalPrice, 0, ',', '.') }}
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Guarantee Box -->
                    <div class="guarantee-box">
                        <div class="guarantee-icon">
                            <i class="icon-shield"></i>
                        </div>
                        <div class="guarantee-content">
                            <h6>Akses Seumur Hidup</h6>
                            <p>Beli sekali, akses course selamanya. Dapatkan juga update materi secara berkala.</p>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="col-lg-4">
                    <div class="order-summary-card">
                        <div class="order-summary-header">
                            <h5 class="order-summary-title">Ringkasan Pembelian</h5>
                        </div>
                        <div class="order-summary-body">
                            @foreach ($cartItems as $item)
                                <div class="order-course-item">
                                    <div class="order-course-image">
                                        <img src="{{ asset('storage/' . $item->course->thumbnail) }}" alt="{{ $item->course->title }}">
                                    </div>
                                    <div class="order-course-info">
                                        <h6 class="order-course-title">{{ $item->course->title }}</h6>
                                        <p class="order-course-price">
                                            @if($item->course->price == 0)
                                                <span class="badge-free">Free</span>
                                            @else
                                                Rp{{ number_format($item->course->price, 0, ',', '.') }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            @endforeach

                            <div class="section-divider"></div>

                            <div class="summary-item">
                                <span class="summary-label">Subtotal</span>
                                <span class="summary-value">
                                    @if($totalPrice == 0)
                                        Rp0
                                    @else
                                        Rp{{ number_format($totalPrice, 0, ',', '.') }}
                                    @endif
                                </span>
                            </div>

                            <div class="summary-item">
                                <span class="summary-label">Tax</span>
                                <span class="summary-value">Rp0</span>
                            </div>

                            <div class="summary-total">
                                <span class="summary-total-label">Total</span>
                                <span class="summary-total-value">
                                    @if($totalPrice == 0)
                                        Rp0
                                    @else
                                        Rp{{ number_format($totalPrice, 0, ',', '.') }}
                                    @endif
                                </span>
                            </div>

                            <div class="mt-4">
                                <form action="{{ route('app.transaction.processCheckout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="checkout-btn">
                                        <i class="icon-lock me-2"></i> Selesaikan Pembayaran
                                    </button>
                                </form>

                                <div class="secure-payment">
                                    <i class="icon-shield"></i> Pembayaran aman & terenkripsi
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>